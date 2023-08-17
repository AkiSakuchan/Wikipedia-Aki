<?php
require_once 'Visitor.php';
require_once 'ErrorListener.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Context\CommandContext;
use Context\EnvironmentContext;

class praticeVisitor extends Visitor
{
    public function labelCommand(string|null $option_arg, array $arg, CommandContext $ctx):string
    {
        $this->id[array_key_last($this->id)] = $arg[0];
        return '';
    }

    public function refCommand(string|null $option_arg, array $necessary_args, CommandContext $ctx):string
    {
        $ret = '<cref ';
        if($option_arg != null) $ret .= 'page="' . $option_arg . '" ';
        $ret .= 'id="' . $necessary_args[0] . '" />';
        return $ret;
    }

    public function proofcEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
    {
        return "<proofc>$content</proofc>";
    }

    public function equationEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
    {
        $out = '<math';
        if($id !== null)
        {
            $out .=  ' id="' . $id . '"';
        }
        $out .= '>';
        $out .= $content . '</math>';
        $this->isInMath = false;
        return $out;
    }

    public function commonEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
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
        $this->newenvironments['equation'] = [[$this, 'equationEnvironment'], 0, null, 'math' => true];
        $this->newenvironments['theorem'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['proposition'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['lemma'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['corollary'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['definition'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['remark'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['example'] = [[$this, 'commonEnvironment'], 1, ''];
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

    try
    {
        $output = $visitor->visit($parser->begin());
    }
    catch(RecognitionException $err)
    {
        return [false, [[$err->getLine() , $err->getCtx()->getText() , $err->getMessage()]]];
    }

    if($parser->getNumberOfSyntaxErrors() > 0)
    {
        return [false, $errorListener->errorOut];
    }
    else
    {
        return [true, $output];
    }
}

$text = '\ref{ad}';

var_dump(Translator($text));