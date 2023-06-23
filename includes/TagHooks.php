<?php

//use MediaWiki\Shell\Shell;
//use MediaWiki\Logger\LoggerFactory;

class tagHooks{
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
        // 因为直接用输入字符串创建div会导致DOM组件识别到&之类的常见符号时出错, 但是又需要把这些字符直接传递给客户端进行数学解析等
        // 因此先计算输入字符串的哈希值, 填充div, 最后用原本的字符串替换这个哈希值. 
        // 同时直接用PHP的DOM解析wiki解析成的代码也会出现乱码(需要转换为HTML的编码), 因此用替换的方式也可以避免这个问题
        $source_code = $parser->recursiveTagParse($input, $frame);
        $source_hash = hash('md5', $source_code);

        $dom = new DOMDocument();
        $blockquote = $dom->createElement('blockquote', $source_hash);
        $dom->appendChild($blockquote);

        $blockquote->setAttribute('class', $className);
        if( array_key_exists('id', $args) )
        {
            $blockquote->setAttribute('id', $args['id']);
        }

        return str_replace($source_hash, $source_code, $dom->saveHTML());
    }

    public static function tikzcdRender($input, array $args, Parser $parser, PPFrame $frame)
    {
        $ch = curl_init('http://127.0.0.1');
        $source = array('type' => 'tikzcd', 'tex' => $input);
        if( array_key_exists('option', $args)) $source['option'] = $args['option'];

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

        $dom = new DOMDocument();
        $div_container = $dom->createElement('div');
        $dom->appendChild($div_container);

        if( array_key_exists('tag', $args) && $args['tag'] == 'true' )
        {
            // 如果tag属性存在且为'true'则设置right-tag类使其自动编号.
            $div_container->setAttribute('class', 'tikzcd-container right-tag');

            $tag = $dom->createElement('span');
            $tag->setAttribute('class', 'right-tag');
            $div_container->appendChild($tag);
        }
        else
        {
            $div_container->setAttribute('class', 'tikzcd-container');
        }
        
        if( array_key_exists('id', $args) ) $div_container->setAttribute('id', $args['id']);

        $content_dom = new DOMDocument();
        $content_dom->loadXML($svg_xml);

        $svg_content = $content_dom->getElementsByTagName('svg')->item(0);
        $svg = $dom->importNode($svg_content, true);
        $svg->setAttribute('class', 'tikzcd-itself');
        $svg->removeAttribute('width');
        $height = floatval($svg->getAttribute('height'))*1.6;
        $svg->setAttribute('height', $height.'pt');
        $div_container->appendChild($svg);
        return [$dom->saveHTML(), 'markerType' => 'nowiki'];
    }

    public static function mathRender($input, array $args, Parser $parser, PPFrame $frame)
    {
        // 默认生成编号公式.
        $dom = new DOMDocument();

        // 因为直接用输入字符串创建div会导致DOM组件识别到&之类的在TeX中很常见的符号时出错, 但是又需要把这些字符直接传递给客户端进行数学解析
        // 因此先计算输入字符串的哈希值, 填充div, 最后用原本的字符串替换这个哈希值.
        $source_code = '$$' . $input . '$$';
        $source_hash = hash('md5', $source_code);
        $container = $dom->createElement('div', $source_hash);
        $dom->appendChild($container);
        if(array_key_exists('id', $args)) $container->setAttribute('id', $args['id']);
        
        if( !(array_key_exists('tag', $args) && $args['tag'] == 'false') )
        {
            $container->setAttribute('class', 'right-tag'); //这个类配合css实现行间公式自动编号.

            $tag = $dom->createElement('span');
            $tag->setAttribute('class', 'right-tag');
            $container->appendChild($tag);
        }

        return [str_replace($source_hash, $source_code, $dom->saveHTML()), 'markerType' => 'nowiki'];
    }
}