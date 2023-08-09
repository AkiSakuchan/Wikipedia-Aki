<?php

/*
 * Generated from atex.g4 by ANTLR 4.12.0
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class atexParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, PLAIN_TEXT = 10, BRACKET = 11, 
               SYMBOL_MATH = 12, SYMBOL_ARGS = 13, SYMBOL_VERTICAL = 14, 
               LETTERS = 15, DIGIT = 16, COMMAND = 17;

		public const RULE_start = 0, RULE_multi_plain_text = 1, RULE_command = 2, 
               RULE_necessary_real_arg = 3, RULE_option_real_arg = 4, RULE_newcommand = 5, 
               RULE_define_args = 6, RULE_environment = 7, RULE_env_body = 8, 
               RULE_math_inline = 9, RULE_math_display = 10, RULE_in_math_inline = 11, 
               RULE_in_math_display = 12;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'start', 'multi_plain_text', 'command', 'necessary_real_arg', 'option_real_arg', 
			'newcommand', 'define_args', 'environment', 'env_body', 'math_inline', 
			'math_display', 'in_math_inline', 'in_math_display'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'['", "']'", "'{'", "'}'", "'\\newcommand{'", "'\\begin{'", 
		    "'\\end{'", "'\$'", "'\$\$'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, "PLAIN_TEXT", 
		    "BRACKET", "SYMBOL_MATH", "SYMBOL_ARGS", "SYMBOL_VERTICAL", "LETTERS", 
		    "DIGIT", "COMMAND"
		];

		private const SERIALIZED_ATN =
			[4, 1, 17, 165, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 1, 0, 1, 0, 1, 0, 1, 0, 
		    1, 0, 1, 0, 4, 0, 33, 8, 0, 11, 0, 12, 0, 34, 1, 1, 1, 1, 1, 2, 1, 
		    2, 1, 2, 5, 2, 42, 8, 2, 10, 2, 12, 2, 45, 9, 2, 1, 2, 3, 2, 48, 8, 
		    2, 1, 2, 1, 2, 5, 2, 52, 8, 2, 10, 2, 12, 2, 55, 9, 2, 1, 2, 5, 2, 
		    58, 8, 2, 10, 2, 12, 2, 61, 9, 2, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 67, 
		    8, 3, 1, 4, 1, 4, 1, 4, 3, 4, 72, 8, 4, 1, 5, 1, 5, 1, 5, 1, 5, 1, 
		    5, 1, 5, 3, 5, 80, 8, 5, 1, 5, 1, 5, 1, 5, 1, 5, 3, 5, 86, 8, 5, 1, 
		    5, 1, 5, 1, 5, 1, 5, 4, 5, 92, 8, 5, 11, 5, 12, 5, 93, 1, 6, 1, 6, 
		    3, 6, 98, 8, 6, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 5, 7, 105, 8, 7, 10, 
		    7, 12, 7, 108, 9, 7, 1, 7, 3, 7, 111, 8, 7, 1, 7, 1, 7, 5, 7, 115, 
		    8, 7, 10, 7, 12, 7, 118, 9, 7, 1, 7, 5, 7, 121, 8, 7, 10, 7, 12, 7, 
		    124, 9, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 7, 1, 8, 4, 8, 132, 8, 8, 11, 
		    8, 12, 8, 133, 1, 9, 1, 9, 4, 9, 138, 8, 9, 11, 9, 12, 9, 139, 1, 
		    9, 1, 9, 1, 10, 1, 10, 4, 10, 146, 8, 10, 11, 10, 12, 10, 147, 1, 
		    10, 1, 10, 1, 11, 1, 11, 1, 11, 1, 11, 3, 11, 156, 8, 11, 1, 12, 1, 
		    12, 1, 12, 1, 12, 1, 12, 3, 12, 163, 8, 12, 1, 12, 0, 0, 13, 0, 2, 
		    4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 0, 1, 2, 0, 10, 10, 14, 14, 
		    184, 0, 32, 1, 0, 0, 0, 2, 36, 1, 0, 0, 0, 4, 38, 1, 0, 0, 0, 6, 66, 
		    1, 0, 0, 0, 8, 71, 1, 0, 0, 0, 10, 73, 1, 0, 0, 0, 12, 97, 1, 0, 0, 
		    0, 14, 99, 1, 0, 0, 0, 16, 131, 1, 0, 0, 0, 18, 135, 1, 0, 0, 0, 20, 
		    143, 1, 0, 0, 0, 22, 155, 1, 0, 0, 0, 24, 162, 1, 0, 0, 0, 26, 33, 
		    3, 4, 2, 0, 27, 33, 3, 14, 7, 0, 28, 33, 3, 18, 9, 0, 29, 33, 3, 20, 
		    10, 0, 30, 33, 3, 2, 1, 0, 31, 33, 3, 10, 5, 0, 32, 26, 1, 0, 0, 0, 
		    32, 27, 1, 0, 0, 0, 32, 28, 1, 0, 0, 0, 32, 29, 1, 0, 0, 0, 32, 30, 
		    1, 0, 0, 0, 32, 31, 1, 0, 0, 0, 33, 34, 1, 0, 0, 0, 34, 32, 1, 0, 
		    0, 0, 34, 35, 1, 0, 0, 0, 35, 1, 1, 0, 0, 0, 36, 37, 7, 0, 0, 0, 37, 
		    3, 1, 0, 0, 0, 38, 47, 5, 17, 0, 0, 39, 43, 5, 1, 0, 0, 40, 42, 3, 
		    8, 4, 0, 41, 40, 1, 0, 0, 0, 42, 45, 1, 0, 0, 0, 43, 41, 1, 0, 0, 
		    0, 43, 44, 1, 0, 0, 0, 44, 46, 1, 0, 0, 0, 45, 43, 1, 0, 0, 0, 46, 
		    48, 5, 2, 0, 0, 47, 39, 1, 0, 0, 0, 47, 48, 1, 0, 0, 0, 48, 59, 1, 
		    0, 0, 0, 49, 53, 5, 3, 0, 0, 50, 52, 3, 6, 3, 0, 51, 50, 1, 0, 0, 
		    0, 52, 55, 1, 0, 0, 0, 53, 51, 1, 0, 0, 0, 53, 54, 1, 0, 0, 0, 54, 
		    56, 1, 0, 0, 0, 55, 53, 1, 0, 0, 0, 56, 58, 5, 4, 0, 0, 57, 49, 1, 
		    0, 0, 0, 58, 61, 1, 0, 0, 0, 59, 57, 1, 0, 0, 0, 59, 60, 1, 0, 0, 
		    0, 60, 5, 1, 0, 0, 0, 61, 59, 1, 0, 0, 0, 62, 67, 5, 10, 0, 0, 63, 
		    67, 5, 11, 0, 0, 64, 67, 3, 4, 2, 0, 65, 67, 3, 18, 9, 0, 66, 62, 
		    1, 0, 0, 0, 66, 63, 1, 0, 0, 0, 66, 64, 1, 0, 0, 0, 66, 65, 1, 0, 
		    0, 0, 67, 7, 1, 0, 0, 0, 68, 72, 5, 10, 0, 0, 69, 72, 3, 4, 2, 0, 
		    70, 72, 3, 18, 9, 0, 71, 68, 1, 0, 0, 0, 71, 69, 1, 0, 0, 0, 71, 70, 
		    1, 0, 0, 0, 72, 9, 1, 0, 0, 0, 73, 74, 5, 5, 0, 0, 74, 75, 5, 17, 
		    0, 0, 75, 79, 5, 4, 0, 0, 76, 77, 5, 1, 0, 0, 77, 78, 5, 16, 0, 0, 
		    78, 80, 5, 2, 0, 0, 79, 76, 1, 0, 0, 0, 79, 80, 1, 0, 0, 0, 80, 85, 
		    1, 0, 0, 0, 81, 82, 5, 1, 0, 0, 82, 83, 3, 8, 4, 0, 83, 84, 5, 2, 
		    0, 0, 84, 86, 1, 0, 0, 0, 85, 81, 1, 0, 0, 0, 85, 86, 1, 0, 0, 0, 
		    86, 91, 1, 0, 0, 0, 87, 88, 5, 3, 0, 0, 88, 89, 3, 12, 6, 0, 89, 90, 
		    5, 4, 0, 0, 90, 92, 1, 0, 0, 0, 91, 87, 1, 0, 0, 0, 92, 93, 1, 0, 
		    0, 0, 93, 91, 1, 0, 0, 0, 93, 94, 1, 0, 0, 0, 94, 11, 1, 0, 0, 0, 
		    95, 98, 3, 6, 3, 0, 96, 98, 5, 13, 0, 0, 97, 95, 1, 0, 0, 0, 97, 96, 
		    1, 0, 0, 0, 98, 13, 1, 0, 0, 0, 99, 100, 5, 6, 0, 0, 100, 101, 5, 
		    15, 0, 0, 101, 110, 5, 4, 0, 0, 102, 106, 5, 1, 0, 0, 103, 105, 3, 
		    8, 4, 0, 104, 103, 1, 0, 0, 0, 105, 108, 1, 0, 0, 0, 106, 104, 1, 
		    0, 0, 0, 106, 107, 1, 0, 0, 0, 107, 109, 1, 0, 0, 0, 108, 106, 1, 
		    0, 0, 0, 109, 111, 5, 2, 0, 0, 110, 102, 1, 0, 0, 0, 110, 111, 1, 
		    0, 0, 0, 111, 122, 1, 0, 0, 0, 112, 116, 5, 3, 0, 0, 113, 115, 3, 
		    6, 3, 0, 114, 113, 1, 0, 0, 0, 115, 118, 1, 0, 0, 0, 116, 114, 1, 
		    0, 0, 0, 116, 117, 1, 0, 0, 0, 117, 119, 1, 0, 0, 0, 118, 116, 1, 
		    0, 0, 0, 119, 121, 5, 4, 0, 0, 120, 112, 1, 0, 0, 0, 121, 124, 1, 
		    0, 0, 0, 122, 120, 1, 0, 0, 0, 122, 123, 1, 0, 0, 0, 123, 125, 1, 
		    0, 0, 0, 124, 122, 1, 0, 0, 0, 125, 126, 3, 16, 8, 0, 126, 127, 5, 
		    7, 0, 0, 127, 128, 5, 15, 0, 0, 128, 129, 5, 4, 0, 0, 129, 15, 1, 
		    0, 0, 0, 130, 132, 3, 24, 12, 0, 131, 130, 1, 0, 0, 0, 132, 133, 1, 
		    0, 0, 0, 133, 131, 1, 0, 0, 0, 133, 134, 1, 0, 0, 0, 134, 17, 1, 0, 
		    0, 0, 135, 137, 5, 8, 0, 0, 136, 138, 3, 22, 11, 0, 137, 136, 1, 0, 
		    0, 0, 138, 139, 1, 0, 0, 0, 139, 137, 1, 0, 0, 0, 139, 140, 1, 0, 
		    0, 0, 140, 141, 1, 0, 0, 0, 141, 142, 5, 8, 0, 0, 142, 19, 1, 0, 0, 
		    0, 143, 145, 5, 9, 0, 0, 144, 146, 3, 24, 12, 0, 145, 144, 1, 0, 0, 
		    0, 146, 147, 1, 0, 0, 0, 147, 145, 1, 0, 0, 0, 147, 148, 1, 0, 0, 
		    0, 148, 149, 1, 0, 0, 0, 149, 150, 5, 9, 0, 0, 150, 21, 1, 0, 0, 0, 
		    151, 156, 5, 10, 0, 0, 152, 156, 5, 12, 0, 0, 153, 156, 5, 11, 0, 
		    0, 154, 156, 3, 4, 2, 0, 155, 151, 1, 0, 0, 0, 155, 152, 1, 0, 0, 
		    0, 155, 153, 1, 0, 0, 0, 155, 154, 1, 0, 0, 0, 156, 23, 1, 0, 0, 0, 
		    157, 163, 3, 2, 1, 0, 158, 163, 5, 12, 0, 0, 159, 163, 5, 11, 0, 0, 
		    160, 163, 3, 4, 2, 0, 161, 163, 3, 14, 7, 0, 162, 157, 1, 0, 0, 0, 
		    162, 158, 1, 0, 0, 0, 162, 159, 1, 0, 0, 0, 162, 160, 1, 0, 0, 0, 
		    162, 161, 1, 0, 0, 0, 163, 25, 1, 0, 0, 0, 21, 32, 34, 43, 47, 53, 
		    59, 66, 71, 79, 85, 93, 97, 106, 110, 116, 122, 133, 139, 147, 155, 
		    162];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.12.0', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "atex.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function start(): Context\StartContext
		{
		    $localContext = new Context\StartContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_start);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(32); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(32);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::COMMAND:
		        	    	$this->setState(26);
		        	    	$this->command();
		        	    	break;

		        	    case self::T__5:
		        	    	$this->setState(27);
		        	    	$this->environment();
		        	    	break;

		        	    case self::T__7:
		        	    	$this->setState(28);
		        	    	$this->math_inline();
		        	    	break;

		        	    case self::T__8:
		        	    	$this->setState(29);
		        	    	$this->math_display();
		        	    	break;

		        	    case self::PLAIN_TEXT:
		        	    case self::SYMBOL_VERTICAL:
		        	    	$this->setState(30);
		        	    	$this->multi_plain_text();
		        	    	break;

		        	    case self::T__4:
		        	    	$this->setState(31);
		        	    	$this->newcommand();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(34); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 149344) !== 0));
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function multi_plain_text(): Context\Multi_plain_textContext
		{
		    $localContext = new Context\Multi_plain_textContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_multi_plain_text);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(36);

		        $_la = $this->input->LA(1);

		        if (!($_la === self::PLAIN_TEXT || $_la === self::SYMBOL_VERTICAL)) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function command(): Context\CommandContext
		{
		    $localContext = new Context\CommandContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_command);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(38);
		        $this->match(self::COMMAND);
		        $this->setState(47);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(39);
		        	$this->match(self::T__0);
		        	$this->setState(43);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 132352) !== 0)) {
		        		$this->setState(40);
		        		$this->option_real_arg();
		        		$this->setState(45);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(46);
		        	$this->match(self::T__1);
		        }
		        $this->setState(59);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(49);
		        	$this->match(self::T__2);
		        	$this->setState(53);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 134400) !== 0)) {
		        		$this->setState(50);
		        		$this->necessary_real_arg();
		        		$this->setState(55);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(56);
		        	$this->match(self::T__3);
		        	$this->setState(61);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function necessary_real_arg(): Context\Necessary_real_argContext
		{
		    $localContext = new Context\Necessary_real_argContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_necessary_real_arg);

		    try {
		        $this->setState(66);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(62);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::BRACKET:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(63);
		            	$this->match(self::BRACKET);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(64);
		            	$this->command();
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(65);
		            	$this->math_inline();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function option_real_arg(): Context\Option_real_argContext
		{
		    $localContext = new Context\Option_real_argContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_option_real_arg);

		    try {
		        $this->setState(71);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(68);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(69);
		            	$this->command();
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(70);
		            	$this->math_inline();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function newcommand(): Context\NewcommandContext
		{
		    $localContext = new Context\NewcommandContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_newcommand);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(73);
		        $this->match(self::T__4);
		        $this->setState(74);
		        $this->match(self::COMMAND);
		        $this->setState(75);
		        $this->match(self::T__3);
		        $this->setState(79);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		            case 1:
		        	    $this->setState(76);
		        	    $this->match(self::T__0);
		        	    $this->setState(77);
		        	    $this->match(self::DIGIT);
		        	    $this->setState(78);
		        	    $this->match(self::T__1);
		        	break;
		        }
		        $this->setState(85);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(81);
		        	$this->match(self::T__0);
		        	$this->setState(82);
		        	$this->option_real_arg();
		        	$this->setState(83);
		        	$this->match(self::T__1);
		        }
		        $this->setState(91); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(87);
		        	$this->match(self::T__2);
		        	$this->setState(88);
		        	$this->define_args();
		        	$this->setState(89);
		        	$this->match(self::T__3);
		        	$this->setState(93); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::T__2);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function define_args(): Context\Define_argsContext
		{
		    $localContext = new Context\Define_argsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_define_args);

		    try {
		        $this->setState(97);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__7:
		            case self::PLAIN_TEXT:
		            case self::BRACKET:
		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(95);
		            	$this->necessary_real_arg();
		            	break;

		            case self::SYMBOL_ARGS:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(96);
		            	$this->match(self::SYMBOL_ARGS);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function environment(): Context\EnvironmentContext
		{
		    $localContext = new Context\EnvironmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_environment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(99);
		        $this->match(self::T__5);
		        $this->setState(100);
		        $this->match(self::LETTERS);
		        $this->setState(101);
		        $this->match(self::T__3);
		        $this->setState(110);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(102);
		        	$this->match(self::T__0);
		        	$this->setState(106);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 132352) !== 0)) {
		        		$this->setState(103);
		        		$this->option_real_arg();
		        		$this->setState(108);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(109);
		        	$this->match(self::T__1);
		        }
		        $this->setState(122);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(112);
		        	$this->match(self::T__2);
		        	$this->setState(116);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 134400) !== 0)) {
		        		$this->setState(113);
		        		$this->necessary_real_arg();
		        		$this->setState(118);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(119);
		        	$this->match(self::T__3);
		        	$this->setState(124);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(125);
		        $this->env_body();
		        $this->setState(126);
		        $this->match(self::T__6);
		        $this->setState(127);
		        $this->match(self::LETTERS);
		        $this->setState(128);
		        $this->match(self::T__3);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function env_body(): Context\Env_bodyContext
		{
		    $localContext = new Context\Env_bodyContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_env_body);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(131); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(130);
		        	$this->in_math_display();
		        	$this->setState(133); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 154688) !== 0));
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function math_inline(): Context\Math_inlineContext
		{
		    $localContext = new Context\Math_inlineContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_math_inline);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(135);
		        $this->match(self::T__7);
		        $this->setState(137); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(136);
		        	$this->in_math_inline();
		        	$this->setState(139); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 138240) !== 0));
		        $this->setState(141);
		        $this->match(self::T__7);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function math_display(): Context\Math_displayContext
		{
		    $localContext = new Context\Math_displayContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_math_display);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(143);
		        $this->match(self::T__8);
		        $this->setState(145); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(144);
		        	$this->in_math_display();
		        	$this->setState(147); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 154688) !== 0));
		        $this->setState(149);
		        $this->match(self::T__8);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function in_math_inline(): Context\In_math_inlineContext
		{
		    $localContext = new Context\In_math_inlineContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_in_math_inline);

		    try {
		        $this->setState(155);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(151);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::SYMBOL_MATH:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(152);
		            	$this->match(self::SYMBOL_MATH);
		            	break;

		            case self::BRACKET:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(153);
		            	$this->match(self::BRACKET);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(154);
		            	$this->command();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function in_math_display(): Context\In_math_displayContext
		{
		    $localContext = new Context\In_math_displayContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_in_math_display);

		    try {
		        $this->setState(162);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            case self::SYMBOL_VERTICAL:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(157);
		            	$this->multi_plain_text();
		            	break;

		            case self::SYMBOL_MATH:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(158);
		            	$this->match(self::SYMBOL_MATH);
		            	break;

		            case self::BRACKET:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(159);
		            	$this->match(self::BRACKET);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(160);
		            	$this->command();
		            	break;

		            case self::T__5:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(161);
		            	$this->environment();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use atexParser;
	use atexListener;

	class StartContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_start;
	    }

	    /**
	     * @return array<CommandContext>|CommandContext|null
	     */
	    public function command(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(CommandContext::class);
	    	}

	        return $this->getTypedRuleContext(CommandContext::class, $index);
	    }

	    /**
	     * @return array<EnvironmentContext>|EnvironmentContext|null
	     */
	    public function environment(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(EnvironmentContext::class);
	    	}

	        return $this->getTypedRuleContext(EnvironmentContext::class, $index);
	    }

	    /**
	     * @return array<Math_inlineContext>|Math_inlineContext|null
	     */
	    public function math_inline(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Math_inlineContext::class);
	    	}

	        return $this->getTypedRuleContext(Math_inlineContext::class, $index);
	    }

	    /**
	     * @return array<Math_displayContext>|Math_displayContext|null
	     */
	    public function math_display(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Math_displayContext::class);
	    	}

	        return $this->getTypedRuleContext(Math_displayContext::class, $index);
	    }

	    /**
	     * @return array<Multi_plain_textContext>|Multi_plain_textContext|null
	     */
	    public function multi_plain_text(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Multi_plain_textContext::class);
	    	}

	        return $this->getTypedRuleContext(Multi_plain_textContext::class, $index);
	    }

	    /**
	     * @return array<NewcommandContext>|NewcommandContext|null
	     */
	    public function newcommand(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(NewcommandContext::class);
	    	}

	        return $this->getTypedRuleContext(NewcommandContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterStart($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitStart($this);
		    }
		}
	} 

	class Multi_plain_textContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_multi_plain_text;
	    }

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
	    }

	    public function SYMBOL_VERTICAL(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::SYMBOL_VERTICAL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterMulti_plain_text($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitMulti_plain_text($this);
		    }
		}
	} 

	class CommandContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_command;
	    }

	    public function COMMAND(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::COMMAND, 0);
	    }

	    /**
	     * @return array<Option_real_argContext>|Option_real_argContext|null
	     */
	    public function option_real_arg(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Option_real_argContext::class);
	    	}

	        return $this->getTypedRuleContext(Option_real_argContext::class, $index);
	    }

	    /**
	     * @return array<Necessary_real_argContext>|Necessary_real_argContext|null
	     */
	    public function necessary_real_arg(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Necessary_real_argContext::class);
	    	}

	        return $this->getTypedRuleContext(Necessary_real_argContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterCommand($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitCommand($this);
		    }
		}
	} 

	class Necessary_real_argContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_necessary_real_arg;
	    }

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
	    }

	    public function BRACKET(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::BRACKET, 0);
	    }

	    public function command(): ?CommandContext
	    {
	    	return $this->getTypedRuleContext(CommandContext::class, 0);
	    }

	    public function math_inline(): ?Math_inlineContext
	    {
	    	return $this->getTypedRuleContext(Math_inlineContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterNecessary_real_arg($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitNecessary_real_arg($this);
		    }
		}
	} 

	class Option_real_argContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_option_real_arg;
	    }

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
	    }

	    public function command(): ?CommandContext
	    {
	    	return $this->getTypedRuleContext(CommandContext::class, 0);
	    }

	    public function math_inline(): ?Math_inlineContext
	    {
	    	return $this->getTypedRuleContext(Math_inlineContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterOption_real_arg($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitOption_real_arg($this);
		    }
		}
	} 

	class NewcommandContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_newcommand;
	    }

	    public function COMMAND(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::COMMAND, 0);
	    }

	    public function DIGIT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::DIGIT, 0);
	    }

	    public function option_real_arg(): ?Option_real_argContext
	    {
	    	return $this->getTypedRuleContext(Option_real_argContext::class, 0);
	    }

	    /**
	     * @return array<Define_argsContext>|Define_argsContext|null
	     */
	    public function define_args(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Define_argsContext::class);
	    	}

	        return $this->getTypedRuleContext(Define_argsContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterNewcommand($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitNewcommand($this);
		    }
		}
	} 

	class Define_argsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_define_args;
	    }

	    public function necessary_real_arg(): ?Necessary_real_argContext
	    {
	    	return $this->getTypedRuleContext(Necessary_real_argContext::class, 0);
	    }

	    public function SYMBOL_ARGS(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::SYMBOL_ARGS, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterDefine_args($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitDefine_args($this);
		    }
		}
	} 

	class EnvironmentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_environment;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function LETTERS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(atexParser::LETTERS);
	    	}

	        return $this->getToken(atexParser::LETTERS, $index);
	    }

	    public function env_body(): ?Env_bodyContext
	    {
	    	return $this->getTypedRuleContext(Env_bodyContext::class, 0);
	    }

	    /**
	     * @return array<Option_real_argContext>|Option_real_argContext|null
	     */
	    public function option_real_arg(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Option_real_argContext::class);
	    	}

	        return $this->getTypedRuleContext(Option_real_argContext::class, $index);
	    }

	    /**
	     * @return array<Necessary_real_argContext>|Necessary_real_argContext|null
	     */
	    public function necessary_real_arg(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Necessary_real_argContext::class);
	    	}

	        return $this->getTypedRuleContext(Necessary_real_argContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterEnvironment($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitEnvironment($this);
		    }
		}
	} 

	class Env_bodyContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_env_body;
	    }

	    /**
	     * @return array<In_math_displayContext>|In_math_displayContext|null
	     */
	    public function in_math_display(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(In_math_displayContext::class);
	    	}

	        return $this->getTypedRuleContext(In_math_displayContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterEnv_body($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitEnv_body($this);
		    }
		}
	} 

	class Math_inlineContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_math_inline;
	    }

	    /**
	     * @return array<In_math_inlineContext>|In_math_inlineContext|null
	     */
	    public function in_math_inline(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(In_math_inlineContext::class);
	    	}

	        return $this->getTypedRuleContext(In_math_inlineContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterMath_inline($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitMath_inline($this);
		    }
		}
	} 

	class Math_displayContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_math_display;
	    }

	    /**
	     * @return array<In_math_displayContext>|In_math_displayContext|null
	     */
	    public function in_math_display(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(In_math_displayContext::class);
	    	}

	        return $this->getTypedRuleContext(In_math_displayContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterMath_display($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitMath_display($this);
		    }
		}
	} 

	class In_math_inlineContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_in_math_inline;
	    }

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
	    }

	    public function SYMBOL_MATH(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::SYMBOL_MATH, 0);
	    }

	    public function BRACKET(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::BRACKET, 0);
	    }

	    public function command(): ?CommandContext
	    {
	    	return $this->getTypedRuleContext(CommandContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterIn_math_inline($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitIn_math_inline($this);
		    }
		}
	} 

	class In_math_displayContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_in_math_display;
	    }

	    public function multi_plain_text(): ?Multi_plain_textContext
	    {
	    	return $this->getTypedRuleContext(Multi_plain_textContext::class, 0);
	    }

	    public function SYMBOL_MATH(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::SYMBOL_MATH, 0);
	    }

	    public function BRACKET(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::BRACKET, 0);
	    }

	    public function command(): ?CommandContext
	    {
	    	return $this->getTypedRuleContext(CommandContext::class, 0);
	    }

	    public function environment(): ?EnvironmentContext
	    {
	    	return $this->getTypedRuleContext(EnvironmentContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterIn_math_display($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitIn_math_display($this);
		    }
		}
	} 
}