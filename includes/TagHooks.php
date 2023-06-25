<?php

//use MediaWiki\Shell\Shell;
//use MediaWiki\Logger\LoggerFactory;

class tagHooks{
    private static $blockTag = 1;
    private static $rightTag = 1;
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
        // $parser->setHook( 'cref', [self::class, 'crefRender']);

        $parser->setHook( 'proofc', [self::class, 'proofcRender']);
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
        $content->setAttribute('class', 'mw-collapsible-content');
        $div_mw_colla->appendChild($content);

        return str_replace($source_hash, $source_code, $dom->saveHTML());
    }

    public static function definitionRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'definition', '定义');
    }

    public static function theoremRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'theorem', '定理');
    }

    public static function propositionRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'proposition', '命题');
    }

    public static function corollaryRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'corollary', '推论');
    }

    public static function lemmaRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'lemma', '引理');
    }

    public static function remarkRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'remark', '注');
    }

    public static function exampleRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        return self::commonEnvironment($input, $args, $parser, $frame, 'example', '例');
    }

    private static function commonEnvironment( $input, array $args, Parser $parser, PPFrame $frame, string $className, string $title)
    {
        $dom = new DOMDocument();
        $blockquote = $dom->createElement('blockquote');
        $blockquote->setAttribute('class', $className);
        if( array_key_exists('id', $args) )
        {
            $blockquote->setAttribute('id', $args['id']);
        }
        $dom->appendChild($blockquote);

        // 构造标题字符串
        $tag = self::$blockTag;
        $titletag = $title . ' ' . "$tag" . ' ';
        self::$blockTag++;
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
        //获得svg图片代码
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

        if( array_key_exists('tag', $args) && $args['tag'] == 'true' )
        {
            // 如果tag属性存在且为'true'则添加编号.
            $tag = self::$rightTag;
            $span = $dom->createElement('span', '(' . "$tag" . ')');
            self::$rightTag++;
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

        $tag = self::$rightTag;
        $span = $dom->createElement('span', '(' . $tag . ')');
        self::$rightTag++;
        $span->setAttribute('class', 'right-tag');
        $div->appendChild($span);

        return [str_replace($source_hash, $source_code, $dom->saveHTML()), 'markerType' => 'nowiki'];
    }
}