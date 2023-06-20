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
        $parser->setHook( 'proofc', [self::class, 'proofcRender']);
    }

    public static function proofcRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        
    }
}