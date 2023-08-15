<?php
require_once '../vendor/autoload.php';

use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;

class Visitor extends atexBaseVisitor
{
    private bool $errorOccurred;
    private bool $isInMath;

    protected array $newcommands;
    protected array $newenvironments;

    protected array $id = [];
    public function visitBegin(Context\BeginContext $ctx):string
    {
        $this->errorOccurred = false;

        $start = $ctx->start();
        $ret = '';
        foreach($start as $item)
        {
            $ret .= $this->visit($item);
        }
        return $ret;
    }

    public function visitStart(Context\StartContext $ctx):string
    {
        if($ctx->command() != null ) $ret = $this->visit($ctx->command());
        else if($ctx->environment() != null ) $ret = $this->visit($ctx->environment());
        else if($ctx->math_inline() != null ) $ret = $this->visit($ctx->math_inline());
        else if($ctx->math_display() != null ) $ret = $this->visit($ctx->math_display());
        else if($ctx->multi_plain_text() != null) $ret = $this->visit($ctx->multi_plain_text());
        else if($ctx->escaped_char() != null) $ret = $this->visit($ctx->escaped_char());
        else $ret = $this->visit($ctx->newcommand());

        return $ret;
    }

    public function visitMulti_plain_text(Context\Multi_plain_textContext $ctx):string
    {
        return $ctx->getText();
    }

    public function visitOption_arg(Context\Option_argContext $ctx):string
    {
        if($ctx->command() != null) $ret = $this->visit($ctx->command());
        else if($ctx->math_inline() != null) $ret = $this->visit($ctx->math_inline());
        else if($ctx->escaped_char() != null) $ret = $this->visit($ctx->escaped_char());
        else $ret = $ctx->getText();

        return $ret;
    }

    public function visitOption_args(Context\Option_argsContext $ctx):string
    {
        $option_args = $ctx->option_arg();
        $ret = '';
        foreach($option_args as $item)
        {
            $ret .= $this->visit($item);
        }
        return $ret;
    }

    public function visitNecessary_arg(Context\Necessary_argContext $ctx):string
    {
        if($ctx->command() != null) $ret = $this->visit($ctx->command());
        else if($ctx->math_inline() != null) $ret = $this->visit($ctx->math_inline());
        else if($ctx->escaped_char() != null) $ret = $this->visit($ctx->escaped_char());
        else $ret = $ctx->getText();

        return $ret;
    }

    public function visitNecessary_args(Context\Necessary_argsContext $ctx):string
    {
        $necessary_args = $ctx->necessary_arg();
        $ret = '';
        foreach($necessary_args as $item)
        {
            $ret .= $this->visit($item);
        }
        return $ret;
    }

    public function visitCommand(Context\CommandContext $ctx):string
    {
        if($this->errorOccurred) throw new RecognitionException(null, null, $ctx,"有异常未解决");
        
        $name = $ctx->COMMAND()->getText();

        switch(count($ctx->option_args()))
        {
            case 0: $option_args = null; break;
            case 1: $option_args = $this->visit($ctx->option_args(0)); break;
            default: $this->errorOccurred = true;throw new RecognitionException(null, null, $ctx,"$name 命令中给了太多的可选参数");
        }

        $necessary_args = [];
        if($ctx->necessary_args() != null)
        {
            foreach($ctx->necessary_args() as $item)
            {
                array_push($necessary_args, $this->visit($item));
            }
        }

        if(array_key_exists($name, $this->newcommands))
        {
            $define = $this->newcommands[$name];
            $content = $define[0];
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
                // 如果命令体是一个可调用数组, 就调用它来处理
                $out = $content($option_args, $necessary_args, $ctx);
            }
        }
        else
        {
            $out = $name;
            if($option_args !== null) $out .= "[$option_args]";
            foreach($necessary_args as $arg)
            {
                $out .='{' . $arg .'}';
            }
        }
        
