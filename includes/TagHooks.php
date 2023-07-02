<?php

use MediaWiki\MediaWikiServices;

class tagHooks
{
    private static $crossRefData = array();     // 用来储存引用编号和名称

    public static function onLoadExtensionSchemaUpdates( DatabaseUpdater $updater)
    {
        $dir = dirname(__DIR__);
        $updater->addExtensionTable('cross_pages_references', "$dir/sql/init.sql");
    }

    public static function onParserFirstCallInit( Parser $parser)
    {
        $parser->setHook( 'math', [ self::class, 'mathRender']);
        $parser->setHook( 'tikzcd', [ self::class, 'tikzcdRender']);

        $parser->setHook( 'definition', [self::class, 'definitionRender']);
        $parser->setHook( 'theorem', [self::class, 'theoremRender']);
        $parser->setHook( 'proposition', [self::class, 'propositionRender']);
        $parser->setHook( 'corollary', [self::class, 'corollaryRender']);
        $parser->setHook( 'lemma', [self::class, 'lemmaRender']);
        $parser->setHook( 'remark', [self::class, 'remarkRender']);
        $parser->setHook( 'example', [self::class, 'exampleRender']);

        // $parser->setHook( 'enumerate', [self::class, 'enumerateRender']);
        $parser->setHook( 'cref', [self::class, 'crefRender']);

        $parser->setHook( 'proofc', [self::class, 'proofcRender']);
    }

    public static function onParserBeforeInternalParse(Parser &$parser, &$text, &$strip_state)
    {
        static $execed = false; // 用于避免重复执行, 重复解析已经部分解析后的数据, 这样除了会造成速度降低外还会破坏第一次获得的引用数据;
        if($execed == true) return true;

        // 若正在解析系统消息, 比如最近修改时间等, 就不执行后续操作直接通过
        if( $parser->getOptions()->getInterfaceMessage())
        {
            return true;
        }

        // 模版中也不进行后续操作直接通过
        $title = $parser->getTitle();
        if(in_array($title->getNamespace(), [ NS_TEMPLATE, NS_MODULE, NS_MEDIAWIKI]))
        {
            return true;
        }

        self::preProcess($parser, $text);   // 替换一些字符.

        //把id和#开头的链接id都转化为url编码.
        $text = preg_replace_callback('/\sid\s*="([\s\.\-\p{Han}àÀâÂéÉèÈëËêÊïÏîÎôÔöÖùÙüÜûÛÿŸçÇß\w]+)"/u',
        function($matches): string
        {
            return ' id="' . urlencode($matches[1]) . '"';
        },
        $text);

        $envCounter = 1;
        $idNumber = array();

        $text = preg_replace_callback('/<(lemma|theorem|proposition|corollary|remark|example|definition)([^>]*)>/',
        function($matches) use(&$envCounter, &$idNumber): string
        {
            $attr = $matches[2];
            if( strlen($attr) > 0 && $attr[0] != ' ')
            {
                // 如果lemma等之后的字符串不是空串, 那么第一个字符必须是空格, 否则这个标签就不是上面那些标签. 
                // 因此直接原路返回被匹配到的字符串
                return $matches[0];
            }

            //寻找id="xxx"这样的id标签, 如果找到就设置数组之后记录到类里面.
            if( preg_match('/\sid="([\%\.\-\+\w]+)"/', $attr, $matchesAttr) )
            {
                $idNumber[$matchesAttr[1]] = self::translate($matches[1]) . " $envCounter "; // 同时也把标题, 就是lemma这样的记录下来
            }

            // 临时加上一个temp属性, 使得其他自定义标签处理程序能获得编号信息.
            $ret = '<' . $matches[1] . $attr . ' temp="' . "$envCounter" . '">';
            $envCounter++;
            return $ret;
        },
        $text);

        $rightCounter = 1;

        $text = preg_replace_callback('/<(tikzcd|math)([^>]*)>/',
        function($matches) use(&$rightCounter, &$idNumber): string
        {
            $attr = $matches[2];
            if( strlen($attr) > 0 && $attr[0] != ' ' )
            {
                return $matches[0];
            }

            // 如果是tikzcd标签, 并且没有找到tag="true"或者id="xxx"这样的属性, 表示这个标签不需要被编号, 直接原路返回
            // 必须把匹配程序放在&&前面, 使得一定执行这个匹配, 否则下面的$matchesAttr就不会有结果.
            if( (!preg_match('/\sid="([\%\.\-\+\w]+)"|\stag="\s*true\s*"/', $attr, $matchesAttr)) && ($matches[1] == 'tikzcd') )
            {
                return $matches[0];
            }
            else
            {
                $ret = '<' . $matches[1] . $attr . ' temp="' . "$rightCounter" . '">';

                // 如果还存在id="xxx"这样的标签, 则记录
                if( array_key_exists(1, $matchesAttr) )
                {
                    $idNumber[$matchesAttr[1]] = " ($rightCounter) ";
                }

                $rightCounter++;
                return $ret;
            }
        },
        $text);

        // 把找到的id和编号的对应关系放到类属性里面
        // 由于这个钩子可能会被调用多次, 即使之前添加了判断也无法完全避免未知执行,
        // 因此判断idNumber是否为0, 避免污染之前储存的数据
        if(count($idNumber) > 0)
        {
            self::$crossRefData = $idNumber;
            $execed = true;

            // 把本页面的引用数据放到数据库里, 以便其他页面的解析器能生成引用
            $titleUrlString = urlencode($title);
            $dbProvider = MediaWikiServices::getInstance()->getDBLoadBalancer();
            $dbw = $dbProvider->getConnection( DB_PRIMARY );
            $dbw->delete( 'cross_pages_references' , ['page_title' => $titleUrlString]);
            foreach( $idNumber as $id => $tag )
            {
                if( false == $dbw->insert('cross_pages_references',
                [
                    'page_title' => $titleUrlString,
                    'label' => $id,
                    'display_tag' => $tag
                ]))
                {
                    echo "插入($title, $id, $tag)失败";
                    break;
                }
            }
        }

        return true;
    }

