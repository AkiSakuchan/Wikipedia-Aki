<?php
require_once 'Translator.php';

class tagHooks
{
    private static $socketPath = '/tmp/php-js.sock';    // Unix域套接字路径, 未来会添加设置项.

    // 预定义的 TeX 命令, 未来会添加设置页面
    private static $preText = '\newcommand{\Hom}{\operatorname{Hom}}
    \newcommand{\GL}{\operatorname{GL}}
    \newcommand{\SL}{\operatorname{SL}}
    \newcommand{\O}{\operatorname{O}}
    \newcommand{\U}{\operatorname{U}}
    \newcommand{\SU}{\operatorname{SU}}
    \newcommand{\Sp}{\operatorname{Sp}}
    \newcommand{\gl}{\mathfrak{gl}}
    \newcommand{\sl}{\mathfrak{sl}}
    \newcommand{\o}{\mathfrak{o}}
    \newcommand{\u}{\mathfrak{u}}
    \newcommand{\su}{\mathfrak{su}}
    \newcommand{\sp}{\mathfrak{sp}}
    \newcommand{\Pic}{\operatorname{Pic}}
    \newcommand{\NS}{\operatorname{NS}}
    ';

    public static function onLoadExtensionSchemaUpdates( DatabaseUpdater $updater)
    {
        $dir = dirname(__DIR__);
        $updater->addExtensionTable('cross_pages_references', "$dir/sql/init.sql");
    }

    public static function onParserFirstCallInit( Parser $parser)
    {
        $parser->setHook( 'noparser', [self::class, 'noparserRender']);
    }

    public static function onParserBeforeInternalParse(Parser &$parser, &$text, &$strip_state)
    {
        static $execed = false; // 用于避免重复执行, 重复解析已经部分解析后的数据, 这样除了会造成速度降低外还会破坏第一次获得的引用数据;
        if($execed == true) return true;

        // noparser标签只能在解析时内部使用, 不能暴露给用户
        $text = str_replace('<noparser>', '', $text);
        $text = str_replace('</noparser>', '', $text);

        // 若正在解析系统消息, 比如最近修改时间等, 就不执行后续操作直接通过
        if( $parser->getOptions()->getInterfaceMessage())
        {
            return true;
        }

        // 模版中也不进行后续操作直接通过
        $title = $parser->getTitle();
        if(in_array($title->getNamespace(), [ NS_TEMPLATE, NS_MODULE, NS_MEDIAWIKI]))
        {
            return true;
        }

        // 在文档中搜索是否有<no atex>如果有则不把文本视为atex也不解析.
        $isReplaceSharp = true;
        $text = preg_replace_callback('/<no atex>/',
        function($matches) use(&$isReplaceSharp) : string
        {
            $isReplaceSharp = false;
            return '';
        }, $text);

        if($isReplaceSharp)
        {
            $text = trim($text);
            $parsingOutput = Aki\Translator($text, self::$socketPath, $title, self::$preText);
            $execed = true;
            if($parsingOutput[0])
            {
                $text = $parsingOutput[1];
            }
            else
            {
                $preLine = substr_count(self::$preText, "\n");
                $errStr = "\n";
                foreach($parsingOutput[1] as $errOut)
                {
                    $realLine = $errOut[0] - $preLine;
                    $errStr .= "第 $realLine 行 " . $errOut[1] . " 处有错误: " . $errOut[2] . "\n";
                }
                $text = $errStr;
            }
        }
        else
        {
            return true;
        }

        $text = trim($text);

        return true;
    }

    public static function noparserRender($input, array $args, Parser $parser, PPFrame $frame)
    {
        return [$input, 'markerType' => 'nowiki'];
    }
}