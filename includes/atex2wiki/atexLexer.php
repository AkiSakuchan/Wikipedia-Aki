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
               T__6 = 7, T__7 = 8, T__8 = 9, PLAIN_TEXT = 10, BRACKET = 11, 
               SYMBOL_MATH = 12, SYMBOL_ARGS = 13, SYMBOL_VERTICAL = 14, 
               LETTERS = 15, DIGIT = 16, COMMAND = 17;

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
			'T__0', 'T__1', 'T__2', 'T__3', 'T__4', 'T__5', 'T__6', 'T__7', 'T__8', 
			'PLAIN_TEXT', 'LETTER', 'HAN', 'BRACKET', 'SYMBOL_MATH', 'SYMBOL_ARGS', 
			'SYMBOL_VERTICAL', 'LETTERS', 'DIGIT', 'COMMAND'
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
			[4, 0, 17, 114, 6, -1, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 
		    2, 4, 7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 
		    7, 9, 2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 
		    7, 14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 1, 
		    0, 1, 0, 1, 1, 1, 1, 1, 2, 1, 2, 1, 3, 1, 3, 1, 4, 1, 4, 1, 4, 1, 
		    4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 1, 5, 1, 
		    5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 
		    6, 1, 6, 1, 7, 1, 7, 1, 8, 1, 8, 1, 8, 1, 9, 1, 9, 1, 9, 1, 9, 4, 
		    9, 84, 8, 9, 11, 9, 12, 9, 85, 1, 10, 1, 10, 1, 11, 1, 11, 1, 12, 
		    1, 12, 1, 13, 1, 13, 4, 13, 96, 8, 13, 11, 13, 12, 13, 97, 1, 14, 
		    1, 14, 1, 14, 1, 15, 1, 15, 1, 16, 4, 16, 106, 8, 16, 11, 16, 12, 
		    16, 107, 1, 17, 1, 17, 1, 18, 1, 18, 1, 18, 0, 0, 19, 1, 1, 3, 2, 
		    5, 3, 7, 4, 9, 5, 11, 6, 13, 7, 15, 8, 17, 9, 19, 10, 21, 0, 23, 0, 
		    25, 11, 27, 12, 29, 13, 31, 14, 33, 15, 35, 16, 37, 17, 1, 0, 7, 7, 
		    0, 9, 9, 32, 34, 39, 47, 58, 64, 96, 96, 124, 124, 126, 126, 2, 0, 
		    65, 90, 97, 122, 20, 0, 11904, 11929, 11931, 12019, 12032, 12245, 
		    12293, 12293, 12295, 12295, 12321, 12329, 12344, 12347, 13312, 19903, 
		    19968, 40959, 63744, 64109, 64112, 64217, 94178, 94179, 94192, 94193, 
		    131072, 173791, 173824, 177976, 177984, 178205, 178208, 183969, 183984, 
		    191456, 194560, 195101, 196608, 201546, 2, 0, 91, 91, 93, 93, 3, 0, 
		    94, 95, 123, 123, 125, 125, 2, 0, 10, 10, 13, 13, 1, 0, 48, 57, 118, 
		    0, 1, 1, 0, 0, 0, 0, 3, 1, 0, 0, 0, 0, 5, 1, 0, 0, 0, 0, 7, 1, 0, 
		    0, 0, 0, 9, 1, 0, 0, 0, 0, 11, 1, 0, 0, 0, 0, 13, 1, 0, 0, 0, 0, 15, 
		    1, 0, 0, 0, 0, 17, 1, 0, 0, 0, 0, 19, 1, 0, 0, 0, 0, 25, 1, 0, 0, 
		    0, 0, 27, 1, 0, 0, 0, 0, 29, 1, 0, 0, 0, 0, 31, 1, 0, 0, 0, 0, 33, 
		    1, 0, 0, 0, 0, 35, 1, 0, 0, 0, 0, 37, 1, 0, 0, 0, 1, 39, 1, 0, 0, 
		    0, 3, 41, 1, 0, 0, 0, 5, 43, 1, 0, 0, 0, 7, 45, 1, 0, 0, 0, 9, 47, 
		    1, 0, 0, 0, 11, 60, 1, 0, 0, 0, 13, 68, 1, 0, 0, 0, 15, 74, 1, 0, 
		    0, 0, 17, 76, 1, 0, 0, 0, 19, 83, 1, 0, 0, 0, 21, 87, 1, 0, 0, 0, 
		    23, 89, 1, 0, 0, 0, 25, 91, 1, 0, 0, 0, 27, 95, 1, 0, 0, 0, 29, 99, 
		    1, 0, 0, 0, 31, 102, 1, 0, 0, 0, 33, 105, 1, 0, 0, 0, 35, 109, 1, 
		    0, 0, 0, 37, 111, 1, 0, 0, 0, 39, 40, 5, 91, 0, 0, 40, 2, 1, 0, 0, 
		    0, 41, 42, 5, 93, 0, 0, 42, 4, 1, 0, 0, 0, 43, 44, 5, 123, 0, 0, 44, 
		    6, 1, 0, 0, 0, 45, 46, 5, 125, 0, 0, 46, 8, 1, 0, 0, 0, 47, 48, 5, 
		    92, 0, 0, 48, 49, 5, 110, 0, 0, 49, 50, 5, 101, 0, 0, 50, 51, 5, 119, 
		    0, 0, 51, 52, 5, 99, 0, 0, 52, 53, 5, 111, 0, 0, 53, 54, 5, 109, 0, 
		    0, 54, 55, 5, 109, 0, 0, 55, 56, 5, 97, 0, 0, 56, 57, 5, 110, 0, 0, 
		    57, 58, 5, 100, 0, 0, 58, 59, 5, 123, 0, 0, 59, 10, 1, 0, 0, 0, 60, 
		    61, 5, 92, 0, 0, 61, 62, 5, 98, 0, 0, 62, 63, 5, 101, 0, 0, 63, 64, 
		    5, 103, 0, 0, 64, 65, 5, 105, 0, 0, 65, 66, 5, 110, 0, 0, 66, 67, 
		    5, 123, 0, 0, 67, 12, 1, 0, 0, 0, 68, 69, 5, 92, 0, 0, 69, 70, 5, 
		    101, 0, 0, 70, 71, 5, 110, 0, 0, 71, 72, 5, 100, 0, 0, 72, 73, 5, 
		    123, 0, 0, 73, 14, 1, 0, 0, 0, 74, 75, 5, 36, 0, 0, 75, 16, 1, 0, 
		    0, 0, 76, 77, 5, 36, 0, 0, 77, 78, 5, 36, 0, 0, 78, 18, 1, 0, 0, 0, 
		    79, 84, 3, 23, 11, 0, 80, 84, 3, 21, 10, 0, 81, 84, 3, 35, 17, 0, 
		    82, 84, 7, 0, 0, 0, 83, 79, 1, 0, 0, 0, 83, 80, 1, 0, 0, 0, 83, 81, 
		    1, 0, 0, 0, 83, 82, 1, 0, 0, 0, 84, 85, 1, 0, 0, 0, 85, 83, 1, 0, 
		    0, 0, 85, 86, 1, 0, 0, 0, 86, 20, 1, 0, 0, 0, 87, 88, 7, 1, 0, 0, 
		    88, 22, 1, 0, 0, 0, 89, 90, 7, 2, 0, 0, 90, 24, 1, 0, 0, 0, 91, 92, 
		    7, 3, 0, 0, 92, 26, 1, 0, 0, 0, 93, 96, 7, 4, 0, 0, 94, 96, 3, 25, 
		    12, 0, 95, 93, 1, 0, 0, 0, 95, 94, 1, 0, 0, 0, 96, 97, 1, 0, 0, 0, 
		    97, 95, 1, 0, 0, 0, 97, 98, 1, 0, 0, 0, 98, 28, 1, 0, 0, 0, 99, 100, 
		    5, 35, 0, 0, 100, 101, 3, 35, 17, 0, 101, 30, 1, 0, 0, 0, 102, 103, 
		    7, 5, 0, 0, 103, 32, 1, 0, 0, 0, 104, 106, 3, 21, 10, 0, 105, 104, 
		    1, 0, 0, 0, 106, 107, 1, 0, 0, 0, 107, 105, 1, 0, 0, 0, 107, 108, 
		    1, 0, 0, 0, 108, 34, 1, 0, 0, 0, 109, 110, 7, 6, 0, 0, 110, 36, 1, 
		    0, 0, 0, 111, 112, 5, 92, 0, 0, 112, 113, 3, 33, 16, 0, 113, 38, 1, 
		    0, 0, 0, 6, 0, 83, 85, 95, 97, 107, 0];
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