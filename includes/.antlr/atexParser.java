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
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, LETTERS=9, 
		COMMAND=10, PLAIN_TEXT=11, WS=12;
	public static final int
		RULE_start = 0, RULE_command = 1, RULE_real_args = 2, RULE_environment = 3, 
		RULE_env_body = 4, RULE_math_inline = 5, RULE_math_display = 6, RULE_in_math = 7;
	private static String[] makeRuleNames() {
		return new String[] {
			"start", "command", "real_args", "environment", "env_body", "math_inline", 
			"math_display", "in_math"
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
		public Math_inlineContext math_inline() {
			return getRuleContext(Math_inlineContext.class,0);
		}
		public Math_displayContext math_display() {
			return getRuleContext(Math_displayContext.class,0);
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
			setState(21);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(16);
				match(PLAIN_TEXT);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 2);
				{
				setState(17);
				command();
				}
				break;
			case T__4:
				enterOuterAlt(_localctx, 3);
				{
				setState(18);
				environment();
				}
				break;
			case T__6:
				enterOuterAlt(_localctx, 4);
				{
				setState(19);
				math_inline();
				}
				break;
			case T__7:
				enterOuterAlt(_localctx, 5);
				{
				setState(20);
				math_display();
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
			setState(23);
			match(COMMAND);
			setState(28);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(24);
				match(T__0);
				setState(25);
				real_args();
				setState(26);
				match(T__1);
				}
			}

			setState(36);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(30);
				match(T__2);
				setState(31);
				real_args();
				setState(32);
				match(T__3);
				}
				}
				setState(38);
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
			setState(43);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==COMMAND || _la==PLAIN_TEXT) {
				{
				setState(41);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case PLAIN_TEXT:
					{
					setState(39);
					match(PLAIN_TEXT);
					}
					break;
				case COMMAND:
					{
					setState(40);
					command();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(45);
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
			setState(46);
			match(T__4);
			setState(47);
			match(LETTERS);
			setState(48);
			match(T__3);
			setState(53);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(49);
				match(T__0);
				setState(50);
				real_args();
				setState(51);
				match(T__1);
				}
			}

			setState(61);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(55);
				match(T__2);
				setState(56);
				real_args();
				setState(57);
				match(T__3);
				}
				}
				setState(63);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(64);
			env_body();
			setState(65);
			match(T__5);
			setState(66);
			match(LETTERS);
			setState(67);
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
			setState(74);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__4) | (1L << COMMAND) | (1L << PLAIN_TEXT))) != 0)) {
				{
				setState(72);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case PLAIN_TEXT:
					{
					setState(69);
					match(PLAIN_TEXT);
					}
					break;
				case COMMAND:
					{
					setState(70);
					command();
					}
					break;
				case T__4:
					{
					setState(71);
					environment();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(76);
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

	public static class Math_inlineContext extends ParserRuleContext {
		public In_mathContext in_math() {
			return getRuleContext(In_mathContext.class,0);
		}
		public Math_inlineContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_math_inline; }
	}

	public final Math_inlineContext math_inline() throws RecognitionException {
		Math_inlineContext _localctx = new Math_inlineContext(_ctx, getState());
		enterRule(_localctx, 10, RULE_math_inline);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(77);
			match(T__6);
			setState(78);
			in_math();
			setState(79);
			match(T__6);
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

	public static class Math_displayContext extends ParserRuleContext {
		public In_mathContext in_math() {
			return getRuleContext(In_mathContext.class,0);
		}
		public Math_displayContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_math_display; }
	}

	public final Math_displayContext math_display() throws RecognitionException {
		Math_displayContext _localctx = new Math_displayContext(_ctx, getState());
		enterRule(_localctx, 12, RULE_math_display);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(81);
			match(T__7);
			setState(82);
			in_math();
			setState(83);
			match(T__7);
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

	public static class In_mathContext extends ParserRuleContext {
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public CommandContext command() {
			return getRuleContext(CommandContext.class,0);
		}
		public EnvironmentContext environment() {
			return getRuleContext(EnvironmentContext.class,0);
		}
		public In_mathContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_in_math; }
	}

	public final In_mathContext in_math() throws RecognitionException {
		In_mathContext _localctx = new In_mathContext(_ctx, getState());
		enterRule(_localctx, 14, RULE_in_math);
		try {
			setState(88);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(85);
				match(PLAIN_TEXT);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 2);
				{
				setState(86);
				command();
				}
				break;
			case T__4:
				enterOuterAlt(_localctx, 3);
				{
				setState(87);
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

	public static final String _serializedATN =
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\3\16]\4\2\t\2\4\3\t"+
		"\3\4\4\t\4\4\5\t\5\4\6\t\6\4\7\t\7\4\b\t\b\4\t\t\t\3\2\3\2\3\2\3\2\3\2"+
		"\5\2\30\n\2\3\3\3\3\3\3\3\3\3\3\5\3\37\n\3\3\3\3\3\3\3\3\3\7\3%\n\3\f"+
		"\3\16\3(\13\3\3\4\3\4\7\4,\n\4\f\4\16\4/\13\4\3\5\3\5\3\5\3\5\3\5\3\5"+
		"\3\5\5\58\n\5\3\5\3\5\3\5\3\5\7\5>\n\5\f\5\16\5A\13\5\3\5\3\5\3\5\3\5"+
		"\3\5\3\6\3\6\3\6\7\6K\n\6\f\6\16\6N\13\6\3\7\3\7\3\7\3\7\3\b\3\b\3\b\3"+
		"\b\3\t\3\t\3\t\5\t[\n\t\3\t\2\2\n\2\4\6\b\n\f\16\20\2\2\2c\2\27\3\2\2"+
		"\2\4\31\3\2\2\2\6-\3\2\2\2\b\60\3\2\2\2\nL\3\2\2\2\fO\3\2\2\2\16S\3\2"+
		"\2\2\20Z\3\2\2\2\22\30\7\r\2\2\23\30\5\4\3\2\24\30\5\b\5\2\25\30\5\f\7"+
		"\2\26\30\5\16\b\2\27\22\3\2\2\2\27\23\3\2\2\2\27\24\3\2\2\2\27\25\3\2"+
		"\2\2\27\26\3\2\2\2\30\3\3\2\2\2\31\36\7\f\2\2\32\33\7\3\2\2\33\34\5\6"+
		"\4\2\34\35\7\4\2\2\35\37\3\2\2\2\36\32\3\2\2\2\36\37\3\2\2\2\37&\3\2\2"+
		"\2 !\7\5\2\2!\"\5\6\4\2\"#\7\6\2\2#%\3\2\2\2$ \3\2\2\2%(\3\2\2\2&$\3\2"+
		"\2\2&\'\3\2\2\2\'\5\3\2\2\2(&\3\2\2\2),\7\r\2\2*,\5\4\3\2+)\3\2\2\2+*"+
		"\3\2\2\2,/\3\2\2\2-+\3\2\2\2-.\3\2\2\2.\7\3\2\2\2/-\3\2\2\2\60\61\7\7"+
		"\2\2\61\62\7\13\2\2\62\67\7\6\2\2\63\64\7\3\2\2\64\65\5\6\4\2\65\66\7"+
		"\4\2\2\668\3\2\2\2\67\63\3\2\2\2\678\3\2\2\28?\3\2\2\29:\7\5\2\2:;\5\6"+
		"\4\2;<\7\6\2\2<>\3\2\2\2=9\3\2\2\2>A\3\2\2\2?=\3\2\2\2?@\3\2\2\2@B\3\2"+
		"\2\2A?\3\2\2\2BC\5\n\6\2CD\7\b\2\2DE\7\13\2\2EF\7\6\2\2F\t\3\2\2\2GK\7"+
		"\r\2\2HK\5\4\3\2IK\5\b\5\2JG\3\2\2\2JH\3\2\2\2JI\3\2\2\2KN\3\2\2\2LJ\3"+
		"\2\2\2LM\3\2\2\2M\13\3\2\2\2NL\3\2\2\2OP\7\t\2\2PQ\5\20\t\2QR\7\t\2\2"+
		"R\r\3\2\2\2ST\7\n\2\2TU\5\20\t\2UV\7\n\2\2V\17\3\2\2\2W[\7\r\2\2X[\5\4"+
		"\3\2Y[\5\b\5\2ZW\3\2\2\2ZX\3\2\2\2ZY\3\2\2\2[\21\3\2\2\2\f\27\36&+-\67"+
		"?JLZ";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}