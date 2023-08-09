<?php
require_once 'vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;

class Listener extends atexBaseListener
{
    public string $out;

    private string $current_out;

    private string $id;

    public function enterStart(Context\StartContext $ctx):void
    {
        $this->current_out = '';
    }
    public function exitStart(Context\StartContext $ctx):void
    {
        $this->out .= $this->current_out;
    }
}

$text = '\fr{bbb $()^_a{}$ aaa $_[]$}';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$parser->addParseListener(new Listener());

$parser->start();