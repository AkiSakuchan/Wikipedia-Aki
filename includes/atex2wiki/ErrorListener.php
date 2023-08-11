<?php
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;

class ErrorListener extends BaseErrorListener
{
    public function syntaxError(Recognizer $recognizer, 
    ?object $offendingSymbol, 
    int $line, 
    int $charPositionInLine, 
    string $msg, 
    ?RecognitionException $exception):void
    {
        echo "第 $line 行第 $charPositionInLine 处语法错误: $msg \n"; 
    }
}