# 简介
本项目受[香蕉空间](https://www.bananaspace.org)的启发, 也采用了香蕉空间的部分代码
[tikz2svg](https://github.com/banana-space/tikz2svg).

本项目是一个[MediaWiki](https://www.mediawiki.org/wiki/MediaWiki)插件,
实现了自动生成定理样式(配色也和香蕉空间一样), 定理和公式的自动编号, 自动生成引用和跨页面引用的链接.
但是实现方式与香蕉空间完全不同.

# 如何安装
下载编译好的代码并解压缩到mediawiki/extensions文件夹中. 然后把MediaWiki根目录里的```composer.local.json.sample```改名为```composer.local.json```运行
```zsh
composer update
composer dump-autoload
```
然后在LocalSettings.php末尾添加一行
```php
wfLoadExtension('Wikipedia-Aki');
```

为了解析数学公式, 需要启用
[math-en-serveur](https://github.com/AkiSakuchan/MathEnServeur)服务.
并且保证运行MediaWiki的用户有权限读写```/tmp/php-js.sock```,
可以通过```chmod```命令实现.

如果要解析tikzcd代码, 还需要启用[tikz2svg](https://github.com/AkiSakuchan/tikz2svg)服务, 这个tikz2svg与香蕉空间使用的略有不同, 不要混淆.

安装后, 在```maintenance```目录下运行```php update.php```更新数据库.

# 如何使用
本插件数学模式支持KaTeX所支持的命令. 另外还支持```\newcommand```命令.
也支持```tikzcd, theorem, equation``` 等环境. 具体如下

## 数学公式
用```$...$```来生成行内公式, 用```$$...$$```来生成**不编号**的行间公式.

如果要生成带编号的行间公式, 使用```equation```标签, 比如
```latex
\begin{equation}
E=mc^2
\end{equation}
```
如果要在它处引用这个公式, 可以使用```\label```命令, 也就是像这样:
```latex
\begin{equation}
\label{质能方程}
E=mc^2
\end{equation}
```

## 交换图
使用```tikzcd```标签来生成交换图, 比如
```latex
\begin{tikzcd}
A \ar[r] \ar[d] & B \ar[d] \\
C \ar[r] & D
\end{tikzcd}
```
这样生成的交换图是不带编号的, 如果要生成编号的交换图并在它处引用, 可以使用```\label```命令.

交换图和行间公式的编号放在最右边.

## 定理环境
实现了以下环境
```
theorem, proposition, lemma, corollary, remark, example, definition
```
比如
```latex
\begin{theorem}
收敛滤子都是Cauchy滤子.
\end{theorem}
```
这时就会使用特定样式的```<blockquote>```标签把中间的内容包裹起来.

如果要给上面这些定义定理等其别名, 就和其他latex程序一样:
```latex
\begin{theorem}[单点紧化]
每个局部紧空间可以添加一个点变成紧空间, 在同胚意义下唯一.
\end{theorem}
```
这时就会以括号的形式把```(单点紧化)```加到定理标题上.

所有的定理定义例子等标签都会自动编号, 编号计数器与公式和交换图的计数器不一样.

如果要在其他地方引用这些定理环境, 可以使用```\label```命令.

## 可折叠证明
使用```proofc```环境可以把证明内容默认收起来, 不影响整体阅读.

## 其他环境
还实现了```itemize, enumerate```环境, 它们都是HTML中```<ul>,<ol>```标签的包装.
```enumerate```环境的第一个参数默认为```1```, 表示编号是数字, 此外还可以是
1. ```I```表示大写罗马数字
2. ```i```表示小写罗马数字
3. ```a```表示小写字母
4. ```A```表示大写字母

## 预定义常量
本扩展定义了一些最常用的替换, 出了KaTeX自带的以外还有:
```latex
\newcommand{\Hom}{\operatorname{Hom}}
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
```

## 引用
可以使用```\ref```命令来引用其他地方的行间公式, 交换图, 定理等.
比如要引用同页面的定理, 可以使用```\ref{单点紧化}```来生成引用链接和文字.

也可以引用公式和交换图, 方法和上面一样.

如果要引用其他页面的公式定理等, 需要指定第一个参数:
```latex
\ref[局部紧空间]{单点紧化}
```
表示引用页面 "局部紧空间" 中的标签为"单点紧化"的东西, 包括定理或者公式.

这个标签会自动生成链接和文字, 文字会显示公式定理的编号.

## 编译
若要编译本项目, 则系统中需要安装composer, antlr 4.12, php-scoper(注意要设置环境变量), PHP版本要大于8.1
首次编译按如下顺序运行:
```zsh
composer install
./complie.sh
./make.sh
```
之后如果修改了```atex.g4```则运行后面两个命令, 如果没有修改```atex.g4```则只用运行第三个脚本.