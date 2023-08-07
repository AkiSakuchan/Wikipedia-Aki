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
               T__6 = 7, T__7 = 8, LETTERS = 9, COMMAND = 10, PLAIN_TEXT = 11, 
               WS = 12;

		public const RULE_start = 0, RULE_command = 1, RULE_real_args = 2, RULE_environment = 3, 
               RULE_env_body = 4, RULE_math_inline = 5, RULE_math_display = 6, 
               RULE_in_math = 7;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'start', 'command', 'real_args', 'environment', 'env_body', 'math_inline', 
			'math_display', 'in_math'
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
		    null, null, null, null, null, null, null, null, null, "LETTERS", "COMMAND", 
		    "PLAIN_TEXT", "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 12, 91, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 1, 0, 1, 0, 1, 0, 1, 0, 
		    1, 0, 3, 0, 22, 8, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3, 1, 29, 8, 1, 
		    1, 1, 1, 1, 1, 1, 1, 1, 5, 1, 35, 8, 1, 10, 1, 12, 1, 38, 9, 1, 1, 
		    2, 1, 2, 5, 2, 42, 8, 2, 10, 2, 12, 2, 45, 9, 2, 1, 3, 1, 3, 1, 3, 
		    1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 54, 8, 3, 1, 3, 1, 3, 1, 3, 1, 3, 5, 
		    3, 60, 8, 3, 10, 3, 12, 3, 63, 9, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 
		    1, 4, 1, 4, 1, 4, 5, 4, 73, 8, 4, 10, 4, 12, 4, 76, 9, 4, 1, 5, 1, 
		    5, 1, 5, 1, 5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 7, 1, 7, 1, 7, 3, 7, 89, 
		    8, 7, 1, 7, 0, 0, 8, 0, 2, 4, 6, 8, 10, 12, 14, 0, 0, 97, 0, 21, 1, 
		    0, 0, 0, 2, 23, 1, 0, 0, 0, 4, 43, 1, 0, 0, 0, 6, 46, 1, 0, 0, 0, 
		    8, 74, 1, 0, 0, 0, 10, 77, 1, 0, 0, 0, 12, 81, 1, 0, 0, 0, 14, 88, 
		    1, 0, 0, 0, 16, 22, 5, 11, 0, 0, 17, 22, 3, 2, 1, 0, 18, 22, 3, 6, 
		    3, 0, 19, 22, 3, 10, 5, 0, 20, 22, 3, 12, 6, 0, 21, 16, 1, 0, 0, 0, 
		    21, 17, 1, 0, 0, 0, 21, 18, 1, 0, 0, 0, 21, 19, 1, 0, 0, 0, 21, 20, 
		    1, 0, 0, 0, 22, 1, 1, 0, 0, 0, 23, 28, 5, 10, 0, 0, 24, 25, 5, 1, 
		    0, 0, 25, 26, 3, 4, 2, 0, 26, 27, 5, 2, 0, 0, 27, 29, 1, 0, 0, 0, 
		    28, 24, 1, 0, 0, 0, 28, 29, 1, 0, 0, 0, 29, 36, 1, 0, 0, 0, 30, 31, 
		    5, 3, 0, 0, 31, 32, 3, 4, 2, 0, 32, 33, 5, 4, 0, 0, 33, 35, 1, 0, 
		    0, 0, 34, 30, 1, 0, 0, 0, 35, 38, 1, 0, 0, 0, 36, 34, 1, 0, 0, 0, 
		    36, 37, 1, 0, 0, 0, 37, 3, 1, 0, 0, 0, 38, 36, 1, 0, 0, 0, 39, 42, 
		    5, 11, 0, 0, 40, 42, 3, 2, 1, 0, 41, 39, 1, 0, 0, 0, 41, 40, 1, 0, 
		    0, 0, 42, 45, 1, 0, 0, 0, 43, 41, 1, 0, 0, 0, 43, 44, 1, 0, 0, 0, 
		    44, 5, 1, 0, 0, 0, 45, 43, 1, 0, 0, 0, 46, 47, 5, 5, 0, 0, 47, 48, 
		    5, 9, 0, 0, 48, 53, 5, 4, 0, 0, 49, 50, 5, 1, 0, 0, 50, 51, 3, 4, 
		    2, 0, 51, 52, 5, 2, 0, 0, 52, 54, 1, 0, 0, 0, 53, 49, 1, 0, 0, 0, 
		    53, 54, 1, 0, 0, 0, 54, 61, 1, 0, 0, 0, 55, 56, 5, 3, 0, 0, 56, 57, 
		    3, 4, 2, 0, 57, 58, 5, 4, 0, 0, 58, 60, 1, 0, 0, 0, 59, 55, 1, 0, 
		    0, 0, 60, 63, 1, 0, 0, 0, 61, 59, 1, 0, 0, 0, 61, 62, 1, 0, 0, 0, 
		    62, 64, 1, 0, 0, 0, 63, 61, 1, 0, 0, 0, 64, 65, 3, 8, 4, 0, 65, 66, 
		    5, 6, 0, 0, 66, 67, 5, 9, 0, 0, 67, 68, 5, 4, 0, 0, 68, 7, 1, 0, 0, 
		    0, 69, 73, 5, 11, 0, 0, 70, 73, 3, 2, 1, 0, 71, 73, 3, 6, 3, 0, 72, 
		    69, 1, 0, 0, 0, 72, 70, 1, 0, 0, 0, 72, 71, 1, 0, 0, 0, 73, 76, 1, 
		    0, 0, 0, 74, 72, 1, 0, 0, 0, 74, 75, 1, 0, 0, 0, 75, 9, 1, 0, 0, 0, 
		    76, 74, 1, 0, 0, 0, 77, 78, 5, 7, 0, 0, 78, 79, 3, 14, 7, 0, 79, 80, 
		    5, 7, 0, 0, 80, 11, 1, 0, 0, 0, 81, 82, 5, 8, 0, 0, 82, 83, 3, 14, 
		    7, 0, 83, 84, 5, 8, 0, 0, 84, 13, 1, 0, 0, 0, 85, 89, 5, 11, 0, 0, 
		    86, 89, 3, 2, 1, 0, 87, 89, 3, 6, 3, 0, 88, 85, 1, 0, 0, 0, 88, 86, 
		    1, 0, 0, 0, 88, 87, 1, 0, 0, 0, 89, 15, 1, 0, 0, 0, 10, 21, 28, 36, 
		    41, 43, 53, 61, 72, 74, 88];
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
		        $this->setState(21);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(16);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(17);
		            	$this->command();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(18);
		            	$this->environment();
		            	break;

		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(19);
		            	$this->math_inline();
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(20);
		            	$this->math_display();
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
		        $this->setState(23);
		        $this->match(self::COMMAND);
		        $this->setState(28);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(24);
		        	$this->match(self::T__0);
		        	$this->setState(25);
		        	$this->real_args();
		        	$this->setState(26);
		        	$this->match(self::T__1);
		        }
		        $this->setState(36);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(30);
		        	$this->match(self::T__2);
		        	$this->setState(31);
		        	$this->real_args();
		        	$this->setState(32);
		        	$this->match(self::T__3);
		        	$this->setState(38);
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
		public function real_args(): Context\Real_argsContext
		{
		    $localContext = new Context\Real_argsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_real_args);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(43);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMAND || $_la === self::PLAIN_TEXT) {
		        	$this->setState(41);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::PLAIN_TEXT:
		        	    	$this->setState(39);
		        	    	$this->match(self::PLAIN_TEXT);
		        	    	break;

		        	    case self::COMMAND:
		        	    	$this->setState(40);
		        	    	$this->command();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(45);
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
		public function environment(): Context\EnvironmentContext
		{
		    $localContext = new Context\EnvironmentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_environment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(46);
		        $this->match(self::T__4);
		        $this->setState(47);
		        $this->match(self::LETTERS);
		        $this->setState(48);
		        $this->match(self::T__3);
		        $this->setState(53);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(49);
		        	$this->match(self::T__0);
		        	$this->setState(50);
		        	$this->real_args();
		        	$this->setState(51);
		        	$this->match(self::T__1);
		        }
		        $this->setState(61);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(55);
		        	$this->match(self::T__2);
		        	$this->setState(56);
		        	$this->real_args();
		        	$this->setState(57);
		        	$this->match(self::T__3);
		        	$this->setState(63);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(64);
		        $this->env_body();
		        $this->setState(65);
		        $this->match(self::T__5);
		        $this->setState(66);
		        $this->match(self::LETTERS);
		        $this->setState(67);
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

		    $this->enterRule($localContext, 8, self::RULE_env_body);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(74);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 3104) !== 0)) {
		        	$this->setState(72);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::PLAIN_TEXT:
		        	    	$this->setState(69);
		        	    	$this->match(self::PLAIN_TEXT);
		        	    	break;

		        	    case self::COMMAND:
		        	    	$this->setState(70);
		        	    	$this->command();
		        	    	break;

		        	    case self::T__4:
		        	    	$this->setState(71);
		        	    	$this->environment();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(76);
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

		    $this->enterRule($localContext, 10, self::RULE_math_inline);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(77);
		        $this->match(self::T__6);
		        $this->setState(78);
		        $this->in_math();
		        $this->setState(79);
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

		    $this->enterRule($localContext, 12, self::RULE_math_display);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(81);
		        $this->match(self::T__7);
		        $this->setState(82);
		        $this->in_math();
		        $this->setState(83);
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
		public function in_math(): Context\In_mathContext
		{
		    $localContext = new Context\In_mathContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_in_math);

		    try {
		        $this->setState(88);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(85);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(86);
		            	$this->command();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(87);
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

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
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
	     * @return array<Real_argsContext>|Real_argsContext|null
	     */
	    public function real_args(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Real_argsContext::class);
	    	}

	        return $this->getTypedRuleContext(Real_argsContext::class, $index);
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

	class Real_argsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_real_args;
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
	     * @return array<CommandContext>|CommandContext|null
	     */
	    public function command(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(CommandContext::class);
	    	}

	        return $this->getTypedRuleContext(CommandContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->enterReal_args($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitReal_args($this);
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
	     * @return array<Real_argsContext>|Real_argsContext|null
	     */
	    public function real_args(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(Real_argsContext::class);
	    	}

	        return $this->getTypedRuleContext(Real_argsContext::class, $index);
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

	    public function in_math(): ?In_mathContext
	    {
	    	return $this->getTypedRuleContext(In_mathContext::class, 0);
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

	    public function in_math(): ?In_mathContext
	    {
	    	return $this->getTypedRuleContext(In_mathContext::class, 0);
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

	class In_mathContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return atexParser::RULE_in_math;
	    }

	    public function PLAIN_TEXT(): ?TerminalNode
	    {
	        return $this->getToken(atexParser::PLAIN_TEXT, 0);
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
			    $listener->enterIn_math($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof atexListener) {
			    $listener->exitIn_math($this);
		    }
		}
	} 
}