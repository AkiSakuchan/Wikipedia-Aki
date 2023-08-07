// Generated from /Users/huzhilin/Projet/GIT/Wikipedia-Aki/includes/atex.g4 by ANTLR 4.9.2
import org.antlr.v4.runtime.atn.*;
import org.antlr.v4.runtime.dfa.DFA;
import org.antlr.v4.runtime.*;
import org.antlr.v4.runtime.misc.*;
import org.antlr.v4.runtime.tree.*;
import java.util.List;
import java.util.Iterator;
import java.util.ArrayList;

@SuppressWarnings({"all", "warnings", "unchecked", "unused", "cast"})
public class atexParser extends Parser {
	static { RuntimeMetaData.checkVersion("4.9.2", RuntimeMetaData.VERSION); }

	protected static final DFA[] _decisionToDFA;
	protected static final PredictionContextCache _sharedContextCache =
		new PredictionContextCache();
	public static final int
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, LETTERS=7, COMMAND=8, 
		PLAIN_TEXT=9, WS=10;
	public static final int
		RULE_start = 0, RULE_command = 1, RULE_real_args = 2, RULE_environment = 3, 
		RULE_env_body = 4;
	private static String[] makeRuleNames() {
		return new String[] {
			"start", "command", "real_args", "environment", "env_body"
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

	@Override
	public String getGrammarFileName() { return "atex.g4"; }

	@Override
	public String[] getRuleNames() { return ruleNames; }

	@Override
	public String getSerializedATN() { return _serializedATN; }

	@Override
	public ATN getATN() { return _ATN; }

	public atexParser(TokenStream input) {
		super(input);
		_interp = new ParserATNSimulator(this,_ATN,_decisionToDFA,_sharedContextCache);
	}

	public static class StartContext extends ParserRuleContext {
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public CommandContext command() {
			return getRuleContext(CommandContext.class,0);
		}
		public EnvironmentContext environment() {
			return getRuleContext(EnvironmentContext.class,0);
		}
		public StartContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_start; }
	}

	public final StartContext start() throws RecognitionException {
		StartContext _localctx = new StartContext(_ctx, getState());
		enterRule(_localctx, 0, RULE_start);
		try {
			setState(13);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(10);
				match(PLAIN_TEXT);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 2);
				{
				setState(11);
				command();
				}
				break;
			case T__4:
				enterOuterAlt(_localctx, 3);
				{
				setState(12);
				environment();
				}
				break;
			default:
				throw new NoViableAltException(this);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public static class CommandContext extends ParserRuleContext {
		public TerminalNode COMMAND() { return getToken(atexParser.COMMAND, 0); }
		public List<Real_argsContext> real_args() {
			return getRuleContexts(Real_argsContext.class);
		}
		public Real_argsContext real_args(int i) {
			return getRuleContext(Real_argsContext.class,i);
		}
		public CommandContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_command; }
	}

	public final CommandContext command() throws RecognitionException {
		CommandContext _localctx = new CommandContext(_ctx, getState());
		enterRule(_localctx, 2, RULE_command);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(15);
			match(COMMAND);
			setState(20);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(16);
				match(T__0);
				setState(17);
				real_args();
				setState(18);
				match(T__1);
				}
			}

