grammar atex;

start : (command  | environment | math_inline | math_display | multi_plain_text | newcommand )+;

multi_plain_text : PLAIN_TEXT | SYMBOL_VERTICAL;

command : COMMAND ('[' option_real_arg* ']')? ('{' necessary_real_arg* '}')*;
necessary_real_arg : PLAIN_TEXT | BRACKET | command | math_inline;
option_real_arg : PLAIN_TEXT | command | math_inline;

newcommand : '\\newcommand{' COMMAND '}' ( '[' DIGIT ']')? ('[' option_real_arg ']')? ('{' define_args '}')+;
define_args : necessary_real_arg | SYMBOL_ARGS;

environment : '\\begin{' LETTERS '}' ('[' option_real_arg* ']')? ('{' necessary_real_arg* '}')* env_body '\\end{' LETTERS '}';
env_body : in_math_display+;

math_inline : '$' in_math_inline+ '$';
math_display : '$$' in_math_display+ '$$';

in_math_inline: PLAIN_TEXT | SYMBOL_MATH | BRACKET | command;
in_math_display: multi_plain_text | SYMBOL_MATH | BRACKET | command | environment;

PLAIN_TEXT : (HAN | LETTER | DIGIT | [ \t!"()'*+,\-./:;<=>?@`|~])+;

fragment LETTER: [a-zA-Z];
fragment HAN : [\p{Han}];

BRACKET : [[\]];
SYMBOL_MATH : ([^_{}] | BRACKET)+;
SYMBOL_ARGS : '#' DIGIT;
SYMBOL_VERTICAL : [\n\r];

LETTERS : LETTER+;
DIGIT : [0-9];
COMMAND : '\\' LETTERS;