<?php

//use MediaWiki\Shell\Shell;
//use MediaWiki\Logger\LoggerFactory;

class tagHooks{
    public static function onParserFirstCallInit( Parser $parser)
    {
        //$parser->setHook( 'math', [ self::class, 'mathRender']);
        //$parser->setHook( 'tikzcd', [ self::class, 'tikzcdRender']);

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

        $title = $dom->createElement('span', '证明:'); //这将被放在开头并且通过css加粗
        $title->setAttribute('class', 'env-title');    //将在css中控制env-title的样式
        $div_mw_colla->appendChild($title);

        $content = $dom->createElement('div');
        $content->setAttribute('class', 'mw-collapsible-content');
        $div_mw_colla->appendChild($content);

        $content_dom = new DOMDocument();
        $content_dom->loadHTML(mb_convert_encoding($parser->recursiveTagParse($input, $frame), 'HTML-ENTITIES', 'UTF-8'));
        
        $input_content = $dom->importNode($content_dom->documentElement, true);
        $content->appendChild($input_content);
        return $dom->saveHTML();
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
        $dom->appendChild($blockquote);

        $blockquote->setAttribute('class', $className);
        if($args['id'] != null ) $blockquote->setAttribute('id', $args['id']);

        $content_dom = new DOMDocument();
        $content_dom->loadHTML(mb_convert_encoding($parser->recursiveTagParse($input, $frame), 'HTML-ENTITIES', 'UTF-8'));

        $input_content = $dom->importNode($content_dom->documentElement, true);
        $blockquote->appendChild($input_content);
        return $dom->saveHTML();
    }
}