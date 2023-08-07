grammar atex;

LETTERS : [a-zA-Z]+;
COMMAND : '\\' LETTERS;

fragment HAN : [\p{Han}];
fragment ASCII : [\u0020-\u007E];

PLAIN_TEXT : (HAN | ASCII)+;

WS : [\p{White_Space}] -> skip;

start : PLAIN_TEXT | command | environment;

command : COMMAND ('[' real_args ']')? ('{' real_args '}')*;
real_args : (PLAIN_TEXT | command )*;

environment : '\\begin{' LETTERS '}' ('[' real_args ']')? ('{' real_args '}')* env_body '\\end{' LETTERS '}';
env_body : (PLAIN_TEXT | command | environment )*;