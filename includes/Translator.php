<?php
require_once 'Listener.php';
require_once 'newCommand.php';
require_once '../vendor/autoload.php';
require_once 'ErrorListener.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

class praticeListener extends Listener
{
    private function labelCommand(string|null $option_arg, array $arg, Context\CommandContext $ctx):string
    {
        $this->id[array_key_last($this->id)] = $arg[0];
        return '';
    }

    private function refCommand(string|null $option_arg, array $necessary_args, Context\CommandContext $ctx):string
    {
        $ret = '<cref ';
        if($option_arg !== null) $ret .= 'page="' . $option_arg . '" ';
        $ret .= 'id="' . $necessary_args[0] . '" />';
        return $ret;
    }

    private function proofcEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, Context\EnvironmentContext $ctx):string
    {
        return "<proofc>$content</proofc>";
    }

    private function equationEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, Context\EnvironmentContext $ctx):string
    {
        $out = '<math';
        if($id !== null)
        {
            $out .=  ' id="' . $id . '"';
        }
        $out .= '>';
        $out .= $content . '</math>';
        return $out;
    }

    private function commonEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, Context\EnvironmentContext $ctx):string
    {
        $name = $ctx->PLAIN_TEXT(0)->getText();
        $out = "<$name";

        if($id !== null)
        {
            $out .=  ' id="' . $id . '"';
            $content = "\n" . trim($content) . "\n";
        }

        if($option_arg != '')
        {
            $out .= ' name="' . $option_arg . '"';
        }
        $out .= '>';

        $out .= $content;
        $out .= "</$name>";
        return $out;
    }

    public function __construct()
    {
        $this->newcommands['\label'] = new newCommand($this->labelCommand(...), 1, null);
        $this->newcommands['\ref'] = new newCommand($this->refCommand(...), 2, '');
        $this->newenvironments['proofc'] = new newEnvironment($this->proofcEnvironment(...), 0, null);
        $this->newenvironments['equation'] = new newEnvironment($this->equationEnvironment(...), 1, '');
        $this->newenvironments['theorem'] = new newEnvironment($this->commonEnvironment(...), 1, '');
    }
}

function Translator(string $text, string $preText = ''):array
{
    $source = $preText . $text;

    $input = InputStream::fromString($source);
    $lexer = new atexLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new atexParser($tokens);
    $listener = new praticeListener();
    $parser->addParseListener($listener);
    $errorListener = new ErrorListener();
    $parser->addErrorListener($errorListener);
    $parser->begin();

    $output = $listener->out;

    if($parser->getNumberOfSyntaxErrors() > 0)
    {
        return [false, $output, $errorListener->errorOut];
    }
    else
    {
        return [true, $output];
    }
}

$text = '\begin{theorem}
\{ \}
\end{theorem}';
Translator($text);
var_dump(Translator($text));