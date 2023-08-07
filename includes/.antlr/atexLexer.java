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
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, LETTERS=7, COMMAND=8, 
		PLAIN_TEXT=9, WS=10;
	public static String[] channelNames = {
		"DEFAULT_TOKEN_CHANNEL", "HIDDEN"
	};

	public static String[] modeNames = {
		"DEFAULT_MODE"
	};

	private static String[] makeRuleNames() {
		return new String[] {
			"T__0", "T__1", "T__2", "T__3", "T__4", "T__5", "LETTERS", "COMMAND", 
			"HAN", "ASCII", "PLAIN_TEXT", "WS"
		};
	}
	public static final String[] ruleNames = makeRuleNames();

	private static String[] makeLiteralNames() {
		return new String[] {
			null, "'['", "']'", "'{'", "'}'", "'\\begin{'", "'\\end{'"
		};
	}
	private static final String[] _LITERAL_NAMES = makeLiteralNames();
	private static String[] makeSymbolicNames() {
		return new String[] {
			null, null, null, null, null, null, null, "LETTERS", "COMMAND", "PLAIN_TEXT", 
			"WS"
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
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\2\fG\b\1\4\2\t\2\4"+
		"\3\t\3\4\4\t\4\4\5\t\5\4\6\t\6\4\7\t\7\4\b\t\b\4\t\t\t\4\n\t\n\4\13\t"+
		"\13\4\f\t\f\4\r\t\r\3\2\3\2\3\3\3\3\3\4\3\4\3\5\3\5\3\6\3\6\3\6\3\6\3"+
		"\6\3\6\3\6\3\6\3\7\3\7\3\7\3\7\3\7\3\7\3\b\6\b\63\n\b\r\b\16\b\64\3\t"+
		"\3\t\3\t\3\n\3\n\3\13\3\13\3\f\3\f\6\f@\n\f\r\f\16\fA\3\r\3\r\3\r\3\r"+
		"\2\2\16\3\3\5\4\7\5\t\6\13\7\r\b\17\t\21\n\23\2\25\2\27\13\31\f\3\2\5"+
		"\4\2C\\c|\3\2\"\u0080\f\2\13\17\"\"\u0087\u0087\u00a2\u00a2\u1682\u1682"+
		"\u2002\u200c\u202a\u202b\u2031\u2031\u2061\u2061\u3002\u3002\3\23\2\u2e82"+
		"\2\u2e9b\2\u2e9d\2\u2ef5\2\u2f02\2\u2fd7\2\u3007\2\u3007\2\u3009\2\u3009"+
		"\2\u3023\2\u302b\2\u303a\2\u303d\2\u3402\2\u4db7\2\u4e02\2\u9fec\2\uf902"+
		"\2\ufa6f\2\ufa72\2\ufadb\2\2\4\ua6d8\4\ua702\4\ub736\4\ub742\4\ub81f\4"+
		"\ub822\4\ucea3\4\uceb2\4\uebe2\4\uf802\4\ufa1f\4G\2\3\3\2\2\2\2\5\3\2"+
		"\2\2\2\7\3\2\2\2\2\t\3\2\2\2\2\13\3\2\2\2\2\r\3\2\2\2\2\17\3\2\2\2\2\21"+
		"\3\2\2\2\2\27\3\2\2\2\2\31\3\2\2\2\3\33\3\2\2\2\5\35\3\2\2\2\7\37\3\2"+
		"\2\2\t!\3\2\2\2\13#\3\2\2\2\r+\3\2\2\2\17\62\3\2\2\2\21\66\3\2\2\2\23"+
		"9\3\2\2\2\25;\3\2\2\2\27?\3\2\2\2\31C\3\2\2\2\33\34\7]\2\2\34\4\3\2\2"+
		"\2\35\36\7_\2\2\36\6\3\2\2\2\37 \7}\2\2 \b\3\2\2\2!\"\7\177\2\2\"\n\3"+
		"\2\2\2#$\7^\2\2$%\7d\2\2%&\7g\2\2&\'\7i\2\2\'(\7k\2\2()\7p\2\2)*\7}\2"+
		"\2*\f\3\2\2\2+,\7^\2\2,-\7g\2\2-.\7p\2\2./\7f\2\2/\60\7}\2\2\60\16\3\2"+
		"\2\2\61\63\t\2\2\2\62\61\3\2\2\2\63\64\3\2\2\2\64\62\3\2\2\2\64\65\3\2"+
		"\2\2\65\20\3\2\2\2\66\67\7^\2\2\678\5\17\b\28\22\3\2\2\29:\t\5\2\2:\24"+
		"\3\2\2\2;<\t\3\2\2<\26\3\2\2\2=@\5\23\n\2>@\5\25\13\2?=\3\2\2\2?>\3\2"+
		"\2\2@A\3\2\2\2A?\3\2\2\2AB\3\2\2\2B\30\3\2\2\2CD\t\4\2\2DE\3\2\2\2EF\b"+
		"\r\2\2F\32\3\2\2\2\6\2\64?A\3\b\2\2";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}