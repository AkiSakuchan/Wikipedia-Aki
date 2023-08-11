<?php
require_once 'vendor/autoload.php';
require_once 'ErrorListener.php';
require_once 'newCommand.php';

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\InputStream;

class Listener extends atexBaseListener
{
    private bool $errorOccurred;
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

    public function enterStart(Context\StartContext $ctx):void
    {
        $this->errorOccurred = false;

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
        if($this->errorOccurred) return;

        $COMMAND = $ctx->COMMAND();
        $name = $COMMAND->getText();
        $option_args = '';

        // 检查可选参数数量
        if($ctx->option_args() != null)
        {
            if(count($ctx->option_args()) > 1)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx,"$name 命令中给了太多的可选参数");
            }
            $option_args = array_pop($this->option_args);
        }

        $necessary_args = $ctx->necessary_args();
        if($name == '\ref')
        {
            $ret = '<cref ';
            
            if(count($necessary_args) > 1)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx,"$name 命令参数太多");
            }
            else if(count($necessary_args) < 1)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx,"$name 命令参数太少");
            }
            
            if($option_args != '')
            {
                $ret .= 'page="' . $option_args .'" ';
            }
            $ret .= 'id="' . array_pop($this->necessary_args) .'" />';
            array_push($this->command,$ret);

            return;
        }

        if($name == '\label')
        {
            if($option_args != '')
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx, "$name 的参数应该用花括号");
            }
            if(count($necessary_args) > 1)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx,"$name 命令参数太多");
            }
            else if(count($necessary_args) < 1)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx,"$name 命令参数太少");
            }

            $this->id = array_pop($this->necessary_args);
            return;
        }

        // 在option_args和necessary_args的监听函数中, 要保证每执行一次就压入一个字符串, 哪怕是空串
        // 从栈中取出相关参数
        $necessary_real_args = [];
        if($necessary_args != null)
        {
            foreach($necessary_args as $i)
            {
                array_unshift($necessary_real_args, array_pop($this->necessary_args));
            }
        }

        if(array_key_exists($name, $this->newcommands))
        {
            ;
        }
        else
        {
            $out = $name;
            if($option_args != '') $out .= "[$option_args]";
            foreach($necessary_real_args as $arg)
            {
                $out .='{' . $arg .'}';
            }
        }
        
        array_push($this->command, $out);
    }

    public function exitOption_arg(Context\Option_argContext $ctx):void
    {
        if($ctx->command() != null)
        {
            array_push($this->option_arg, array_pop($this->command));
        }
        else if($ctx->math_inline() != null)
        {
            array_push($this->option_arg, array_pop($this->math_inline));
        }
        else
        {
            array_push($this->option_arg, $ctx->getText());
        }
    }

    public function exitOption_args(Context\Option_argsContext $ctx):void
    {
        if($ctx->option_arg() == null)
        {
            array_push($this->option_args, '');
        }
        else
        {
            $out = '';
            foreach($ctx->option_arg() as $i)
            {
                $tmp = array_pop($this->option_arg);
                $out = $tmp . $out;
            }
            array_push($this->option_args, $out);
        }
    }

    public function exitNecessary_arg(Context\Necessary_argContext $ctx):void
    {
        if($ctx->command() != null)
        {
            array_push($this->necessary_arg, array_pop($this->command));
        }
        else if($ctx->math_inline() != null)
        {
            array_push($this->necessary_arg, array_pop($this->math_inline));
        }
        else
        {
            array_push($this->necessary_arg, $ctx->getText());
        }
    }

    public function exitNecessary_args(Context\Necessary_argsContext $ctx):void
    {
        if($ctx->necessary_arg() == null)
        {
            array_push($this->necessary_args, '');
        }
        else
        {
            $out = '';
            foreach($ctx->necessary_arg() as $i)
            {
                $tmp = array_pop($this->necessary_arg);
                $out = $tmp . $out;
            }
            array_push($this->necessary_args, $out);
        }
    }

    public function exitNewcommand(Context\NewcommandContext $ctx):void
    {
        if($this->errorOccurred) return;

        $COMMAND = $ctx->COMMAND();
        $option_args = $ctx->option_args();
        $default_arg = null;
        $number = 0;
        
        if($option_args != null )
        {
            switch(count($option_args))
            {
                case 1: $number = $this->isValid(array_pop($this->option_args));break;
                case 2: $default_arg = array_pop($this->option_args); $number = $this->isValid(array_pop($this->option_args));break;
                default: $this->errorOccurred = true; throw new RecognitionException(null, null, $ctx, "定义命令 $COMMAND 时参数太多");
            }
            
            if($number == false)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx, '定义命令时参数数量必须是1-9的数字');
            }
        }
        
        $content = array_pop($this->necessary_args);
        
        $this->newcommands[$COMMAND->getText()] = new newCommand($content, $number, $default_arg);
    }

    private function isValid(string $str):int|false
    {
        if(strlen($str) != 1) return false;

        $ret = intval($str);
        if($ret == 0) return false;
        else return $ret;
    }
}

$text = '\newcommand{\R}[1][]{\mathbb{#1}}
\en{a}';

$input = InputStream::fromString($text);
$lexer = new atexLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new atexParser($tokens);
$listener = new Listener();
$parser->addParseListener($listener);
$parser->addErrorListener(new ErrorListener);
$parser->begin();

//echo $parser->getNumberOfSyntaxErrors();

echo $listener->out;