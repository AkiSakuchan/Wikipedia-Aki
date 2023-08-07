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
        echo $ctx->COMMAND()->getText();
        echo "\n";
    }

    public function exitMath_display(Context\Math_displayContext $ctx):void
    {
        echo '<yamath display="true">' . $ctx->in_math()->getText() . '</yamath>';
    }

    public function exitStart(Context\StartContext $ctx):void
    {
        //echo $ctx->getText();
    }
}

$text = '$$\frac{ 3 }{ \rome \a_{2} }$$';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$parser->addParseListener(new Listener());

$parser->start();