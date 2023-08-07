// Generated from /Users/huzhilin/Projet/GIT/Wikipedia-Aki/includes/atex.g4 by ANTLR 4.9.2
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
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, LETTERS=9, 
		COMMAND=10, PLAIN_TEXT=11, WS=12;
	public static String[] channelNames = {
		"DEFAULT_TOKEN_CHANNEL", "HIDDEN"
	};

	public static String[] modeNames = {
		"DEFAULT_MODE"
	};

	private static String[] makeRuleNames() {
		return new String[] {
			"T__0", "T__1", "T__2", "T__3", "T__4", "T__5", "T__6", "T__7", "LETTERS", 
			"COMMAND", "HAN", "ASCII", "PLAIN_TEXT", "WS"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'['", "']'", "'{'", "'}'", "'\\begin{'", "'\\end{'", "'$'", "'$$'"
		};
	}
	private static final String[] _LITERAL_NAMES = makeLiteralNames();
	private static String[] makeSymbolicNames() {
		return new String[] {
			null, null, null, null, null, null, null, null, null, "LETTERS", "COMMAND", 
			"PLAIN_TEXT", "WS"
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
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\2\16P\b\1\4\2\t\2\4"+
		"\3\t\3\4\4\t\4\4\5\t\5\4\6\t\6\4\7\t\7\4\b\t\b\4\t\t\t\4\n\t\n\4\13\t"+
		"\13\4\f\t\f\4\r\t\r\4\16\t\16\4\17\t\17\3\2\3\2\3\3\3\3\3\4\3\4\3\5\3"+
		"\5\3\6\3\6\3\6\3\6\3\6\3\6\3\6\3\6\3\7\3\7\3\7\3\7\3\7\3\7\3\b\3\b\3\t"+
		"\3\t\3\t\3\n\6\n<\n\n\r\n\16\n=\3\13\3\13\3\13\3\f\3\f\3\r\3\r\3\16\3"+
		"\16\6\16I\n\16\r\16\16\16J\3\17\3\17\3\17\3\17\2\2\20\3\3\5\4\7\5\t\6"+
		"\13\7\r\b\17\t\21\n\23\13\25\f\27\2\31\2\33\r\35\16\3\2\5\4\2C\\c|\5\2"+
		"#%\']_\u0080\f\2\13\17\"\"\u0087\u0087\u00a2\u00a2\u1682\u1682\u2002\u200c"+
		"\u202a\u202b\u2031\u2031\u2061\u2061\u3002\u3002\3\23\2\u2e82\2\u2e9b"+
		"\2\u2e9d\2\u2ef5\2\u2f02\2\u2fd7\2\u3007\2\u3007\2\u3009\2\u3009\2\u3023"+
		"\2\u302b\2\u303a\2\u303d\2\u3402\2\u4db7\2\u4e02\2\u9fec\2\uf902\2\ufa6f"+
		"\2\ufa72\2\ufadb\2\2\4\ua6d8\4\ua702\4\ub736\4\ub742\4\ub81f\4\ub822\4"+
		"\ucea3\4\uceb2\4\uebe2\4\uf802\4\ufa1f\4P\2\3\3\2\2\2\2\5\3\2\2\2\2\7"+
		"\3\2\2\2\2\t\3\2\2\2\2\13\3\2\2\2\2\r\3\2\2\2\2\17\3\2\2\2\2\21\3\2\2"+
		"\2\2\23\3\2\2\2\2\25\3\2\2\2\2\33\3\2\2\2\2\35\3\2\2\2\3\37\3\2\2\2\5"+
		"!\3\2\2\2\7#\3\2\2\2\t%\3\2\2\2\13\'\3\2\2\2\r/\3\2\2\2\17\65\3\2\2\2"+
		"\21\67\3\2\2\2\23;\3\2\2\2\25?\3\2\2\2\27B\3\2\2\2\31D\3\2\2\2\33H\3\2"+
		"\2\2\35L\3\2\2\2\37 \7]\2\2 \4\3\2\2\2!\"\7_\2\2\"\6\3\2\2\2#$\7}\2\2"+
		"$\b\3\2\2\2%&\7\177\2\2&\n\3\2\2\2\'(\7^\2\2()\7d\2\2)*\7g\2\2*+\7i\2"+
		"\2+,\7k\2\2,-\7p\2\2-.\7}\2\2.\f\3\2\2\2/\60\7^\2\2\60\61\7g\2\2\61\62"+
		"\7p\2\2\62\63\7f\2\2\63\64\7}\2\2\64\16\3\2\2\2\65\66\7&\2\2\66\20\3\2"+
		"\2\2\678\7&\2\289\7&\2\29\22\3\2\2\2:<\t\2\2\2;:\3\2\2\2<=\3\2\2\2=;\3"+
		"\2\2\2=>\3\2\2\2>\24\3\2\2\2?@\7^\2\2@A\5\23\n\2A\26\3\2\2\2BC\t\5\2\2"+
		"C\30\3\2\2\2DE\t\3\2\2E\32\3\2\2\2FI\5\27\f\2GI\5\31\r\2HF\3\2\2\2HG\3"+
		"\2\2\2IJ\3\2\2\2JH\3\2\2\2JK\3\2\2\2K\34\3\2\2\2LM\t\4\2\2MN\3\2\2\2N"+
		"O\b\17\2\2O\36\3\2\2\2\6\2=HJ\3\b\2\2";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}