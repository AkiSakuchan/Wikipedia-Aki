grammar atex;
begin: start+;
start : command | environment | math_inline | math_display | multi_plain_text | newcommand;

multi_plain_text : PLAIN_TEXT | SYMBOL_VERTICAL;

command : COMMAND ('[' option_args ']')* ('{' necessary_args '}')*;
necessary_args : necessary_arg*;
necessary_arg : PLAIN_TEXT | BRACKET1 | BRACKET2 | SYMBOL_ARGS | command | math_inline;
option_args : option_arg*;
option_arg : PLAIN_TEXT | SYMBOL_ARGS | command | math_inline;

newcommand : '\\newcommand{' COMMAND '}' ('[' option_args ']')* '{' necessary_args '}';

environment : '\\begin{' PLAIN_TEXT '}' ('[' option_args ']')* ('{' necessary_args '}')* in_env+ '\\end{' PLAIN_TEXT '}';
in_env: command | environment | math_inline | math_display | multi_plain_text | in_math_display;

math_inline : '$' in_math_inline+ '$';
math_display : '$$' in_math_display+ '$$';

in_math_inline: PLAIN_TEXT | SYMBOL_MATH | BRACKET1 | BRACKET2 | BRACE1 | BRACE2 | command;
in_math_display: multi_plain_text | SYMBOL_MATH | BRACKET1 | BRACKET2 | BRACE1 | BRACE2 | command | environment;

PLAIN_TEXT : (HAN | LETTER | DIGIT | [ \t!"()'*+,\-./:;<=>?@`|~])+;

fragment LETTER: [a-zA-Z];
fragment HAN : [\p{Han}];

BRACKET1: ']';
BRACKET2: '[';
BRACE1 : '{';
BRACE2 : '}';
SYMBOL_MATH : [^_&] | '\\''\\';
SYMBOL_ARGS : '#' DIGIT;
SYMBOL_VERTICAL : [\n\r];

fragment LETTERS : LETTER+;
DIGIT : [0-9];
COMMAND : '\\' LETTERS;