        return $out;
    }

    private function checkArgsNumber(string $name, 
                                    Antlr\Antlr4\Runtime\ParserRuleContext $ctx, 
                                    array $define, 
                                    string|null $option_arg, 
                                    int $number):string|null
    {
        if($define[2] === null)
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
                $real_option_arg = $define[2];
            }
        }

        if($real_number > $define[1])
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx,"$name 命令参数太多");
        }
        else if($real_number < $define[1])
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx,"$name 命令参数太少");
        }

        return $real_option_arg;
    }

    public function visitNewcommand(Context\NewcommandContext $ctx):string
    {
        if($this->errorOccurred) throw new RecognitionException(null, null, $ctx,"有异常未解决");

        $name = $ctx->COMMAND()->getText();
        $option_args = $ctx->option_args();
        $number = 0;
        $default_arg = null;

        switch(count($option_args))
        {
            case 0: $number =0; $default_arg = null;
            case 1: $number = $this->isValid($this->visit($ctx->option_args(0)));break;
            case 2: $default_arg = $this->visit($ctx->option_args(1)); $number = $this->isValid($this->visit($ctx->option_args(0)));break;
            default: $this->errorOccurred = true; throw new RecognitionException(null, null, $ctx, "定义命令 $name 时参数太多");
        }
            
        if($number === false)
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx, '定义命令时参数数量必须是1-9的数字');
        }
        
        $content = $this->visit($ctx->necessary_args());
        
        $this->newcommands[$name] = [$content, $number, $default_arg];
        return '';
    }

    public function visitEnvironment(Context\EnvironmentContext $ctx):string
    {
        if($this->errorOccurred) throw new RecognitionException(null, null, $ctx,"有异常未解决");

        if($ctx->PLAIN_TEXT(0) == null | $ctx->PLAIN_TEXT(1) == null)
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx, "环境名不对");
        }

        if($ctx->PLAIN_TEXT(0)->getText() != $ctx->PLAIN_TEXT(1)->getText())
        {
            $this->errorOccurred = true;
            throw new RecognitionException(null, null, $ctx, "环境的前后名字不相同");
        }

        array_push($this->id, null);

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
            $option_args = $this->visit($ctx->option_args(0));
        }
        
        $necessary_args = [];
        if($ctx->necessary_args() != null)
        {
            foreach($ctx->necessary_args() as $item)
            {
                array_push($necessary_args, $this->visit($item));
            }
            //array_map(array_push($necessary_args, $this->visit(...)), $ctx->necessary_args());
        }

        $content = '';
        foreach($ctx->in_env() as $item)
        {
            $content .= $this->visit($item);
        }
        $content = "\n" . trim($content) . "\n"; // 清除环境内容前后的空格和空行
        
        if(array_key_exists($name, $this->newenvironments))
        {
            $define = $this->newenvironments[$name];
            $option_args = $this->checkArgsNumber($name, $ctx, $define, $option_args, count($necessary_args));
            $out = $define[0]($option_args, $necessary_args, array_pop($this->id), $content, $ctx);
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

        return $out;
    }

    private function isValid(string $str):int|false
    {
        if(strlen($str) != 1) return false;

        $ret = intval($str);
        if($ret == 0) return false;
        else return $ret;
    }

    public function visitIn_env(Context\In_envContext $ctx):string
    {
        if($ctx->command() != null) $ret = $this->visit($ctx->command());
        else if($ctx->environment() != null) $ret = $this->visit($ctx->environment());
        else if($ctx->math_inline() != null) $ret = $this->visit($ctx->math_inline());
        else if($ctx->math_display() != null) $ret = $this->visit($ctx->math_display());
        else if($ctx->multi_plain_text() != null) $ret = $this->visit($ctx->multi_plain_text());
        else if($ctx->escaped_char() != null) $ret = $this->visit($ctx->escaped_char());
        else $ret = $ctx->getText();

        return $ret;
    }

    public function visitMath_inline(Context\Math_inlineContext $ctx):string
    {
        $this->isInMath = true;
        $content = '';
        foreach($ctx->in_math_inline() as $item)
        {
            $content .= $this->visit($item);
        }

        $this->isInMath = false;
        return '<yamath display="false">' . $content . '</yamath>';
    }

    public function visitMath_display(Context\Math_displayContext $ctx):string
    {
        $this->isInMath = true;
        $content = '';
        foreach($ctx->in_math_display() as $item)
        {
            $content .= $this->visit($item);
        }
        $this->isInMath = false;
        return '<yamath display="true">' . $content . '</yamath>';
    }

    public function visitIn_math_inline(Context\In_math_inlineContext $ctx):string
    {
        if($ctx->command() != null) $ret = $this->visit($ctx->command());
        else if($ctx->escaped_char() != null) $ret = $this->visit($ctx->escaped_char());
        else $ret = $ctx->getText();

        return $ret;
    }

    public function visitIn_math_display(Context\In_math_displayContext $ctx):string
    {
        if($ctx->multi_plain_text() != null) $ret = $this->visit($ctx->multi_plain_text());
        else if($ctx->command() != null) $ret = $this->visit($ctx->command());
        else if($ctx->escaped_char() != null) $ret = $this->visit($ctx->escaped_char());
        else if($ctx->environment() != null) $ret = $this->visit($ctx->environment());
        else $ret = $ctx->getText();

        return $ret;
    }

    public function visitEscaped_char(Context\Escaped_charContext $ctx):string
    {
        $str = $ctx->getText();
        if($this->isInMath && ($str == '\{' || $str == '\}')) $ret = $str;
        else $ret = ltrim($str, '\\');

        return $ret;
    }
}