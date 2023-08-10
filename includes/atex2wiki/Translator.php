<?php
require_once 'vendor/autoload.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;

class Listener extends atexBaseListener
{
    public string $out='';

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

    public function exitIn_math_inline(Context\In_math_inlineContext $ctx):void
    {
        if($ctx->SYMBOL_MATH() != null )
        {
            echo $ctx->SYMBOL_MATH()->getText();
            echo "\n";
        }
        if($ctx->BRACE1() != null )
        {
            echo $ctx->BRACE1()->getText();
            echo "\n";
        }
        if($ctx->BRACE2() != null )
        {
            echo $ctx->BRACE2()->getText();
            echo "\n";
        }
        if($ctx->BRACKET1() != null )
        {
            echo $ctx->BRACKET1()->getText();
            echo "\n";
        }
        if($ctx->BRACKET2() != null )
        {
            echo $ctx->BRACKET2()->getText();
            echo "\n";
        }
    }
    public function exitNecessary_real_arg(Context\Necessary_real_argContext $ctx):void
    {
        if($ctx->BRACKET1() != null)
        {
            echo $ctx->BRACKET1()->getText();
            echo "a\n";
        }
        if($ctx->BRACKET2() != null)
        {
            echo $ctx->BRACKET2()->getText();
            echo "a\n";
        }
        if($ctx->PLAIN_TEXT() != null)
        {
            echo $ctx->PLAIN_TEXT()->getText();
            echo "1\n";
        }
        if($ctx->SYMBOL_ARGS() != null)
        {
            echo $ctx->SYMBOL_ARGS()->getText();
            echo "2\n";
        }
    }
}

$text = '${agg}[ab]$';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$parser->addParseListener(new Listener());

$parser->start();