// Generated from /Users/huzhilin/Projet/GIT/Wikipedia-Aki/includes/atex2wiki/atex.g4 by ANTLR 4.9.2
import org.antlr.v4.runtime.Lexer;
import org.antlr.v4.runtime.CharStream;
import org.antlr.v4.runtime.Token;
import org.antlr.v4.runtime.TokenStream;
import org.antlr.v4.runtime.*;
import org.antlr.v4.runtime.atn.*;
import org.antlr.v4.runtime.dfa.DFA;
import org.antlr.v4.runtime.misc.*;

@SuppressWarnings({"all", "warnings", "unchecked", "unused", "cast"})
public class atexLexer extends Lexer {
	static { RuntimeMetaData.checkVersion("4.9.2", RuntimeMetaData.VERSION); }

	protected static final DFA[] _decisionToDFA;
	protected static final PredictionContextCache _sharedContextCache =
		new PredictionContextCache();
	public static final int
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, T__8=9, 
		PLAIN_TEXT=10, BRACKET=11, SYMBOL_MATH=12, SYMBOL_ARGS=13, SYMBOL_VERTICAL=14, 
		LETTERS=15, DIGIT=16, COMMAND=17;
	public static String[] channelNames = {
		"DEFAULT_TOKEN_CHANNEL", "HIDDEN"
	};

	public static String[] modeNames = {
		"DEFAULT_MODE"
	};

	private static String[] makeRuleNames() {
		return new String[] {
			"T__0", "T__1", "T__2", "T__3", "T__4", "T__5", "T__6", "T__7", "T__8", 
			"PLAIN_TEXT", "LETTER", "HAN", "BRACKET", "SYMBOL_MATH", "SYMBOL_ARGS", 
			"SYMBOL_VERTICAL", "LETTERS", "DIGIT", "COMMAND"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'['", "']'", "'{'", "'}'", "'\\newcommand{'", "'\\begin{'", "'\\end{'", 
			"'$'", "'$$'"
		};
	}
	private static final String[] _LITERAL_NAMES = makeLiteralNames();
	private static String[] makeSymbolicNames() {
		return new String[] {
			null, null, null, null, null, null, null, null, null, null, "PLAIN_TEXT", 
			"BRACKET", "SYMBOL_MATH", "SYMBOL_ARGS", "SYMBOL_VERTICAL", "LETTERS", 
			"DIGIT", "COMMAND"
		};
	}
	private static final String[] _SYMBOLIC_NAMES = makeSymbolicNames();
	public static final Vocabulary VOCABULARY = new VocabularyImpl(_LITERAL_NAMES, _SYMBOLIC_NAMES);

	/**
	 * @deprecated Use {@link #VOCABULARY} instead.
	 */
	@Deprecated
	public static final String[] tokenNames;
	static {
		tokenNames = new String[_SYMBOLIC_NAMES.length];
		for (int i = 0; i < tokenNames.length; i++) {
			tokenNames[i] = VOCABULARY.getLiteralName(i);
			if (tokenNames[i] == null) {
				tokenNames[i] = VOCABULARY.getSymbolicName(i);
			}

			if (tokenNames[i] == null) {
				tokenNames[i] = "<INVALID>";
			}
		}
	}

	@Override
	@Deprecated
	public String[] getTokenNames() {
		return tokenNames;
	}

	@Override

	public Vocabulary getVocabulary() {
		return VOCABULARY;
	}


	public atexLexer(CharStream input) {
		super(input);
		_interp = new LexerATNSimulator(this,_ATN,_decisionToDFA,_sharedContextCache);
	}

	@Override
	public String getGrammarFileName() { return "atex.g4"; }

	@Override
	public String[] getRuleNames() { return ruleNames; }

	@Override
	public String getSerializedATN() { return _serializedATN; }

	@Override
	public String[] getChannelNames() { return channelNames; }

	@Override
	public String[] getModeNames() { return modeNames; }

	@Override
	public ATN getATN() { return _ATN; }

