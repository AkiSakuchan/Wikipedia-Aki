<?php

/*
 * Generated from atex.g4 by ANTLR 4.12.0
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\LexerATNSimulator;
	use Antlr\Antlr4\Runtime\Lexer;
	use Antlr\Antlr4\Runtime\CharStream;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\VocabularyImpl;

	final class atexLexer extends Lexer
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, LETTERS = 9, COMMAND = 10, PLAIN_TEXT = 11, 
               WS = 12;

		/**
		 * @var array<string>
		 */
		public const CHANNEL_NAMES = [
			'DEFAULT_TOKEN_CHANNEL', 'HIDDEN'
		];

		/**
		 * @var array<string>
		 */
		public const MODE_NAMES = [
			'DEFAULT_MODE'
		];

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'T__0', 'T__1', 'T__2', 'T__3', 'T__4', 'T__5', 'T__6', 'T__7', 'LETTERS', 
			'COMMAND', 'HAN', 'ASCII', 'PLAIN_TEXT', 'WS'
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
			[4, 0, 12, 78, 6, -1, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 
		    2, 4, 7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 
		    7, 9, 2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 1, 0, 
		    1, 0, 1, 1, 1, 1, 1, 2, 1, 2, 1, 3, 1, 3, 1, 4, 1, 4, 1, 4, 1, 4, 
		    1, 4, 1, 4, 1, 4, 1, 4, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 6, 
		    1, 6, 1, 7, 1, 7, 1, 7, 1, 8, 4, 8, 58, 8, 8, 11, 8, 12, 8, 59, 1, 
		    9, 1, 9, 1, 9, 1, 10, 1, 10, 1, 11, 1, 11, 1, 12, 1, 12, 4, 12, 71, 
		    8, 12, 11, 12, 12, 12, 72, 1, 13, 1, 13, 1, 13, 1, 13, 0, 0, 14, 1, 
		    1, 3, 2, 5, 3, 7, 4, 9, 5, 11, 6, 13, 7, 15, 8, 17, 9, 19, 10, 21, 
		    0, 23, 0, 25, 11, 27, 12, 1, 0, 4, 2, 0, 65, 90, 97, 122, 20, 0, 11904, 
		    11929, 11931, 12019, 12032, 12245, 12293, 12293, 12295, 12295, 12321, 
		    12329, 12344, 12347, 13312, 19903, 19968, 40959, 63744, 64109, 64112, 
		    64217, 94178, 94179, 94192, 94193, 131072, 173791, 173824, 177976, 
		    177984, 178205, 178208, 183969, 183984, 191456, 194560, 195101, 196608, 
		    201546, 3, 0, 33, 35, 37, 91, 93, 126, 10, 0, 9, 13, 32, 32, 133, 
		    133, 160, 160, 5760, 5760, 8192, 8202, 8232, 8233, 8239, 8239, 8287, 
		    8287, 12288, 12288, 78, 0, 1, 1, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 5, 
		    1, 0, 0, 0, 0, 7, 1, 0, 0, 0, 0, 9, 1, 0, 0, 0, 0, 11, 1, 0, 0, 0, 
		    0, 13, 1, 0, 0, 0, 0, 15, 1, 0, 0, 0, 0, 17, 1, 0, 0, 0, 0, 19, 1, 
		    0, 0, 0, 0, 25, 1, 0, 0, 0, 0, 27, 1, 0, 0, 0, 1, 29, 1, 0, 0, 0, 
		    3, 31, 1, 0, 0, 0, 5, 33, 1, 0, 0, 0, 7, 35, 1, 0, 0, 0, 9, 37, 1, 
		    0, 0, 0, 11, 45, 1, 0, 0, 0, 13, 51, 1, 0, 0, 0, 15, 53, 1, 0, 0, 
		    0, 17, 57, 1, 0, 0, 0, 19, 61, 1, 0, 0, 0, 21, 64, 1, 0, 0, 0, 23, 
		    66, 1, 0, 0, 0, 25, 70, 1, 0, 0, 0, 27, 74, 1, 0, 0, 0, 29, 30, 5, 
		    91, 0, 0, 30, 2, 1, 0, 0, 0, 31, 32, 5, 93, 0, 0, 32, 4, 1, 0, 0, 
		    0, 33, 34, 5, 123, 0, 0, 34, 6, 1, 0, 0, 0, 35, 36, 5, 125, 0, 0, 
		    36, 8, 1, 0, 0, 0, 37, 38, 5, 92, 0, 0, 38, 39, 5, 98, 0, 0, 39, 40, 
		    5, 101, 0, 0, 40, 41, 5, 103, 0, 0, 41, 42, 5, 105, 0, 0, 42, 43, 
		    5, 110, 0, 0, 43, 44, 5, 123, 0, 0, 44, 10, 1, 0, 0, 0, 45, 46, 5, 
		    92, 0, 0, 46, 47, 5, 101, 0, 0, 47, 48, 5, 110, 0, 0, 48, 49, 5, 100, 
		    0, 0, 49, 50, 5, 123, 0, 0, 50, 12, 1, 0, 0, 0, 51, 52, 5, 36, 0, 
		    0, 52, 14, 1, 0, 0, 0, 53, 54, 5, 36, 0, 0, 54, 55, 5, 36, 0, 0, 55, 
		    16, 1, 0, 0, 0, 56, 58, 7, 0, 0, 0, 57, 56, 1, 0, 0, 0, 58, 59, 1, 
		    0, 0, 0, 59, 57, 1, 0, 0, 0, 59, 60, 1, 0, 0, 0, 60, 18, 1, 0, 0, 
		    0, 61, 62, 5, 92, 0, 0, 62, 63, 3, 17, 8, 0, 63, 20, 1, 0, 0, 0, 64, 
		    65, 7, 1, 0, 0, 65, 22, 1, 0, 0, 0, 66, 67, 7, 2, 0, 0, 67, 24, 1, 
		    0, 0, 0, 68, 71, 3, 21, 10, 0, 69, 71, 3, 23, 11, 0, 70, 68, 1, 0, 
		    0, 0, 70, 69, 1, 0, 0, 0, 71, 72, 1, 0, 0, 0, 72, 70, 1, 0, 0, 0, 
		    72, 73, 1, 0, 0, 0, 73, 26, 1, 0, 0, 0, 74, 75, 7, 3, 0, 0, 75, 76, 
		    1, 0, 0, 0, 76, 77, 6, 13, 0, 0, 77, 28, 1, 0, 0, 0, 4, 0, 59, 70, 
		    72, 1, 6, 0, 0];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;
		public function __construct(CharStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new LexerATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
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

		public static function vocabulary(): Vocabulary
		{
			static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
		}

		public function getGrammarFileName(): string
		{
			return 'atex.g4';
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		/**
		 * @return array<string>
		 */
		public function getChannelNames(): array
		{
			return self::CHANNEL_NAMES;
		}

		/**
		 * @return array<string>
		 */
		public function getModeNames(): array
		{
			return self::MODE_NAMES;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
		{
			return self::vocabulary();
		}
	}
}