<?php
require_once 'Visitor.php';
require_once '../vendor/autoload.php';
require_once 'ErrorListener.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

class praticeVisitor extends Visitor
{
    public function labelCommand(string|null $option_arg, array $arg, Context\CommandContext $ctx):string
    {
        $this->id[array_key_last($this->id)] = $arg[0];
        return '';
    }

    public function refCommand(string|null $option_arg, array $necessary_args, Context\CommandContext $ctx):string
    {
        $ret = '<cref ';
        if($option_arg != null) $ret .= 'page="' . $option_arg . '" ';
        $ret .= 'id="' . $necessary_args[0] . '" />';
        return $ret;
    }

    public function proofcEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, Context\EnvironmentContext $ctx):string
    {
        return "<proofc>$content</proofc>";
    }

    public function equationEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, Context\EnvironmentContext $ctx):string
    {
        $out = '<math';
        if($id !== null)
        {
            $out .=  ' id="' . $id . '"';
        }
        $out .= '>';
        $out .= $content . '</math>';
        return $out;
    }

    public function commonEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, Context\EnvironmentContext $ctx):string
    {
        $name = $ctx->PLAIN_TEXT(0)->getText();
        $out = "<$name";

        if($id !== null)
        {
            $out .=  ' id="' . $id . '"';
            $content = "\n" . trim($content) . "\n";
        }

        if($option_arg != null)
        {
            $out .= ' name="' . $option_arg . '"';
        }
        $out .= '>';

        $out .= $content;
        $out .= "</$name>";
        return $out;
    }

    public function __construct()
    {
        $this->newcommands['\label'] = [[$this, 'labelCommand'], 1, null];
        $this->newcommands['\ref'] = [[$this, 'refCommand'], 2, ''];
        $this->newenvironments['proofc'] = [[$this, 'proofcEnvironment'], 0, null];
        $this->newenvironments['equation'] = [[$this, 'equationEnvironment'], 1, ''];
        $this->newenvironments['theorem'] = [[$this, 'commonEnvironment'], 1, ''];
    }
}

function Translator(string $text, string $preText = ''):array
{
    $source = $preText . $text;

    $input = InputStream::fromString($source);
    $lexer = new atexLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new atexParser($tokens);
 
    $errorListener = new ErrorListener();
    $parser->addErrorListener($errorListener);

    $visitor = new praticeVisitor();

    $output = $visitor->visit($parser->begin());

    if($parser->getNumberOfSyntaxErrors() > 0)
    {
        return [false, $output, $errorListener->errorOut];
    }
    else
    {
        return [true, $output];
    }
}

$text = '\begin{theorem}
\begin{equation} 
\label{adc}
\begin{pmatrix}
a & b \\\\
c & d
\end{pmatrix}
=
\begin{pmatrix}
a & b \\\\
c & d
\end{pmatrix}
\end{equation}
\ref{adc}
$$
\begin{aligned}
E &= mc^2 \\\\
F &= \frac{dp}{dt}
\end{aligned}
$$
\end{theorem}';

$text2 = '\newcommand{\R}[2][C]{\mathbb{#1}\mathscr{#2}}
\begin{theorem}
\label{adc}
\ref{adc}
\R[d]{df}
\end{theorem}
\fra';
//ini_set('memory_limit', '512M');
//Translator($text2);
var_dump(Translator($text));