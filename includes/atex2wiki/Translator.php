<?php
require_once 'vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;

class Listener extends atexBaseListener
{
    public string $out;

    private string $command;
    private string $environment;
    private string $math_inline;
    private string $math_display;
    private string $multi_plain_text;
    private array $newcommands;

    private string $id;

    public function enterStart(Context\StartContext $ctx):void
    {
        $this->command = '';
        $this->environment = '';
        $this->math_inline = '';
        $this->math_display = '';
        $this->multi_plain_text = '';
    }
    public function exitStart(Context\StartContext $ctx):void
    {
        if($ctx->command() != null ) $this->out .= $this->command;
        else if($ctx->environment() != null ) $this->out .= $this->environment;
        else if($ctx->math_inline() != null ) $this->out .= $this->math_inline;
        else if($ctx->math_display() != null ) $this->out.= $this->math_display;
        else if($ctx->multi_plain_text() != null) $this->out .= $this->multi_plain_text;
    }

    public function exitMulti_plain_text(Context\Multi_plain_textContext $ctx):void
    {
        $this->multi_plain_text = $ctx->getText();
    }
}

$text = '\fr{bbb $()^_a{}$ aaa $_[]$}';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$parser->addParseListener(new Listener());

$parser->start();