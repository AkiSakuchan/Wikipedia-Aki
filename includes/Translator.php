<?php
require_once 'Visitor.php';
require_once 'ErrorListener.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Context\CommandContext;
use Context\EnvironmentContext;

use MediaWiki\MediaWikiServices;

final class praticeVisitor extends Visitor
{
    private string $title;      // 页面标题

    private array $idNumber;    // 用于记录交叉引用数据

    private int $rightCounter;

    private $dbw;
    private $dbr;

    public function labelCommand(string|null $option_arg, array $arg, CommandContext $ctx):string
    {
        if($arg[0] != null) $this->id[array_key_last($this->id)] = $arg[0];
        return '';
    }

    public function refCommand(string|null $option_arg, array $necessary_args, CommandContext $ctx):string
    {
        $id = $necessary_args[0];
        if($id == null) return '';
        $id = urlencode($id);

        if($option_arg != null)
        {
            $page = urlencode($option_arg);
            $readableTitle = $option_arg;

            $result = $this->dbr->newSelectQueryBuilder()
                            ->select( 'display_tag' )
                            ->from( 'cross_pages_references' )
                            ->where( [
                                'page_title' => $page,
                                'label' => $id
                            ])
                            ->caller( __METHOD__ )->fetchField();

            if( strlen($result) > 0 )
            {
                $ret = "<a href=\"/index.php?title=$page#$id\" title=\"$readableTitle\">$readableTitle $result</a>";
            }
            else
            {
                return "[[$readableTitle]]";
            }
        }
        else
        {
            if(array_key_exists($id, $this->idNumber))
            {
                $tag = $this->idNumber[$id];
            }
            else $tag = $necessary_args[0];

            $ret = "<a href=\"#$id\">$tag</a>";
        }

        return "<noparser>$ret</noparser>";
    }

    public function proofcEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
    {
        $ret = '<div class="mw-collapsible mw-collapsed"><span class="env-title">证明:</span><div class="mw-collapsible-content proof-content">';
        $ret .= $content;
        $ret .= '</div></div>';
        return $ret;
    }

    public function equationEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
    {
        $tag = ' (' . $this->rightCounter . ') ';
        $out = '<div class="container"';
        if($id != null)
        {
            $id = urlencode($id);
            $this->idNumber[$id] = $tag;
            $titleUrlString = urlencode($this->title);
            $idUrlString = urlencode($id);
            if( false == $this->dbw->insert('cross_pages_references',
                [
                    'page_title' => $titleUrlString,
                    'label' => $idUrlString,
                    'display_tag' => $tag
                ]))
            {
                    error_log("插入($id, $tag)失败");
            }

            $out .= ' id="' . $idUrlString . '"';
        }
        $out .= '>';

        $mathResult = $this->katexParser($content, true);
        $out .= "<noparser>$mathResult</noparser>" . "<span class=\"right-tag\">$tag</span></div>";
        $this->isInMath = false;
        $this->rightCounter++;
        return $out;
    }

    public function tikzcdEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
    {
        // 本段程序把tikz的代码用httppost发送到127.0.0.1:9292去, 将返回svg图片代码
        $ch = curl_init('http://127.0.0.1');
        $source = array('type' => 'tikzcd', 'tex' => $content);
        if( $option_arg != null )
        {
            $source['option'] = $option_arg;
        }
        curl_setopt_array($ch, array(
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_PORT => 9292,
            CURLOPT_POSTFIELDS => json_encode($source)
        ));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json;'));
        $svg_xml = curl_exec($ch);
        curl_close($ch);
        if($svg_xml == '') return $content . "\n";

        $svg_hash = hash('md5', $svg_xml);  // 依然是通过获取哈希值, 填入html元素中, 最后替换的方式, 避免PHP的DOM解析错误.

        $dom = new DOMDocument();
        $div = $dom->createElement('div', $svg_hash);
        $div->setAttribute('class', 'container');
        $dom->appendChild($div);

        if( $id != null )
        {
            // 如果temp属性则添加编号.
            $tag = $this->rightCounter;
            $span = $dom->createElement('span', "($tag)");
            $span->setAttribute('class', 'right-tag');

            $div->appendChild($span);

            $div->setAttribute('id', $id);
            $this->rightCounter++;
        }

        $svg_dom = new DOMDocument();
        $svg_dom->loadXML($svg_xml);
        $svg_head = $svg_dom->getElementsByTagName('svg')->item(0);
        $height = floatval($svg_head->getAttribute('height'))*1.5; // 获得原始高度的1.5倍, 作为显示的图片的高度, 否则太小.

        $svg_xml = preg_replace('/^<\?xml[^>]*\?>/','',$svg_xml);   // 去掉xml头
        $svg_xml = preg_replace('/width="([\d\.]+)(pt)?"/', '', $svg_xml);  // 去掉宽度属性, 让浏览器根据高度属性自动计算宽度.
        $svg_xml = preg_replace('/height="([\d\.]+)(pt)?"/', 'height=' . $height . 'pt', $svg_xml);     // 替换高度属性为原本的1.5倍.

        // 需要让svg图片中的内部标识符随机化, 否则同一个页面中存在TeXLive生成的多个svg时会出现冲突导致显示错误.
        $rand = '';
        for ($i = 0; $i < 16; $i++)
        {
            $rand .= dechex(rand(0, 15));
        }
        $svg_xml = preg_replace_callback('/(id="|href="#|url\(#)/', function ($matches) use ($rand) { return $matches[0].$rand; }, $svg_xml);

        return '<noparser>' . str_replace($svg_hash, $svg_xml, $dom->saveHTML()) . '</noparser>';
    }

