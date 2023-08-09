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
               T__6 = 7, T__7 = 8, PLAIN_TEXT = 9, BRACKET = 10, LETTERS = 11, 
               DIGIT = 12, COMMAND = 13;

		public const RULE_start = 0, RULE_command = 1, RULE_necessary_real_arg = 2, 
               RULE_option_real_arg = 3, RULE_environment = 4, RULE_env_body = 5, 
               RULE_math_inline = 6, RULE_math_display = 7, RULE_in_math_inline = 8, 
               RULE_in_math_display = 9;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'start', 'command', 'necessary_real_arg', 'option_real_arg', 'environment', 
			'env_body', 'math_inline', 'math_display', 'in_math_inline', 'in_math_display'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'['", "']'", "'{'", "'}'", "'\\begin{'", "'\\end{'", "'\$'", 
		    "'\$\$'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, "PLAIN_TEXT", 
		    "BRACKET", "LETTERS", "DIGIT", "COMMAND"
		];

		private const SERIALIZED_ATN =
			[4, 1, 13, 118, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 3, 0, 26, 8, 0, 1, 1, 1, 1, 1, 1, 5, 
		    1, 31, 8, 1, 10, 1, 12, 1, 34, 9, 1, 1, 1, 3, 1, 37, 8, 1, 1, 1, 1, 
		    1, 5, 1, 41, 8, 1, 10, 1, 12, 1, 44, 9, 1, 1, 1, 5, 1, 47, 8, 1, 10, 
		    1, 12, 1, 50, 9, 1, 1, 2, 1, 2, 1, 2, 3, 2, 55, 8, 2, 1, 3, 1, 3, 
		    3, 3, 59, 8, 3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 5, 4, 66, 8, 4, 10, 
		    4, 12, 4, 69, 9, 4, 1, 4, 3, 4, 72, 8, 4, 1, 4, 1, 4, 5, 4, 76, 8, 
		    4, 10, 4, 12, 4, 79, 9, 4, 1, 4, 5, 4, 82, 8, 4, 10, 4, 12, 4, 85, 
		    9, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 5, 1, 5, 1, 5, 1, 5, 5, 5, 
		    96, 8, 5, 10, 5, 12, 5, 99, 9, 5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 
		    7, 1, 7, 1, 7, 1, 8, 1, 8, 1, 8, 3, 8, 112, 8, 8, 1, 9, 1, 9, 3, 9, 
		    116, 8, 9, 1, 9, 0, 0, 10, 0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 0, 0, 
		    129, 0, 25, 1, 0, 0, 0, 2, 27, 1, 0, 0, 0, 4, 54, 1, 0, 0, 0, 6, 58, 
		    1, 0, 0, 0, 8, 60, 1, 0, 0, 0, 10, 97, 1, 0, 0, 0, 12, 100, 1, 0, 
		    0, 0, 14, 104, 1, 0, 0, 0, 16, 111, 1, 0, 0, 0, 18, 115, 1, 0, 0, 
		    0, 20, 26, 3, 2, 1, 0, 21, 26, 3, 8, 4, 0, 22, 26, 3, 12, 6, 0, 23, 
		    26, 3, 14, 7, 0, 24, 26, 5, 9, 0, 0, 25, 20, 1, 0, 0, 0, 25, 21, 1, 
		    0, 0, 0, 25, 22, 1, 0, 0, 0, 25, 23, 1, 0, 0, 0, 25, 24, 1, 0, 0, 
		    0, 26, 1, 1, 0, 0, 0, 27, 36, 5, 13, 0, 0, 28, 32, 5, 1, 0, 0, 29, 
		    31, 3, 6, 3, 0, 30, 29, 1, 0, 0, 0, 31, 34, 1, 0, 0, 0, 32, 30, 1, 
		    0, 0, 0, 32, 33, 1, 0, 0, 0, 33, 35, 1, 0, 0, 0, 34, 32, 1, 0, 0, 
		    0, 35, 37, 5, 2, 0, 0, 36, 28, 1, 0, 0, 0, 36, 37, 1, 0, 0, 0, 37, 
		    48, 1, 0, 0, 0, 38, 42, 5, 3, 0, 0, 39, 41, 3, 4, 2, 0, 40, 39, 1, 
		    0, 0, 0, 41, 44, 1, 0, 0, 0, 42, 40, 1, 0, 0, 0, 42, 43, 1, 0, 0, 
		    0, 43, 45, 1, 0, 0, 0, 44, 42, 1, 0, 0, 0, 45, 47, 5, 4, 0, 0, 46, 
		    38, 1, 0, 0, 0, 47, 50, 1, 0, 0, 0, 48, 46, 1, 0, 0, 0, 48, 49, 1, 
		    0, 0, 0, 49, 3, 1, 0, 0, 0, 50, 48, 1, 0, 0, 0, 51, 55, 5, 9, 0, 0, 
		    52, 55, 5, 10, 0, 0, 53, 55, 3, 2, 1, 0, 54, 51, 1, 0, 0, 0, 54, 52, 
		    1, 0, 0, 0, 54, 53, 1, 0, 0, 0, 55, 5, 1, 0, 0, 0, 56, 59, 5, 9, 0, 
		    0, 57, 59, 3, 2, 1, 0, 58, 56, 1, 0, 0, 0, 58, 57, 1, 0, 0, 0, 59, 
		    7, 1, 0, 0, 0, 60, 61, 5, 5, 0, 0, 61, 62, 5, 11, 0, 0, 62, 71, 5, 
		    4, 0, 0, 63, 67, 5, 1, 0, 0, 64, 66, 3, 6, 3, 0, 65, 64, 1, 0, 0, 
		    0, 66, 69, 1, 0, 0, 0, 67, 65, 1, 0, 0, 0, 67, 68, 1, 0, 0, 0, 68, 
		    70, 1, 0, 0, 0, 69, 67, 1, 0, 0, 0, 70, 72, 5, 2, 0, 0, 71, 63, 1, 
		    0, 0, 0, 71, 72, 1, 0, 0, 0, 72, 83, 1, 0, 0, 0, 73, 77, 5, 3, 0, 
		    0, 74, 76, 3, 4, 2, 0, 75, 74, 1, 0, 0, 0, 76, 79, 1, 0, 0, 0, 77, 
		    75, 1, 0, 0, 0, 77, 78, 1, 0, 0, 0, 78, 80, 1, 0, 0, 0, 79, 77, 1, 
		    0, 0, 0, 80, 82, 5, 4, 0, 0, 81, 73, 1, 0, 0, 0, 82, 85, 1, 0, 0, 
		    0, 83, 81, 1, 0, 0, 0, 83, 84, 1, 0, 0, 0, 84, 86, 1, 0, 0, 0, 85, 
		    83, 1, 0, 0, 0, 86, 87, 3, 10, 5, 0, 87, 88, 5, 6, 0, 0, 88, 89, 5, 
		    11, 0, 0, 89, 90, 5, 4, 0, 0, 90, 9, 1, 0, 0, 0, 91, 96, 5, 9, 0, 
		    0, 92, 96, 5, 10, 0, 0, 93, 96, 3, 2, 1, 0, 94, 96, 3, 8, 4, 0, 95, 
		    91, 1, 0, 0, 0, 95, 92, 1, 0, 0, 0, 95, 93, 1, 0, 0, 0, 95, 94, 1, 
		    0, 0, 0, 96, 99, 1, 0, 0, 0, 97, 95, 1, 0, 0, 0, 97, 98, 1, 0, 0, 
		    0, 98, 11, 1, 0, 0, 0, 99, 97, 1, 0, 0, 0, 100, 101, 5, 7, 0, 0, 101, 
		    102, 3, 16, 8, 0, 102, 103, 5, 7, 0, 0, 103, 13, 1, 0, 0, 0, 104, 
		    105, 5, 8, 0, 0, 105, 106, 3, 18, 9, 0, 106, 107, 5, 8, 0, 0, 107, 
		    15, 1, 0, 0, 0, 108, 112, 5, 9, 0, 0, 109, 112, 5, 10, 0, 0, 110, 
		    112, 3, 2, 1, 0, 111, 108, 1, 0, 0, 0, 111, 109, 1, 0, 0, 0, 111, 
		    110, 1, 0, 0, 0, 112, 17, 1, 0, 0, 0, 113, 116, 3, 16, 8, 0, 114, 
		    116, 3, 8, 4, 0, 115, 113, 1, 0, 0, 0, 115, 114, 1, 0, 0, 0, 116, 
		    19, 1, 0, 0, 0, 15, 25, 32, 36, 42, 48, 54, 58, 67, 71, 77, 83, 95, 
		    97, 111, 115];
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
		        $this->setState(25);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(20);
		            	$this->command();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(21);
		            	$this->environment();
		            	break;

		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(22);
		            	$this->math_inline();
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(23);
		            	$this->math_display();
		            	break;

		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(24);
		            	$this->match(self::PLAIN_TEXT);
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
		public function command(): Context\CommandContext
		{
		    $localContext = new Context\CommandContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_command);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(27);
		        $this->match(self::COMMAND);
		        $this->setState(36);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(28);
		        	$this->match(self::T__0);
		        	$this->setState(32);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while ($_la === self::PLAIN_TEXT || $_la === self::COMMAND) {
		        		$this->setState(29);
		        		$this->option_real_arg();
		        		$this->setState(34);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(35);
		        	$this->match(self::T__1);
		        }
		        $this->setState(48);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(38);
		        	$this->match(self::T__2);
		        	$this->setState(42);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 9728) !== 0)) {
		        		$this->setState(39);
		        		$this->necessary_real_arg();
		        		$this->setState(44);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(45);
		        	$this->match(self::T__3);
		        	$this->setState(50);
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

		    $this->enterRule($localContext, 4, self::RULE_necessary_real_arg);

		    try {
		        $this->setState(54);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(51);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::BRACKET:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(52);
		            	$this->match(self::BRACKET);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(53);
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
		public function option_real_arg(): Context\Option_real_argContext
		{
		    $localContext = new Context\Option_real_argContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_option_real_arg);

		    try {
		        $this->setState(58);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(56);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(57);
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
		public function environment(): Context\EnvironmentContext
		{
		    $localContext = new Context\EnvironmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_environment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(60);
		        $this->match(self::T__4);
		        $this->setState(61);
		        $this->match(self::LETTERS);
		        $this->setState(62);
		        $this->match(self::T__3);
		        $this->setState(71);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(63);
		        	$this->match(self::T__0);
		        	$this->setState(67);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while ($_la === self::PLAIN_TEXT || $_la === self::COMMAND) {
		        		$this->setState(64);
		        		$this->option_real_arg();
		        		$this->setState(69);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(70);
		        	$this->match(self::T__1);
		        }
		        $this->setState(83);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(73);
		        	$this->match(self::T__2);
		        	$this->setState(77);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 9728) !== 0)) {
		        		$this->setState(74);
		        		$this->necessary_real_arg();
		        		$this->setState(79);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        	$this->setState(80);
		        	$this->match(self::T__3);
		        	$this->setState(85);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(86);
		        $this->env_body();
		        $this->setState(87);
		        $this->match(self::T__5);
		        $this->setState(88);
		        $this->match(self::LETTERS);
		        $this->setState(89);
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

		    $this->enterRule($localContext, 10, self::RULE_env_body);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(97);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 9760) !== 0)) {
		        	$this->setState(95);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::PLAIN_TEXT:
		        	    	$this->setState(91);
		        	    	$this->match(self::PLAIN_TEXT);
		        	    	break;

		        	    case self::BRACKET:
		        	    	$this->setState(92);
		        	    	$this->match(self::BRACKET);
		        	    	break;

		        	    case self::COMMAND:
		        	    	$this->setState(93);
		        	    	$this->command();
		        	    	break;

		        	    case self::T__4:
		        	    	$this->setState(94);
		        	    	$this->environment();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(99);
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
		public function math_inline(): Context\Math_inlineContext
		{
		    $localContext = new Context\Math_inlineContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_math_inline);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(100);
		        $this->match(self::T__6);
		        $this->setState(101);
		        $this->in_math_inline();
		        $this->setState(102);
		        $this->match(self::T__6);
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

		    $this->enterRule($localContext, 14, self::RULE_math_display);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(104);
		        $this->match(self::T__7);
		        $this->setState(105);
		        $this->in_math_display();
		        $this->setState(106);
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
		public function in_math_inline(): Context\In_math_inlineContext
		{
		    $localContext = new Context\In_math_inlineContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_in_math_inline);

		    try {
		        $this->setState(111);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(108);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::BRACKET:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(109);
		            	$this->match(self::BRACKET);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(110);
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

		    $this->enterRule($localContext, 18, self::RULE_in_math_display);

		    try {
		        $this->setState(115);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            case self::BRACKET:
		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(113);
		            	$this->in_math_inline();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(114);
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

	    public function command(): ?CommandContext
	    {
	    	return $this->getTypedRuleContext(CommandContext::class, 0);
	    }

	    public function environment(): ?EnvironmentContext
	    {
	    	return $this->getTypedRuleContext(EnvironmentContext::class, 0);
	    }

	    public function math_inline(): ?Math_inlineContext
	    {
	    	return $this->getTypedRuleContext(Math_inlineContext::class, 0);
	    }

	    public function math_display(): ?Math_displayContext
	    {
	    	return $this->getTypedRuleContext(Math_displayContext::class, 0);
	    }

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
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
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function PLAIN_TEXT(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(atexParser::PLAIN_TEXT);
	    	}

	        return $this->getToken(atexParser::PLAIN_TEXT, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function BRACKET(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(atexParser::BRACKET);
	    	}

	        return $this->getToken(atexParser::BRACKET, $index);
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

	    public function in_math_inline(): ?In_math_inlineContext
	    {
	    	return $this->getTypedRuleContext(In_math_inlineContext::class, 0);
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

	    public function in_math_display(): ?In_math_displayContext
	    {
	    	return $this->getTypedRuleContext(In_math_displayContext::class, 0);
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

	    public function in_math_inline(): ?In_math_inlineContext
	    {
	    	return $this->getTypedRuleContext(In_math_inlineContext::class, 0);
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