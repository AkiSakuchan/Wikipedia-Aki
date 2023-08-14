<?php
require_once '../vendor/autoload.php';
require_once 'ErrorListener.php';
require_once 'newCommand.php';
require_once 'newEnvironment.php';


use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;


class Listener extends atexBaseListener
{
    private bool $errorOccurred;
    public string $out='';

    protected array $command;
    protected array $environment;
    protected array $math_inline;
    protected array $math_display;
    protected array $multi_plain_text;
    protected array $newcommands = [];
    protected array $newenvironments = [];

    protected array $option_args;
    protected array $option_arg;
    protected array $necessary_args;
    protected array $necessary_arg;

    protected array $in_math_inline;
    protected array $in_math_display;
    protected array $in_env;

    protected array $escaped_char;

    protected array $id;

    protected bool $isInMath;

    public function enterStart(Context\StartContext $ctx):void
    {
        $this->errorOccurred = false;
        $this->isInMath = false;

        $this->command = [];
        $this->environment = [];
        $this->id = [];
        $this->math_inline = [];
        $this->math_display = [];
        $this->multi_plain_text = [];
        $this->option_arg = [];
        $this->option_args = [];
        $this->necessary_arg = [];
        $this->necessary_args = [];
        $this->in_math_display = [];
        $this->in_math_inline = [];
        $this->in_env = [];
        $this->escaped_char = [];
    }
    public function exitStart(Context\StartContext $ctx):void
    {
        if($ctx->command() != null ) $this->out .= array_pop($this->command);
        else if($ctx->environment() != null ) $this->out .= array_pop($this->environment);
        else if($ctx->math_inline() != null ) $this->out .= array_pop($this->math_inline);
        else if($ctx->math_display() != null ) $this->out.= array_pop($this->math_display);
        else if($ctx->multi_plain_text() != null) $this->out .= array_pop($this->multi_plain_text);
        else if($ctx->escaped_char() != null) $this->out .= array_pop($this->escaped_char);
    }

    public function exitEscaped_char(Context\Escaped_charContext $ctx):void
    {
        // 如果在数学模式里, 则不进行转义, 由KaTex去处理
        $str = $ctx->getText();
        if($this->isInMath && ($str == '\{' || $str == '\}')) array_push($this->escaped_char, $str);
        else array_push($this->escaped_char, ltrim($str, '\\'));
    }

    public function exitMulti_plain_text(Context\Multi_plain_textContext $ctx):void
    {
        array_push($this->multi_plain_text, $ctx->getText());
    }

    public function exitCommand(Context\CommandContext $ctx):void
    {
        if($this->errorOccurred) return;

        $name = $ctx->COMMAND()->getText();
        $option_args = null;

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

        // 在option_args和necessary_args的监听函数中, 要保证每执行一次就压入一个字符串, 哪怕是空串
        // 从栈中取出相关参数
        $necessary_args = [];
        if($ctx->necessary_args() != null)
        {
            foreach($ctx->necessary_args() as $i)
            {
                array_unshift($necessary_args, array_pop($this->necessary_args));
            }
        }

        if(array_key_exists($name, $this->newcommands))
        {
            $define = $this->newcommands[$name];
            $content = $define->content;
            $option_args = $this->checkArgsNumber($name, $ctx, $define, $option_args, count($necessary_args));

            if(is_string($content))
            {
                if($option_args === null)
                {
                    // 把命令定义中的符号参数替换为实际参数
                    $i = 1;
                    $out = $content;
                    foreach($necessary_args as $real_arg)
                    {
                        $out = str_replace("#$i", $real_arg, $out);
                        $i++;
                    }
                }
                else
                {
                    $out = $content;
                    $out = str_replace('#1', $option_args,$out);

                    $i = 2;
                    foreach($necessary_args as $real_arg)
                    {
                        $out = str_replace("#$i", $real_arg, $out);
                        $i++;
                    }
                }
            }
            else
            {
                // 如果命令体是一个函数, 就调用它来处理
                $out = $content($option_args, $necessary_args, $ctx);
            }
        }
        else
        {
            $out = $name;
            if($option_args != '') $out .= "[$option_args]";
            foreach($necessary_args as $arg)
            {
                $out .='{' . $arg .'}';
            }
        }
        
        array_push($this->command, $out);
    }