			setState(28);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(22);
				match(T__2);
				setState(23);
				real_args();
				setState(24);
				match(T__3);
				}
				}
				setState(30);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public static class Real_argsContext extends ParserRuleContext {
		public List<TerminalNode> PLAIN_TEXT() { return getTokens(atexParser.PLAIN_TEXT); }
		public TerminalNode PLAIN_TEXT(int i) {
			return getToken(atexParser.PLAIN_TEXT, i);
		}
		public List<CommandContext> command() {
			return getRuleContexts(CommandContext.class);
		}
		public CommandContext command(int i) {
			return getRuleContext(CommandContext.class,i);
		}
		public Real_argsContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_real_args; }
	}

	public final Real_argsContext real_args() throws RecognitionException {
		Real_argsContext _localctx = new Real_argsContext(_ctx, getState());
		enterRule(_localctx, 4, RULE_real_args);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(35);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMAND || _la==PLAIN_TEXT) {
				{
				setState(33);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case PLAIN_TEXT:
					{
					setState(31);
					match(PLAIN_TEXT);
					}
					break;
				case COMMAND:
					{
					setState(32);
					command();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(37);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public static class EnvironmentContext extends ParserRuleContext {
		public List<TerminalNode> LETTERS() { return getTokens(atexParser.LETTERS); }
		public TerminalNode LETTERS(int i) {
			return getToken(atexParser.LETTERS, i);
		}
		public Env_bodyContext env_body() {
			return getRuleContext(Env_bodyContext.class,0);
		}
		public List<Real_argsContext> real_args() {
			return getRuleContexts(Real_argsContext.class);
		}
		public Real_argsContext real_args(int i) {
			return getRuleContext(Real_argsContext.class,i);
		}
		public EnvironmentContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_environment; }
	}

	public final EnvironmentContext environment() throws RecognitionException {
		EnvironmentContext _localctx = new EnvironmentContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_environment);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(38);
			match(T__4);
			setState(39);
			match(LETTERS);
			setState(40);
			match(T__3);
			setState(45);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(41);
				match(T__0);
				setState(42);
				real_args();
				setState(43);
				match(T__1);
				}
			}

			setState(53);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(47);
				match(T__2);
				setState(48);
				real_args();
				setState(49);
				match(T__3);
				}
				}
				setState(55);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(56);
			env_body();
			setState(57);
			match(T__5);
			setState(58);
			match(LETTERS);
			setState(59);
			match(T__3);
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public static class Env_bodyContext extends ParserRuleContext {
		public List<TerminalNode> PLAIN_TEXT() { return getTokens(atexParser.PLAIN_TEXT); }
		public TerminalNode PLAIN_TEXT(int i) {
			return getToken(atexParser.PLAIN_TEXT, i);
		}
		public List<CommandContext> command() {
			return getRuleContexts(CommandContext.class);
		}
		public CommandContext command(int i) {
			return getRuleContext(CommandContext.class,i);
		}
		public List<EnvironmentContext> environment() {
			return getRuleContexts(EnvironmentContext.class);
		}
		public EnvironmentContext environment(int i) {
			return getRuleContext(EnvironmentContext.class,i);
		}
		public Env_bodyContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_env_body; }
	}

	public final Env_bodyContext env_body() throws RecognitionException {
		Env_bodyContext _localctx = new Env_bodyContext(_ctx, getState());
		enterRule(_localctx, 8, RULE_env_body);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(66);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__4) | (1L << COMMAND) | (1L << PLAIN_TEXT))) != 0)) {
				{
				setState(64);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case PLAIN_TEXT:
					{
					setState(61);
					match(PLAIN_TEXT);
					}
					break;
				case COMMAND:
					{
					setState(62);
					command();
					}
					break;
				case T__4:
					{
					setState(63);
					environment();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(68);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			}
		}
		catch (RecognitionException re) {
			_localctx.exception = re;
			_errHandler.reportError(this, re);
			_errHandler.recover(this, re);
		}
		finally {
			exitRule();
		}
		return _localctx;
	}

	public static final String _serializedATN =
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\3\fH\4\2\t\2\4\3\t"+
		"\3\4\4\t\4\4\5\t\5\4\6\t\6\3\2\3\2\3\2\5\2\20\n\2\3\3\3\3\3\3\3\3\3\3"+
		"\5\3\27\n\3\3\3\3\3\3\3\3\3\7\3\35\n\3\f\3\16\3 \13\3\3\4\3\4\7\4$\n\4"+
		"\f\4\16\4\'\13\4\3\5\3\5\3\5\3\5\3\5\3\5\3\5\5\5\60\n\5\3\5\3\5\3\5\3"+
		"\5\7\5\66\n\5\f\5\16\59\13\5\3\5\3\5\3\5\3\5\3\5\3\6\3\6\3\6\7\6C\n\6"+
		"\f\6\16\6F\13\6\3\6\2\2\7\2\4\6\b\n\2\2\2M\2\17\3\2\2\2\4\21\3\2\2\2\6"+
		"%\3\2\2\2\b(\3\2\2\2\nD\3\2\2\2\f\20\7\13\2\2\r\20\5\4\3\2\16\20\5\b\5"+
		"\2\17\f\3\2\2\2\17\r\3\2\2\2\17\16\3\2\2\2\20\3\3\2\2\2\21\26\7\n\2\2"+
		"\22\23\7\3\2\2\23\24\5\6\4\2\24\25\7\4\2\2\25\27\3\2\2\2\26\22\3\2\2\2"+
		"\26\27\3\2\2\2\27\36\3\2\2\2\30\31\7\5\2\2\31\32\5\6\4\2\32\33\7\6\2\2"+
		"\33\35\3\2\2\2\34\30\3\2\2\2\35 \3\2\2\2\36\34\3\2\2\2\36\37\3\2\2\2\37"+
		"\5\3\2\2\2 \36\3\2\2\2!$\7\13\2\2\"$\5\4\3\2#!\3\2\2\2#\"\3\2\2\2$\'\3"+
		"\2\2\2%#\3\2\2\2%&\3\2\2\2&\7\3\2\2\2\'%\3\2\2\2()\7\7\2\2)*\7\t\2\2*"+
		"/\7\6\2\2+,\7\3\2\2,-\5\6\4\2-.\7\4\2\2.\60\3\2\2\2/+\3\2\2\2/\60\3\2"+
		"\2\2\60\67\3\2\2\2\61\62\7\5\2\2\62\63\5\6\4\2\63\64\7\6\2\2\64\66\3\2"+
		"\2\2\65\61\3\2\2\2\669\3\2\2\2\67\65\3\2\2\2\678\3\2\2\28:\3\2\2\29\67"+
		"\3\2\2\2:;\5\n\6\2;<\7\b\2\2<=\7\t\2\2=>\7\6\2\2>\t\3\2\2\2?C\7\13\2\2"+
		"@C\5\4\3\2AC\5\b\5\2B?\3\2\2\2B@\3\2\2\2BA\3\2\2\2CF\3\2\2\2DB\3\2\2\2"+
		"DE\3\2\2\2E\13\3\2\2\2FD\3\2\2\2\13\17\26\36#%/\67BD";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}