<?php
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;

class ErrorListener extends BaseErrorListener
{
    public array $errorOut = [];
    public function syntaxError(Recognizer $recognizer, 
    ?object $offendingSymbol, 
    int $line, 
    int $charPositionInLine, 
    string $msg, 
    ?RecognitionException $err):void
    {
        array_push($this->errorOut, [$line, $charPositionInLine, $msg]);
    }
}