    public static function proofcRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        $dom = new DOMDocument();
        $div_mw_colla = $dom->createElement('div');
        $dom->appendChild($div_mw_colla);
        
        $div_mw_colla->setAttribute('class', 'mw-collapsible mw-collapsed');

        $title = $dom->createElement('span', '证明:'); // 这将被放在开头并且通过css加粗
        $title->setAttribute('class', 'env-title');    // 将在css中控制env-title的样式
        $div_mw_colla->appendChild($title);

        // 因为直接用输入字符串创建div会导致DOM组件识别到&之类的常见符号时出错, 但是又需要把这些字符直接传递给客户端进行数学解析等
        // 因此先计算输入字符串的哈希值, 填充div, 最后用原本的字符串替换这个哈希值.
        // 同时直接用PHP的DOM解析wiki解析成的代码也会出现乱码(需要转换为HTML的编码), 因此用替换的方式也可以避免这个问题
        $source_code = $parser->recursiveTagParse($input, $frame);
        $source_hash = hash('md5', $source_code);

        $content = $dom->createElement('div', $source_hash);
        $content->setAttribute('class', 'mw-collapsible-content proof-content');
        $div_mw_colla->appendChild($content);

        return str_replace($source_hash, $source_code, $dom->saveHTML());
    }

    public static function definitionRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'definition');
    }

    public static function theoremRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'theorem');
    }

    public static function propositionRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'proposition');
    }

    public static function corollaryRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'corollary');
    }

    public static function lemmaRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'lemma');
    }

    public static function remarkRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'remark');
    }

    public static function exampleRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'example');
    }

    private static function commonEnvironment( $input, array $args, Parser $parser, PPFrame $frame, string $className)
    {
        $dom = new DOMDocument();
        $blockquote = $dom->createElement('blockquote');
        $blockquote->setAttribute('class', $className);
        if( array_key_exists('id', $args) )
        {
            $blockquote->setAttribute('id', $args['id']);
        }
        $dom->appendChild($blockquote);

        // 构造标题字符串, 在onParserBeforeInternalParse中已经添加了一个临时标签
        $tag = $args['temp'];
        $titletag = self::translate($className) . " $tag ";
        if(array_key_exists('name', $args))
        {
            $titletag .= '(' . $args['name'] . ')';
        }
        $titletag .= ':';

        $span = $dom->createElement('span', $titletag);
        $span->setAttribute('class', 'env-title');
        $blockquote->appendChild($span);

        // 因为直接用输入字符串创建div会导致DOM组件识别到&之类的常见符号时出错, 但是又需要把这些字符直接传递给客户端进行数学解析等
        // 因此先计算输入字符串的哈希值, 填充div, 最后用原本的字符串替换这个哈希值. 
        // 同时直接用PHP的DOM解析wiki解析成的代码也会出现乱码(需要转换为HTML的编码), 因此用替换的方式也可以避免这个问题
        $source_code = $parser->recursiveTagParse($input, $frame);
        $source_hash = md5($source_code);

        $div = $dom->createElement('div', $source_hash);
        $blockquote->appendChild($div);

        return str_replace($source_hash, $source_code, $dom->saveHTML());
    }

    public static function tikzcdRender($input, array $args, Parser $parser, PPFrame $frame)
    {
        // 本段程序把tikz的代码用httppost发送到127.0.0.1:9292去, 将返回svg图片代码
        $ch = curl_init('http://127.0.0.1');
        $source = array('type' => 'tikzcd', 'tex' => $input);
        if( array_key_exists('option', $args))
        {
            $source['option'] = $args['option'];
        }
        curl_setopt_array($ch, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PORT => 9292,
            CURLOPT_POSTFIELDS => json_encode($source)
        ));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json;'));
        $svg_xml = curl_exec($ch);
        if($svg_xml == '') return $input . "\n";
        curl_close($ch);

        $svg_hash = hash('md5', $svg_xml);  // 依然是通过获取哈希值, 填入html元素中, 最后替换的方式, 避免PHP的DOM解析错误.

        $dom = new DOMDocument();
        $div = $dom->createElement('div', $svg_hash);
        $div->setAttribute('class', 'container');
        $dom->appendChild($div);

        if( array_key_exists('temp', $args) )
        {
            // 如果temp属性则添加编号.
            $tag = $args['temp'];
            $span = $dom->createElement('span', "($tag)");
            $span->setAttribute('class', 'right-tag');

            $div->appendChild($span);

            if( array_key_exists('id', $args) )
            {
                $div->setAttribute('id', $args['id']);
            }
        }

        $svg_dom = new DOMDocument();
        $svg_dom->loadXML($svg_xml);
        $svg_head = $svg_dom->getElementsByTagName('svg')->item(0);
        $height = floatval($svg_head->getAttribute('height'))*1.5; // 获得原始高度的1.5倍, 作为显示的图片的高度, 否则太小.

        $svg_xml = preg_replace('/^<\?xml[^>]*\?>/','',$svg_xml);   // 去掉xml头
        $svg_xml = preg_replace('/width="([\d\.]+)(pt)?"/', '', $svg_xml);  // 去掉宽度属性, 让浏览器根据高度属性自动计算宽度.
        $svg_xml = preg_replace('/height="([\d\.]+)(pt)?"/', 'height=' . $height . 'pt', $svg_xml);     // 替换高度属性为原本的1.5倍.

        // 需要让svg图片中的内部标识符随机化, 否则同一个页面中存在TeXLive生成的多个svg时会出现冲突导致显示错误.
        $rand = '';
        for ($i = 0; $i < 16; $i++)
        {
            $rand .= dechex(rand(0, 15));
        }
        $svg_xml = preg_replace_callback('/(id="|href="#|url\(#)/', function ($matches) use ($rand) { return $matches[0].$rand; }, $svg_xml);

        return [str_replace($svg_hash, $svg_xml, $dom->saveHTML()), 'markerType' => 'nowiki'];
    }

    public static function mathRender($input, array $args, Parser $parser, PPFrame $frame)
    {
        // 生成编号公式.
        $dom = new DOMDocument();

        // 因为直接用输入字符串创建div会导致DOM组件识别到&之类的在TeX中很常见的符号时出错, 但是又需要把这些字符直接传递给客户端进行数学解析
        // 因此先计算输入字符串的哈希值, 填充div, 最后用原本的字符串替换这个哈希值.
        $source_code = '$$' . $input . '$$';
        $source_hash = md5($source_code);

        $div = $dom->createElement('div', $source_hash);
        $div->setAttribute('class', 'container');
        if(array_key_exists('id', $args))
        {
            $div->setAttribute('id', $args['id']);
        }
        $dom->appendChild($div);

        $tag = $args['temp'];
        $span = $dom->createElement('span', "($tag)");
        $span->setAttribute('class', 'right-tag');
        $div->appendChild($span);

        return [str_replace($source_hash, $source_code, $dom->saveHTML()), 'markerType' => 'nowiki'];
    }

    public static function crefRender($input, array $args, Parser $parser, PPFrame $frame)
    {
        if(!array_key_exists('id', $args))
        {
            return "\n没有指定引用标识符\n";
        }
        $id = $args['id'];  // URL字符串
        $page = '';
        $tag = '';
        $ret = '';

        if(array_key_exists('page', $args))
        {
            $page = urlencode($args['page']);
            $readableTitle = $args['page'];

            $dbProvider = MediaWikiServices::getInstance()->getDBLoadBalancer();
            $dbr = $dbProvider->getConnection( DB_REPLICA );

            $result = $dbr->newSelectQueryBuilder()
                            ->select( 'display_tag' )
                            ->from( 'cross_pages_references' )
                            ->where( [
                                'page_title' => $page,
                                'label' => $id
                            ])
                            ->caller( __METHOD__ )->fetchField();
            
            $ret = "<a href=\"/index.php?title=$page#$id\" title=\"$readableTitle\">$readableTitle $result</a>";
        }
        else
        {
            if(array_key_exists($id, self::$crossRefData))
            {
                $tag = self::$crossRefData[$id] ;
            }
            else
            {
                $tag = urldecode($id);
            }

            $ret = "<a href=\"#$id\">$tag</a>";
        }
        
        return [$ret, 'markerType' => 'nowiki'];
    }

    private static function translate(string $input) : string
    {
        if ($input == 'theorem')
        {
            return '定理';
        }
        else if ($input == 'lemma')
        {
            return '引理';
        }
        else if ($input == 'proposition')
        {
            return '命题';
        }
        else if ($input == 'corollary')
        {
            return '推论';
        }
        else if ($input == 'definition')
        {
            return '定义';
        }
        else if ($input == 'example')
        {
            return '例';
        }
        else if ($input == 'remark')
        {
            return '注';
        }
        else return '';
    }

    private static function preProcess(Parser &$parser, string &$text)
    {
        $replace = array(
            'R' => 'mathbb{R}',
            'Cpx' => 'mathbb{C}',
            'Z' => 'mathbb{Z}',
            'H' => 'mathbb{H}',
            'Hom' =>    'operatorname{Hom}',
            'GL' =>     'operatorname{GL}',
            'SL' =>     'operatorname{SL}',
            'O'  =>    'operatorname{O}',
            'SO' =>     'operatorname{SO}',
            'U' =>      'operatorname{U}',
            'SU' =>     'operatorname{SU}',
            'Sp' =>     'operatorname{Sp}',
            'gl' =>    'mathfrak{gl}',
            'sl' =>     'mathfrak{sl}',
            'o' =>      'mathfrak{o}',
            'so' =>     'mathfrak{so}',
            'u' =>      'mathfrak{u}',
            'su' =>     'mathfrak{su}',
            'sp' =>     'mathfrak{sp}',
            'Pic' =>    'operatorname{Pic}',
            'NS' =>     'operatorname{NS}'
        );

        foreach($replace as $key => $value )
        {
            $text = preg_replace("/\\\\$key([_\\W])/", "\\\\$value$1", $text);
        }
    }
}