    /**
	 * {@inheritdoc}
	 *
	 * 检查环境和命令的参数数量, 并得到实际的可选参数
	 */
    private function checkArgsNumber(string $name, 
                                    Antlr\Antlr4\Runtime\ParserRuleContext $ctx, 
                                    newCommand|newEnvironment $define, 
                                    string|null $option_arg, 
                                    int $number):string|null
    {
        if($define->default_arg === null)
        {
            if($option_arg !== null)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null,null,$ctx,"$name 命令的第一个参数应该用花括号");
            }
            else
            {
                $real_number = $number;
            }
            $real_option_arg = null;

        }
        else
        {
            $real_number = $number +1;
            if($option_arg !== null)
            {
                $real_option_arg = $option_arg;
            }
            else
            {
                $real_option_arg = $define->default_arg;
            }
        }

        if($real_number > $define->args_number)
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx,"$name 命令参数太多");
        }
        else if($real_number < $define->args_number)
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx,"$name 命令参数太少");
        }

        return $real_option_arg;
    }

    public function exitOption_arg(Context\Option_argContext $ctx):void
    {
        if($ctx->command() != null) array_push($this->option_arg, array_pop($this->command));
        else if($ctx->math_inline() != null) array_push($this->option_arg, array_pop($this->math_inline));
        else if($ctx->escaped_char() != null) array_push($this->option_arg, array_pop($this->escaped_char));
        else array_push($this->option_arg, $ctx->getText());
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
                $out = array_pop($this->option_arg) . $out;
            }
            array_push($this->option_args, $out);
        }
    }

    public function exitNecessary_arg(Context\Necessary_argContext $ctx):void
    {
        if($ctx->command() != null) array_push($this->necessary_arg, array_pop($this->command));
        else if($ctx->math_inline() != null) array_push($this->necessary_arg, array_pop($this->math_inline));
        else if($ctx->escaped_char() != null) array_push($this->necessary_arg, array_pop($this->escaped_char));
        else array_push($this->necessary_arg, $ctx->getText());
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
                $out = array_pop($this->necessary_arg) . $out;
            }
            array_push($this->necessary_args, $out);
        }
    }

    public function exitNewcommand(Context\NewcommandContext $ctx):void
    {
        if($this->errorOccurred) return;

        $name = $ctx->COMMAND()->getText();
        $option_args = $ctx->option_args();
        $number = 0;
        $default_arg = null;

        if($option_args != null )
        {
            switch(count($option_args))
            {
                case 1: $number = $this->isValid(array_pop($this->option_args));break;
                case 2: $default_arg = array_pop($this->option_args); $number = $this->isValid(array_pop($this->option_args));break;
                default: $this->errorOccurred = true; throw new RecognitionException(null, null, $ctx, "定义命令 $name 时参数太多");
            }
            
            if($number === false)
            {
                $this->errorOccurred = true;
                throw new RecognitionException(null, null, $ctx, '定义命令时参数数量必须是1-9的数字');
            }
        }
        
        $content = array_pop($this->necessary_args);
        
        $this->newcommands[$name] = new newCommand($content, $number, $default_arg);
    }

    private function isValid(string $str):int|false
    {
        if(strlen($str) != 1) return false;

        $ret = intval($str);
        if($ret == 0) return false;
        else return $ret;
    }

    public function enterMath_inline(Context\Math_inlineContext $ctx):void
    {
        $this->isInMath = true;
    }

    public function exitIn_math_inline(Context\In_math_inlineContext $ctx):void
    {
        if($ctx->command() != null) array_push($this->in_math_inline, array_pop($this->command));
        else if($ctx->escaped_char() != null) array_push($this->in_math_inline, array_pop($this->escaped_char));
        else array_push($this->in_math_inline, $ctx->getText());
    }

    public function exitMath_inline(Context\Math_inlineContext $ctx):void
    {
        $content = '';
        foreach($ctx->in_math_inline() as $i)
        {
            $content = array_pop($this->in_math_inline) . $content;
        }

        array_push($this->math_inline, '<yamath display="false">' . $content . '</yamath>');
        $this->isInMath = false;
    }

    public function exitIn_math_display(Context\In_math_displayContext $ctx):void
    {
        if($ctx->multi_plain_text() != null) array_push($this->in_math_display, array_pop($this->multi_plain_text));
        else if($ctx->command() != null) array_push($this->in_math_display, array_pop($this->command));
        else if($ctx->escaped_char() != null) array_push($this->in_math_display, array_pop($this->escaped_char));
        else if($ctx->environment() != null) array_push($this->in_math_display, array_pop($this->environment));
        else array_push($this->in_math_display, $ctx->getText());
    }

    public function enterMath_display(Context\Math_displayContext $ctx):void
    {
        $this->isInMath = true;
    }

    public function exitMath_display(Context\Math_displayContext $ctx):void
    {
        $content = '';
        foreach($ctx->in_math_display() as $i)
        {
            $content = array_pop($this->in_math_display) . $content;
        }

        array_push($this->math_display, '<yamath display="true">' . $content . '</yamath>');
        $this->isInMath = false;
    }

    public function exitIn_env(Context\In_envContext $ctx):void
    {
        if($ctx->command() != null) array_push($this->in_env, array_pop($this->command));
        else if($ctx->environment() != null) array_push($this->in_env, array_pop($this->environment));
        else if($ctx->math_inline() != null) array_push($this->in_env, array_pop($this->math_inline));
        else if($ctx->math_display() != null) array_push($this->in_env, array_pop($this->math_display));
        else if($ctx->multi_plain_text() != null) array_push($this->in_env, array_pop($this->multi_plain_text));
        else if($ctx->escaped_char() != null) array_push($this->in_env, array_pop($this->escaped_char));
        else if($ctx->in_math_display() != null) array_push($this->in_env, array_pop($this->in_math_display));
    }

    public function enterEnvironment(Context\EnvironmentContext $ctx):void
    {
        array_push($this->id, null);
    }

    public function exitEnvironment(Context\EnvironmentContext $ctx):void
    {
        if($this->errorOccurred) return;

        if($ctx->PLAIN_TEXT(0)->getText() != $ctx->PLAIN_TEXT(1)->getText())
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx, "环境的前后名字不相同");
        }

        $name = $ctx->PLAIN_TEXT(0)->getText();

        $option_args = null;

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
        
        $necessary_args = [];
        if($ctx->necessary_args() != null)
        {
            foreach($ctx->necessary_args() as $i)
            {
                array_unshift($necessary_args, array_pop($this->necessary_args));
            }
        }

        $content = '';
        foreach($ctx->in_env() as $i)
        {
            $content = array_pop($this->in_env) . $content;
        }
        $content = "\n" . trim($content) . "\n"; // 清除环境内容前后的空格和空行
        
        if(array_key_exists($name, $this->newenvironments))
        {
            $define = $this->newenvironments[$name];
            $option_args = $this->checkArgsNumber($name, $ctx, $define, $option_args, count($necessary_args));
            $out = ($define->content)($option_args, $necessary_args, array_pop($this->id), $content, $ctx);
        }
        else
        {
            $out = '\begin{' . $name . '}';
            if($option_args !== null)
            {
                $out .= "[$option_args]";
            }
            foreach($necessary_args as $arg)
            {
                $out .= '{' . $arg . '}';
            }
            $out .= $content . '\end{' . $name . '}';
            array_pop($this->id);
        }

        array_push($this->environment, $out);
    }
}
