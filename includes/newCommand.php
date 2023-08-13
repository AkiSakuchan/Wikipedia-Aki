<?php

class newCommand
{
    public string|null $default_arg;
    public int $args_number;    // 包括默认参数在内的参数数量
    public string|Closure $content;     // 命令定义. 可以是字符串(包含符号参数#n), 也可以是一个返回字符串的可调用对象, 参数为命令的参数

    public function __construct(string|Closure $content, int $number, string|null $default)
    {
        $this->default_arg = $default;
        $this->args_number = $number;
        $this->content = $content;
    }
}