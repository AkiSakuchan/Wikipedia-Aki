grammar atex;

LETTERS : [a-zA-Z]+;
COMMAND : '\\' LETTERS;

fragment HAN : [\p{Han}];
fragment ASCII : [!-#%-[\]-~];

PLAIN_TEXT : (HAN | ASCII)+;

WS : [\p{White_Space}] -> skip;

start : PLAIN_TEXT | command | environment | math_inline | math_display;

command : COMMAND ('[' real_args ']')? ('{' real_args '}')*;
real_args : (PLAIN_TEXT | command )*;

environment : '\\begin{' LETTERS '}' ('[' real_args ']')? ('{' real_args '}')* env_body '\\end{' LETTERS '}';
env_body : (PLAIN_TEXT | command | environment )*;

math_inline : '$' in_math '$';
math_display : '$$' in_math '$$';

in_math: PLAIN_TEXT | command | environment;