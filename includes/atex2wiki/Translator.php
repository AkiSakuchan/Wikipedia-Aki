<?php
require_once 'vendor/autoload.php';
require_once 'SyntaxError.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\InputStream;

class Listener extends atexBaseListener
{
    public string $out='';

    private array $command;
    private array $environment;
    private array $math_inline;
    private array $math_display;
    private array $multi_plain_text;
    private array $newcommands=[];

    private array $option_args;
    private array $option_arg;
    private array $necessary_args;
    private array $necessary_arg;

    private array $in_math_inline;
    private array $in_math_display;

    private string $id;
    private string $page;

    public function enterStart(Context\StartContext $ctx):void
    {
        $this->command = [];
        $this->environment = [];
        $this->math_inline = [];
        $this->math_display = [];
        $this->multi_plain_text = [];
        $this->option_arg = [];
        $this->option_args = [];
        $this->necessary_arg = [];
        $this->necessary_args = [];
        $this->in_math_display = [];
        $this->in_math_inline = [];
    }
    public function exitStart(Context\StartContext $ctx):void
    {
        if($ctx->command() != null ) $this->out .= array_pop($this->command);
        else if($ctx->environment() != null ) $this->out .= array_pop($this->environment);
        else if($ctx->math_inline() != null ) $this->out .= array_pop($this->math_inline);
        else if($ctx->math_display() != null ) $this->out.= array_pop($this->math_display);
        else if($ctx->multi_plain_text() != null) $this->out .= array_pop($this->multi_plain_text);
    }

    public function exitMulti_plain_text(Context\Multi_plain_textContext $ctx):void
    {
        array_push($this->multi_plain_text, $ctx->getText());
    }

    public function exitCommand(Context\CommandContext $ctx):void
    {
        if($ctx->COMMAND()->getText() == '\\ref')
        {
            $ret = '<cref ';
            $necessary_args = $ctx->necessary_args();
            if(count($necessary_args) > 1)
            {
                throw new SyntaxError("命令参数太多", $ctx->COMMAND()->getSymbol()->getLine());
            }
            else if(count($necessary_args) < 1)
            {
                throw new SyntaxError("命令参数太少", $ctx->COMMAND()->getSymbol()->getLine());
            }
            $option_args = $ctx->option_args();
            if($option_args != null && $option_args->getText() != '')
            {
                $ret .= 'page="' . $option_args->getText() .'" ';
            }
            $ret .= 'id="' . $necessary_args[0]->getText() .'" />';
            array_push($this->command,$ret);

            return;
        }
    }
}

$text = 'a\ref[局部紧空间]{单点紧化}
\ref{anb}{}';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$listener = new Listener();
$parser->addParseListener($listener);
try
{
    $parser->begin();
}catch(Exception $err)
{
    if( $err instanceof SyntaxError)
    {
        echo '第' . $err->getLine(). '行: '. $err->getMessage() ."\n";
    }
    else
    {
        throw $err;
    }
}

echo $listener->out;