<?php
require_once 'Listener.php';
require_once 'newCommand.php';
require_once '../vendor/autoload.php';
require_once 'ErrorListener.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

class praticeListener extends Listener
{
    private function labelCommand(string|null $option_arg, array $arg, Antlr\Antlr4\Runtime\ParserRuleContext $ctx):string
    {
        array_push($this->id, $arg[0]);
        return '';
    }

    private function refCommand(string|null $option_arg, array $necessary_args, Antlr\Antlr4\Runtime\ParserRuleContext $ctx):string
    {
        $ret = '<cref ';
        if($option_arg !== null) $ret .= 'page="' . $option_arg . '" ';
        $ret .= 'id="' . $necessary_args[0] . '" />';
        return $ret;
    }

    private function proofcEnvironment(string|null $option_arg, array $necessary_args, string $content, Antlr\Antlr4\Runtime\ParserRuleContext $ctx):string
    {
        return "<proofc>$content</proofc>";
    }

    public function __construct()
    {
        $this->newcommands['\label'] = new newCommand($this->labelCommand(...), 1, null);
        $this->newcommands['\ref'] = new newCommand($this->refCommand(...), 2, '');
        $this->newenvironments['proofc'] = new newEnvironment($this->proofcEnvironment(...), 0, null);
    }
}

function Translator(string $text, string $preText = ''):array
{
    $source = $preText . $text;

    $input = InputStream::fromString($source);
    $lexer = new atexLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new atexParser($tokens);
    $listener = new praticeListener();
    $parser->addParseListener($listener);
    $errorListener = new ErrorListener();
    $parser->addErrorListener($errorListener);
    $parser->begin();

    $output = $listener->out;

    if($parser->getNumberOfSyntaxErrors() > 0)
    {
        return [false, $output, $errorListener->errorOut];
    }
    else
    {
        return [true, $output];
    }
}

$text = '\label{ida}';
Translator($text);
//var_dump(Translator($text));