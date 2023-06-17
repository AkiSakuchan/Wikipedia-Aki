<?php

//use MediaWiki\Shell\Shell;
//use MediaWiki\Logger\LoggerFactory;

class TagHooks{
    private static $preamble = "\\usepackage{amsmath}\n\\usepackage{amsfonts}\n\\usepackage{mathrsfs}\n\\usepackage{amssymb}\n";

    public static function onParserFirstCallInit( Parser $parser)
    {
        $parser->setHook( 'math', [ self::class, 'tagRender']);
    }
    public static function tagRender( $input, array $args, Parser $parser, PPFrame $frame){
        $text = "\\documentclass{standalone}\n" . self::$preamble . "\\begin{document}\n";
        if( $args['display'] == 'inline')
        {
            $text .= "\$" . $input . "\$\n";
        }
        else if( $args['display'] == 'block')
        {
            $text .= "\$\\displaystyle" . $input . "\$\n";
        }
        else
        {
            return self::argsError('display');
        }
        $text .= "\\end{document}";

        $texfile = fopen('extensions/ConvertLaTeX/main.tex','w');
        if($texfile == false) return self::fileError('o');
        $length = fwrite($texfile, $text);
        if($length == false) return self::fileError('w');
        fclose($texfile);

        $execStatus = exec( '/usr/bin/pdflatex -output-directory=extensions/ConvertLaTeX extensions/ConvertLaTeX/main.tex' );
        if($execStatus == false) return self::execError(1);
        
        $execStatus = exec( 'pdf2svg extensions/ConvertLaTeX/main.pdf extensions/ConvertLaTeX/main.svg');
        if($execStatus == false) return self::execError(3);

        $svgfile = fopen('extensions/ConvertLaTeX/main.svg','r');
        if($svgfile == false) return self::fileError('o');
        fgets($svgfile);
        $content = '';
        while(!feof($svgfile))
        {
            $line = fgets($svgfile);
            $content .= $line;
        }
        fclose($svgfile);
        exec( 'rm extensions/ConvertLaTeX/main.*');
        return [$content, 'markerType' => 'nowiki'];
    }

    public static function argsError($arg)
    {
        return $arg . 'error';
    }

    public static function fileError($status)
    {
        if( $status = 'o') return 'Cannot open file';
        if( $status = 'w') return 'Cannot write file';
    }

    public static function execError($status)
    {
        switch($status)
        {
            case 1: return 'Error in generating main.pdf';
            case 2: return 'Error in clipping main.pdf';
            case 3: return 'Error in generating out.svg';
        }
    }
}