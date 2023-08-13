<?php
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;

class ErrorInfo
{
    public int $line;
    public int $charPosInLine;
    public string $msg;

    public function __construct(int $line, int $charPosInLine, string $msg)
    {
        $this->line = $line;
        $this->charPosInLine = $charPosInLine;
        $this->msg = $msg;
    }
}
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
        array_push($this->errorOut, new ErrorInfo($line, $charPositionInLine, $msg));
    }
}