<?php

final class SyntaxError extends Exception
{
    public function __construct(string $message, int $line)
    {
        parent::__construct($message, 1);
        $this->line = $line;
    }
}