    public function commonEnvironment(string|null $option_arg, array $necessary_args, string|null $id, string $content, EnvironmentContext $ctx):string
    {
        $name = $ctx->PLAIN_TEXT(0)->getText();
        
        // 从环境名获得显示的标题名
        $translate = ['theorem' => '定理', 'proposition' => '命题', 'lemma' => '引理', 'corollary' => '推论', 'definition' => '定义', 'example' => '例子', 'remark' => '注'];

        static $envCount = 1;   // 用于计数

        $tag = $translate[$name] . " $envCount "; 

        $out = "<blockquote class=\"$name\"";

        if($id != null)
        {
            $this->idNumber[$id] = $tag;
            $titleUrlString = urlencode($this->title);
            $idUrlString = urlencode($id);
            if( false == $this->dbw->insert('cross_pages_references',
                [
                    'page_title' => $titleUrlString,
                    'label' => $idUrlString,
                    'display_tag' => $tag
                ]))
            {
                    error_log("插入($id, $tag)失败");
            }

            $out .= ' id="' . $idUrlString . '"';
        }
        $out .= '>';

        $out .= '<span class="env-title">' . $tag;

        if($option_arg != null)
        {
            $out .= "($option_arg)";
        }
        $out .= ':</span>' . "<div>$content</div>" . '</blockquote>';

        $envCount++;
        return $out;
    }

    public function __construct(string $socketPath, string $title)
    {
        $this->newcommands['\label'] = [[$this, 'labelCommand'], 1, null];
        $this->newcommands['\ref'] = [[$this, 'refCommand'], 2, ''];
        $this->newenvironments['proofc'] = [[$this, 'proofcEnvironment'], 0, null];
        $this->newenvironments['equation'] = [[$this, 'equationEnvironment'], 0, null, 'math'];
        $this->newenvironments['tikzcd'] = [[$this, 'tikzcdEnvironment'], 1, '', 'math'];
        $this->newenvironments['theorem'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['proposition'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['lemma'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['corollary'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['definition'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['remark'] = [[$this, 'commonEnvironment'], 1, ''];
        $this->newenvironments['example'] = [[$this, 'commonEnvironment'], 1, ''];

        parent::__construct($socketPath);
        $this->title = $title;
        $this->idNumber = [];
        $this->rightCounter = 1;

        $dbProvider = MediaWikiServices::getInstance()->getDBLoadBalancer();
        $this->dbw = $dbProvider->getConnection( DB_PRIMARY );
        $titleUrlString = urlencode($title);
        $this->dbw->delete( 'cross_pages_references' , ['page_title' => $titleUrlString]);

        $this->dbr = $dbProvider->getConnection( DB_REPLICA );
    }
}

function Translator(string $text, string $socketPath, string $title, string $preText = ''):array
{
    $source = $preText . $text;

    $input = InputStream::fromString($source);
    $lexer = new atexLexer($input);
    $tokens = new CommonTokenStream($lexer);
    $parser = new atexParser($tokens);
 
    $errorListener = new ErrorListener();
    $parser->addErrorListener($errorListener);

    $visitor = new praticeVisitor($socketPath, $title);

    try
    {
        $output = $visitor->visit($parser->begin());
    }
    catch(RecognitionException $err)
    {
        return [false, [[$err->getLine() , $err->getCtx()->getText() , $err->getMessage()]]];
    }

    if($parser->getNumberOfSyntaxErrors() > 0)
    {
        return [false, $errorListener->errorOut];
    }
    else
    {
        return [true, $output];
    }
}