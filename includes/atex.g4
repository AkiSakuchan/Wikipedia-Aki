grammar atex;
begin: start+;
start : command | environment | math_inline | math_display | multi_plain_text | escaped_char | newcommand | link;

multi_plain_text : PLAIN_TEXT | SYMBOL_VERTICAL;

command : COMMAND (BRACKET1 option_args BRACKET2)* (BRACE1 necessary_args BRACE2)*;
necessary_args : necessary_arg*;
necessary_arg : PLAIN_TEXT | BRACKET1 | BRACKET2 | SYMBOL_ARGS | command | math_inline | escaped_char;
option_args : option_arg*;
option_arg : PLAIN_TEXT | SYMBOL_ARGS | command | math_inline | escaped_char;

newcommand : NEWCOMMAND BRACE1 COMMAND BRACE2 (BRACKET1 option_args BRACKET2)* BRACE1 necessary_args BRACE2;

environment : BEGIN BRACE1 PLAIN_TEXT BRACE2 (BRACKET1 option_args BRACKET2)* (BRACE1 necessary_args BRACE2)* in_env+ END BRACE1 PLAIN_TEXT BRACE2;
in_env: command | environment | math_inline | math_display | multi_plain_text | escaped_char | SYMBOL_MATH | BRACKET1 | BRACKET2 | BRACE1 | BRACE2;

math_inline : DOLLAR in_math_inline+ DOLLAR;
math_display : DOLLAR DOLLAR in_math_display+ DOLLAR DOLLAR;

in_math_inline: PLAIN_TEXT | SYMBOL_MATH | BRACKET1 | BRACKET2 | BRACE1 | BRACE2 | command | escaped_char;
in_math_display: multi_plain_text | SYMBOL_MATH | BRACKET1 | BRACKET2 | BRACE1 | BRACE2 | command | escaped_char | environment;

escaped_char: '\\{' | '\\}' | '\\^' | '\\_' | '\\&' | '\\#' | '\\%' | '\\$';

link : BRACKET1 BRACKET1 PLAIN_TEXT BRACKET2 BRACKET2;

COMMENT : '%' ~[\r\n]* -> skip ;

PLAIN_TEXT : (HAN | LETTER | DIGIT | [ \t!"()'*+,\-./:;<=>?@`|~])+;

fragment LETTER: [a-zA-ZàÀâÂéÉèÈëËêÊïÏîÎôÔöÖùÙüÜûÛÿŸçÇß];
fragment HAN : [\p{Han}];

BRACKET1: '[';
BRACKET2: ']';
BRACE1 : '{';
BRACE2 : '}';
DOLLAR : '$';
SYMBOL_MATH : [^_&] | '\\''\\';
SYMBOL_ARGS : '#' DIGIT;
SYMBOL_VERTICAL : [\n\r];

LETTERS : LETTER+;
DIGIT : [0-9];

NEWCOMMAND : '\\newcommand';
BEGIN: '\\begin';
END: '\\end';

COMMAND : '\\' LETTERS;