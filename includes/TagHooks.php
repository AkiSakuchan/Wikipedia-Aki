<?php

//use MediaWiki\Shell\Shell;
//use MediaWiki\Logger\LoggerFactory;

class TagHooks{
    private static $preamble = "\\usepackage{amsmath}\n\\usepackage{amsfonts}\n\\usepackage{mathrsfs}\n\\usepackage{amssymb}\n";
    private static $preambleTikzcd = $preamble."\\usepackage{tikz-cd}\n";

    public static function onParserFirstCallInit( Parser $parser)
    {
        $parser->setHook( 'math', [ self::class, 'mathRender']);
        $parser->setHook( 'tikzcd', [ self::class, 'tikzcdRender']);
    }
    public static function mathRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        $displayMode = 'inline';
        $text = '';
        if( $args['display'] == 'inline' || $args['display'] == null)
        {
            $displayMode = 'inline';
            $text = "\\documentclass{standalone}\n" . self::$preamble . "\\begin{document}\n";
            $text .= "\$" . $input . "\$\n";
        }
        else if( $args['display'] == 'block')
        {
            $displayMode = 'block';
            $text = "\\documentclass{standalone}\n" . self::$preamble . "\\begin{document}\n";
            $text .= "\$\\displaystyle " . $input . "\$\n";
        }
        else
        {
            return self::argsError('display');
        }
        $text .= "\\end{document}";

        $texfile = fopen(__DIR__.'/main.tex','w');
        if($texfile == false) return self::fileError('o');
        $length = fwrite($texfile, $text);
        if($length == false) return self::fileError('w');
        fclose($texfile);

        $execStatus = exec( '/usr/bin/pdflatex -output-directory='.__DIR__.' '.__DIR__.'/main.tex' );
        if($execStatus == false) return self::execError(1);
        
        $execStatus = exec( 'pdf2svg '.__DIR__.'/main.pdf'.' '.__DIR__.'/main.svg');

        $dom = new DOMDocument();
        if($dom->load(__DIR__.'/main.svg') == false) return self::fileError('os');

        exec( 'rm '.__DIR__.'/main.*');
        
        $rootNode = $dom->documentElement;

        if($displayMode == 'inline')
        {
            $rootNode->setAttribute('class', 'inline-formule');
            return [$dom->saveHTML(), 'markerType' => 'nowiki'];
        }
        else
        {
            $rootNode->setAttribute('class', 'block-formule');
        }

        $newdom = new DOMDocument();
        
        $divcontainer = $newdom->createElement('div');
        $newdom->appendChild($divcontainer);
        $spancontainer = $newdom->createElement('span');
        $divcontainer->appendChild($spancontainer);
        $svgNode = $newdom->importNode($rootNode, true);
        $spancontainer->appendChild($svgNode);

        $divcontainer->setAttribute('class', 'block-formule-div');
        $spancontainer->setAttribute('class', 'block-formule-span');

        return [$newdom->saveHTML(), 'markerType' => 'nowiki'];
    }

    public static function tikzcdRender( $input, array $args, Parser $parser, PPFrame $frame)
    {
        $text = "\\documentclass[tikz]{standalone}\n" . self::$preambleTikzcd . "\\begin{document}\n";
        $text .= "\\begin{tikzcd}[sep=huge]\n" . $input . "\\end{tikzcd}\n\\end{document}";

        $texfile = fopen(__DIR__.'/main.tex','w');
        if($texfile == false) return self::fileError('o');
        $length = fwrite($texfile, $text);
        if($length == false) return self::fileError('w');
        fclose($texfile);

        $execStatus = exec( '/usr/bin/pdflatex -output-directory='.__DIR__.' '.__DIR__.'/main.tex' );
        if($execStatus == false) return self::execError(1);
        
        $execStatus = exec( 'pdf2svg '.__DIR__.'/main.pdf'.' '.__DIR__.'/main.svg');

        $dom = new DOMDocument();
        if($dom->load(__DIR__.'/main.svg') == false) return self::fileError('os');

        exec( 'rm '.__DIR__.'/main.*');
        
        $rootNode = $dom->documentElement;
        $rootNode->setAttribute('class', 'tikz-commutative-diagram');

        $newdom = new DOMDocument();

        $divcontainer = $newdom->createElement('div');
        $newdom->appendChild($divcontainer);
        $spancontainer = $newdom->createElement('span');
        $divcontainer->appendChild($spancontainer);
        $svgNode = $newdom->importNode($rootNode, true);
        $spancontainer->appendChild($svgNode);

        $divcontainer->setAttribute('class', 'block-formule-div');
        $spancontainer->setAttribute('class', 'block-formule-span');

        return [$newdom->saveHTML(), 'markerType' => 'nowiki'];
    }

    public static function argsError($arg)
    {
        return $arg . 'error';
    }

    public static function fileError($status)
    {
        if( $status = 'o') return 'Cannot open file';
        if( $status = 'w') return 'Cannot write file';
        if( $status = 'os') return 'Cannot open svg';
    }

    public static function execError($status)
    {
        switch($status)
        {
            case 1: return 'Error in generating main.pdf';
            case 2: return 'Error in generating main.svg';
        }
    }
}