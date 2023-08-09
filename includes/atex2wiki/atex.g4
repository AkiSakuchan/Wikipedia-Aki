grammar atex;

start : command | environment | math_inline | math_display | PLAIN_TEXT;

command : COMMAND ('[' option_real_arg* ']')? ('{' necessary_real_arg* '}')*;
necessary_real_arg : PLAIN_TEXT | BRACKET | command;
option_real_arg : PLAIN_TEXT | command ;

environment : '\\begin{' LETTERS '}' ('[' option_real_arg* ']')? ('{' necessary_real_arg* '}')* env_body '\\end{' LETTERS '}';
env_body : (PLAIN_TEXT | BRACKET | command | environment )*;

math_inline : '$' in_math_inline '$';
math_display : '$$' in_math_display '$$';

in_math_inline: PLAIN_TEXT | BRACKET | command;
in_math_display: in_math_inline | environment;

PLAIN_TEXT : (HAN | LETTER | DIGIT | [()])+;

fragment LETTER: [a-zA-Z];
fragment HAN : [\p{Han}];

BRACKET : [[\]];
LETTERS : LETTER+;
DIGIT : [0-9];
COMMAND : '\\' LETTERS;