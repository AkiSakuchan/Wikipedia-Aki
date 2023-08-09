<?php
require_once 'vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;

class Listener extends atexBaseListener
{
    private string $out;

    private string $id;

    public function enterCommand(Context\CommandContext $ctx):void
    {
    }
    public function exitCommand(Context\CommandContext $ctx):void
    {
        //echo $ctx->getText();
        //echo "\n";
    }

    public function exitOption_real_arg(Context\Option_real_argContext $ctx):void
    {
        echo $ctx->getText();
        echo "1\n";
    }

    public function exitNecessary_real_arg(Context\Necessary_real_argContext $ctx):void
    {
        echo $ctx->getText();
        echo "2\n";
    }

    public function exitStart(Context\StartContext $ctx):void
    {
        //echo $ctx->getText();
    }
}

$text = '\frac[acdd]{ ABC }';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$parser->addParseListener(new Listener());

$parser->start();