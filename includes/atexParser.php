<?php

/*
 * Generated from atex.g4 by ANTLR 4.13.0
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
               LETTERS = 7, COMMAND = 8, PLAIN_TEXT = 9, WS = 10;

		public const RULE_start = 0, RULE_command = 1, RULE_real_args = 2, RULE_environment = 3, 
               RULE_env_body = 4;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'start', 'command', 'real_args', 'environment', 'env_body'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'['", "']'", "'{'", "'}'", "'\\begin{'", "'\\end{'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, "LETTERS", "COMMAND", "PLAIN_TEXT", 
		    "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 10, 70, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 1, 0, 1, 0, 1, 0, 3, 0, 14, 8, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 
		    1, 3, 1, 21, 8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 1, 27, 8, 1, 10, 1, 
		    12, 1, 30, 9, 1, 1, 2, 1, 2, 5, 2, 34, 8, 2, 10, 2, 12, 2, 37, 9, 
		    2, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 1, 3, 3, 3, 46, 8, 3, 1, 3, 
		    1, 3, 1, 3, 1, 3, 5, 3, 52, 8, 3, 10, 3, 12, 3, 55, 9, 3, 1, 3, 1, 
		    3, 1, 3, 1, 3, 1, 3, 1, 4, 1, 4, 1, 4, 5, 4, 65, 8, 4, 10, 4, 12, 
		    4, 68, 9, 4, 1, 4, 0, 0, 5, 0, 2, 4, 6, 8, 0, 0, 75, 0, 13, 1, 0, 
		    0, 0, 2, 15, 1, 0, 0, 0, 4, 35, 1, 0, 0, 0, 6, 38, 1, 0, 0, 0, 8, 
		    66, 1, 0, 0, 0, 10, 14, 5, 9, 0, 0, 11, 14, 3, 2, 1, 0, 12, 14, 3, 
		    6, 3, 0, 13, 10, 1, 0, 0, 0, 13, 11, 1, 0, 0, 0, 13, 12, 1, 0, 0, 
		    0, 14, 1, 1, 0, 0, 0, 15, 20, 5, 8, 0, 0, 16, 17, 5, 1, 0, 0, 17, 
		    18, 3, 4, 2, 0, 18, 19, 5, 2, 0, 0, 19, 21, 1, 0, 0, 0, 20, 16, 1, 
		    0, 0, 0, 20, 21, 1, 0, 0, 0, 21, 28, 1, 0, 0, 0, 22, 23, 5, 3, 0, 
		    0, 23, 24, 3, 4, 2, 0, 24, 25, 5, 4, 0, 0, 25, 27, 1, 0, 0, 0, 26, 
		    22, 1, 0, 0, 0, 27, 30, 1, 0, 0, 0, 28, 26, 1, 0, 0, 0, 28, 29, 1, 
		    0, 0, 0, 29, 3, 1, 0, 0, 0, 30, 28, 1, 0, 0, 0, 31, 34, 5, 9, 0, 0, 
		    32, 34, 3, 2, 1, 0, 33, 31, 1, 0, 0, 0, 33, 32, 1, 0, 0, 0, 34, 37, 
		    1, 0, 0, 0, 35, 33, 1, 0, 0, 0, 35, 36, 1, 0, 0, 0, 36, 5, 1, 0, 0, 
		    0, 37, 35, 1, 0, 0, 0, 38, 39, 5, 5, 0, 0, 39, 40, 5, 7, 0, 0, 40, 
		    45, 5, 4, 0, 0, 41, 42, 5, 1, 0, 0, 42, 43, 3, 4, 2, 0, 43, 44, 5, 
		    2, 0, 0, 44, 46, 1, 0, 0, 0, 45, 41, 1, 0, 0, 0, 45, 46, 1, 0, 0, 
		    0, 46, 53, 1, 0, 0, 0, 47, 48, 5, 3, 0, 0, 48, 49, 3, 4, 2, 0, 49, 
		    50, 5, 4, 0, 0, 50, 52, 1, 0, 0, 0, 51, 47, 1, 0, 0, 0, 52, 55, 1, 
		    0, 0, 0, 53, 51, 1, 0, 0, 0, 53, 54, 1, 0, 0, 0, 54, 56, 1, 0, 0, 
		    0, 55, 53, 1, 0, 0, 0, 56, 57, 3, 8, 4, 0, 57, 58, 5, 6, 0, 0, 58, 
		    59, 5, 7, 0, 0, 59, 60, 5, 4, 0, 0, 60, 7, 1, 0, 0, 0, 61, 65, 5, 
		    9, 0, 0, 62, 65, 3, 2, 1, 0, 63, 65, 3, 6, 3, 0, 64, 61, 1, 0, 0, 
		    0, 64, 62, 1, 0, 0, 0, 64, 63, 1, 0, 0, 0, 65, 68, 1, 0, 0, 0, 66, 
		    64, 1, 0, 0, 0, 66, 67, 1, 0, 0, 0, 67, 9, 1, 0, 0, 0, 68, 66, 1, 
		    0, 0, 0, 9, 13, 20, 28, 33, 35, 45, 53, 64, 66];
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

			RuntimeMetaData::checkVersion('4.13.0', RuntimeMetaData::VERSION);

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
		        $this->setState(13);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::PLAIN_TEXT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(10);
		            	$this->match(self::PLAIN_TEXT);
		            	break;

		            case self::COMMAND:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(11);
		            	$this->command();
		            	break;

		            case self::T__4:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(12);
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

		/**
		 * @throws RecognitionException
		 */
		public function command(): Context\CommandContext
		{
		    $localContext = new Context\CommandContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_command);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(15);
		        $this->match(self::COMMAND);
		        $this->setState(20);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(16);
		        	$this->match(self::T__0);
		        	$this->setState(17);
		        	$this->real_args();
		        	$this->setState(18);
		        	$this->match(self::T__1);
		        }
		        $this->setState(28);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(22);
		        	$this->match(self::T__2);
		        	$this->setState(23);
		        	$this->real_args();
		        	$this->setState(24);
		        	$this->match(self::T__3);
		        	$this->setState(30);
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
		        $this->setState(35);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMAND || $_la === self::PLAIN_TEXT) {
		        	$this->setState(33);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::PLAIN_TEXT:
		        	    	$this->setState(31);
		        	    	$this->match(self::PLAIN_TEXT);
		        	    	break;

		        	    case self::COMMAND:
		        	    	$this->setState(32);
		        	    	$this->command();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(37);
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
		        $this->setState(38);
		        $this->match(self::T__4);
		        $this->setState(39);
		        $this->match(self::LETTERS);
		        $this->setState(40);
		        $this->match(self::T__3);
		        $this->setState(45);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__0) {
		        	$this->setState(41);
		        	$this->match(self::T__0);
		        	$this->setState(42);
		        	$this->real_args();
		        	$this->setState(43);
		        	$this->match(self::T__1);
		        }
		        $this->setState(53);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__2) {
		        	$this->setState(47);
		        	$this->match(self::T__2);
		        	$this->setState(48);
		        	$this->real_args();
		        	$this->setState(49);
		        	$this->match(self::T__3);
		        	$this->setState(55);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(56);
		        $this->env_body();
		        $this->setState(57);
		        $this->match(self::T__5);
		        $this->setState(58);
		        $this->match(self::LETTERS);
		        $this->setState(59);
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
		        $this->setState(66);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 800) !== 0)) {
		        	$this->setState(64);
		        	$this->errorHandler->sync($this);

		        	switch ($this->input->LA(1)) {
		        	    case self::PLAIN_TEXT:
		        	    	$this->setState(61);
		        	    	$this->match(self::PLAIN_TEXT);
		        	    	break;

		        	    case self::COMMAND:
		        	    	$this->setState(62);
		        	    	$this->command();
		        	    	break;

		        	    case self::T__4:
		        	    	$this->setState(63);
		        	    	$this->environment();
		        	    	break;

		        	default:
		        		throw new NoViableAltException($this);
		        	}
		        	$this->setState(68);
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
}