	public static final String _serializedATN =
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\2\23t\b\1\4\2\t\2\4"+
		"\3\t\3\4\4\t\4\4\5\t\5\4\6\t\6\4\7\t\7\4\b\t\b\4\t\t\t\4\n\t\n\4\13\t"+
		"\13\4\f\t\f\4\r\t\r\4\16\t\16\4\17\t\17\4\20\t\20\4\21\t\21\4\22\t\22"+
		"\4\23\t\23\4\24\t\24\3\2\3\2\3\3\3\3\3\4\3\4\3\5\3\5\3\6\3\6\3\6\3\6\3"+
		"\6\3\6\3\6\3\6\3\6\3\6\3\6\3\6\3\6\3\7\3\7\3\7\3\7\3\7\3\7\3\7\3\7\3\b"+
		"\3\b\3\b\3\b\3\b\3\b\3\t\3\t\3\n\3\n\3\n\3\13\3\13\3\13\3\13\6\13V\n\13"+
		"\r\13\16\13W\3\f\3\f\3\r\3\r\3\16\3\16\3\17\3\17\6\17b\n\17\r\17\16\17"+
		"c\3\20\3\20\3\20\3\21\3\21\3\22\6\22l\n\22\r\22\16\22m\3\23\3\23\3\24"+
		"\3\24\3\24\2\2\25\3\3\5\4\7\5\t\6\13\7\r\b\17\t\21\n\23\13\25\f\27\2\31"+
		"\2\33\r\35\16\37\17!\20#\21%\22\'\23\3\2\b\t\2\13\13\"$)\61<Bbb~~\u0080"+
		"\u0080\4\2C\\c|\4\2]]__\5\2`a}}\177\177\4\2\f\f\17\17\3\2\62;\3\23\2\u2e82"+
		"\2\u2e9b\2\u2e9d\2\u2ef5\2\u2f02\2\u2fd7\2\u3007\2\u3007\2\u3009\2\u3009"+
		"\2\u3023\2\u302b\2\u303a\2\u303d\2\u3402\2\u4db7\2\u4e02\2\u9fec\2\uf902"+
		"\2\ufa6f\2\ufa72\2\ufadb\2\2\4\ua6d8\4\ua702\4\ub736\4\ub742\4\ub81f\4"+
		"\ub822\4\ucea3\4\uceb2\4\uebe2\4\uf802\4\ufa1f\4x\2\3\3\2\2\2\2\5\3\2"+
		"\2\2\2\7\3\2\2\2\2\t\3\2\2\2\2\13\3\2\2\2\2\r\3\2\2\2\2\17\3\2\2\2\2\21"+
		"\3\2\2\2\2\23\3\2\2\2\2\25\3\2\2\2\2\33\3\2\2\2\2\35\3\2\2\2\2\37\3\2"+
		"\2\2\2!\3\2\2\2\2#\3\2\2\2\2%\3\2\2\2\2\'\3\2\2\2\3)\3\2\2\2\5+\3\2\2"+
		"\2\7-\3\2\2\2\t/\3\2\2\2\13\61\3\2\2\2\r>\3\2\2\2\17F\3\2\2\2\21L\3\2"+
		"\2\2\23N\3\2\2\2\25U\3\2\2\2\27Y\3\2\2\2\31[\3\2\2\2\33]\3\2\2\2\35a\3"+
		"\2\2\2\37e\3\2\2\2!h\3\2\2\2#k\3\2\2\2%o\3\2\2\2\'q\3\2\2\2)*\7]\2\2*"+
		"\4\3\2\2\2+,\7_\2\2,\6\3\2\2\2-.\7}\2\2.\b\3\2\2\2/\60\7\177\2\2\60\n"+
		"\3\2\2\2\61\62\7^\2\2\62\63\7p\2\2\63\64\7g\2\2\64\65\7y\2\2\65\66\7e"+
		"\2\2\66\67\7q\2\2\678\7o\2\289\7o\2\29:\7c\2\2:;\7p\2\2;<\7f\2\2<=\7}"+
		"\2\2=\f\3\2\2\2>?\7^\2\2?@\7d\2\2@A\7g\2\2AB\7i\2\2BC\7k\2\2CD\7p\2\2"+
		"DE\7}\2\2E\16\3\2\2\2FG\7^\2\2GH\7g\2\2HI\7p\2\2IJ\7f\2\2JK\7}\2\2K\20"+
		"\3\2\2\2LM\7&\2\2M\22\3\2\2\2NO\7&\2\2OP\7&\2\2P\24\3\2\2\2QV\5\31\r\2"+
		"RV\5\27\f\2SV\5%\23\2TV\t\2\2\2UQ\3\2\2\2UR\3\2\2\2US\3\2\2\2UT\3\2\2"+
		"\2VW\3\2\2\2WU\3\2\2\2WX\3\2\2\2X\26\3\2\2\2YZ\t\3\2\2Z\30\3\2\2\2[\\"+
		"\t\b\2\2\\\32\3\2\2\2]^\t\4\2\2^\34\3\2\2\2_b\t\5\2\2`b\5\33\16\2a_\3"+
		"\2\2\2a`\3\2\2\2bc\3\2\2\2ca\3\2\2\2cd\3\2\2\2d\36\3\2\2\2ef\7%\2\2fg"+
		"\5%\23\2g \3\2\2\2hi\t\6\2\2i\"\3\2\2\2jl\5\27\f\2kj\3\2\2\2lm\3\2\2\2"+
		"mk\3\2\2\2mn\3\2\2\2n$\3\2\2\2op\t\7\2\2p&\3\2\2\2qr\7^\2\2rs\5#\22\2"+
		"s(\3\2\2\2\b\2UWacm\2";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}