<?php

class newCommand
{
    public string|null $default_arg;
    public int $args_number;    // 包括默认参数在内的参数数量
    public string $content;     // 命令定义

    public function __construct(string $content, int $number, string|null $default)
    {
        $this->default_arg = $default;
        $this->args_number = $number;
        $this->content = $content;
    }
}