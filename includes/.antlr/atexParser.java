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
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, PLAIN_TEXT=9, 
		BRACKET=10, LETTERS=11, DIGIT=12, COMMAND=13;
	public static final int
		RULE_start = 0, RULE_command = 1, RULE_necessary_real_arg = 2, RULE_option_real_arg = 3, 
		RULE_environment = 4, RULE_env_body = 5, RULE_math_inline = 6, RULE_math_display = 7, 
		RULE_in_math_inline = 8, RULE_in_math_display = 9;
	private static String[] makeRuleNames() {
		return new String[] {
			"start", "command", "necessary_real_arg", "option_real_arg", "environment", 
			"env_body", "math_inline", "math_display", "in_math_inline", "in_math_display"
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
			null, null, null, null, null, null, null, null, null, "PLAIN_TEXT", "BRACKET", 
			"LETTERS", "DIGIT", "COMMAND"
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
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public StartContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_start; }
	}

	public final StartContext start() throws RecognitionException {
		StartContext _localctx = new StartContext(_ctx, getState());
		enterRule(_localctx, 0, RULE_start);
		try {
			setState(25);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case COMMAND:
				enterOuterAlt(_localctx, 1);
				{
				setState(20);
				command();
				}
				break;
			case T__4:
				enterOuterAlt(_localctx, 2);
				{
				setState(21);
				environment();
				}
				break;
			case T__6:
				enterOuterAlt(_localctx, 3);
				{
				setState(22);
				math_inline();
				}
				break;
			case T__7:
				enterOuterAlt(_localctx, 4);
				{
				setState(23);
				math_display();
				}
				break;
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 5);
				{
				setState(24);
				match(PLAIN_TEXT);
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
		public List<Option_real_argContext> option_real_arg() {
			return getRuleContexts(Option_real_argContext.class);
		}
		public Option_real_argContext option_real_arg(int i) {
			return getRuleContext(Option_real_argContext.class,i);
		}
		public List<Necessary_real_argContext> necessary_real_arg() {
			return getRuleContexts(Necessary_real_argContext.class);
		}
		public Necessary_real_argContext necessary_real_arg(int i) {
			return getRuleContext(Necessary_real_argContext.class,i);
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
			setState(27);
			match(COMMAND);
			setState(36);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(28);
				match(T__0);
				setState(32);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==PLAIN_TEXT || _la==COMMAND) {
					{
					{
					setState(29);
					option_real_arg();
					}
					}
					setState(34);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(35);
				match(T__1);
				}
			}

			setState(48);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(38);
				match(T__2);
				setState(42);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << COMMAND))) != 0)) {
					{
					{
					setState(39);
					necessary_real_arg();
					}
					}
					setState(44);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(45);
				match(T__3);
				}
				}
				setState(50);
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

	public static class Necessary_real_argContext extends ParserRuleContext {
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public TerminalNode BRACKET() { return getToken(atexParser.BRACKET, 0); }
		public CommandContext command() {
			return getRuleContext(CommandContext.class,0);
		}
		public Necessary_real_argContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_necessary_real_arg; }
	}

	public final Necessary_real_argContext necessary_real_arg() throws RecognitionException {
		Necessary_real_argContext _localctx = new Necessary_real_argContext(_ctx, getState());
		enterRule(_localctx, 4, RULE_necessary_real_arg);
		try {
			setState(54);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(51);
				match(PLAIN_TEXT);
				}
				break;
			case BRACKET:
				enterOuterAlt(_localctx, 2);
				{
				setState(52);
				match(BRACKET);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 3);
				{
				setState(53);
				command();
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

	public static class Option_real_argContext extends ParserRuleContext {
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public CommandContext command() {
			return getRuleContext(CommandContext.class,0);
		}
		public Option_real_argContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_option_real_arg; }
	}

	public final Option_real_argContext option_real_arg() throws RecognitionException {
		Option_real_argContext _localctx = new Option_real_argContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_option_real_arg);
		try {
			setState(58);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(56);
				match(PLAIN_TEXT);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 2);
				{
				setState(57);
				command();
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

	public static class EnvironmentContext extends ParserRuleContext {
		public List<TerminalNode> LETTERS() { return getTokens(atexParser.LETTERS); }
		public TerminalNode LETTERS(int i) {
			return getToken(atexParser.LETTERS, i);
		}
		public Env_bodyContext env_body() {
			return getRuleContext(Env_bodyContext.class,0);
		}
		public List<Option_real_argContext> option_real_arg() {
			return getRuleContexts(Option_real_argContext.class);
		}
		public Option_real_argContext option_real_arg(int i) {
			return getRuleContext(Option_real_argContext.class,i);
		}
		public List<Necessary_real_argContext> necessary_real_arg() {
			return getRuleContexts(Necessary_real_argContext.class);
		}
		public Necessary_real_argContext necessary_real_arg(int i) {
			return getRuleContext(Necessary_real_argContext.class,i);
		}
		public EnvironmentContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_environment; }
	}

	public final EnvironmentContext environment() throws RecognitionException {
		EnvironmentContext _localctx = new EnvironmentContext(_ctx, getState());
		enterRule(_localctx, 8, RULE_environment);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(60);
			match(T__4);
			setState(61);
			match(LETTERS);
			setState(62);
			match(T__3);
			setState(71);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(63);
				match(T__0);
				setState(67);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while (_la==PLAIN_TEXT || _la==COMMAND) {
					{
					{
					setState(64);
					option_real_arg();
					}
					}
					setState(69);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(70);
				match(T__1);
				}
			}

			setState(83);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(73);
				match(T__2);
				setState(77);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << COMMAND))) != 0)) {
					{
					{
					setState(74);
					necessary_real_arg();
					}
					}
					setState(79);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(80);
				match(T__3);
				}
				}
				setState(85);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(86);
			env_body();
			setState(87);
			match(T__5);
			setState(88);
			match(LETTERS);
			setState(89);
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
		public List<TerminalNode> BRACKET() { return getTokens(atexParser.BRACKET); }
		public TerminalNode BRACKET(int i) {
			return getToken(atexParser.BRACKET, i);
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
		enterRule(_localctx, 10, RULE_env_body);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(97);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__4) | (1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << COMMAND))) != 0)) {
				{
				setState(95);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case PLAIN_TEXT:
					{
					setState(91);
					match(PLAIN_TEXT);
					}
					break;
				case BRACKET:
					{
					setState(92);
					match(BRACKET);
					}
					break;
				case COMMAND:
					{
					setState(93);
					command();
					}
					break;
				case T__4:
					{
					setState(94);
					environment();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(99);
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
		public In_math_inlineContext in_math_inline() {
			return getRuleContext(In_math_inlineContext.class,0);
		}
		public Math_inlineContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_math_inline; }
	}

	public final Math_inlineContext math_inline() throws RecognitionException {
		Math_inlineContext _localctx = new Math_inlineContext(_ctx, getState());
		enterRule(_localctx, 12, RULE_math_inline);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(100);
			match(T__6);
			setState(101);
			in_math_inline();
			setState(102);
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
		public In_math_displayContext in_math_display() {
			return getRuleContext(In_math_displayContext.class,0);
		}
		public Math_displayContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_math_display; }
	}

	public final Math_displayContext math_display() throws RecognitionException {
		Math_displayContext _localctx = new Math_displayContext(_ctx, getState());
		enterRule(_localctx, 14, RULE_math_display);
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(104);
			match(T__7);
			setState(105);
			in_math_display();
			setState(106);
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

	public static class In_math_inlineContext extends ParserRuleContext {
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public TerminalNode BRACKET() { return getToken(atexParser.BRACKET, 0); }
		public CommandContext command() {
			return getRuleContext(CommandContext.class,0);
		}
		public In_math_inlineContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_in_math_inline; }
	}

	public final In_math_inlineContext in_math_inline() throws RecognitionException {
		In_math_inlineContext _localctx = new In_math_inlineContext(_ctx, getState());
		enterRule(_localctx, 16, RULE_in_math_inline);
		try {
			setState(111);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(108);
				match(PLAIN_TEXT);
				}
				break;
			case BRACKET:
				enterOuterAlt(_localctx, 2);
				{
				setState(109);
				match(BRACKET);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 3);
				{
				setState(110);
				command();
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

	public static class In_math_displayContext extends ParserRuleContext {
		public In_math_inlineContext in_math_inline() {
			return getRuleContext(In_math_inlineContext.class,0);
		}
		public EnvironmentContext environment() {
			return getRuleContext(EnvironmentContext.class,0);
		}
		public In_math_displayContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_in_math_display; }
	}

	public final In_math_displayContext in_math_display() throws RecognitionException {
		In_math_displayContext _localctx = new In_math_displayContext(_ctx, getState());
		enterRule(_localctx, 18, RULE_in_math_display);
		try {
			setState(115);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
			case BRACKET:
			case COMMAND:
				enterOuterAlt(_localctx, 1);
				{
				setState(113);
				in_math_inline();
				}
				break;
			case T__4:
				enterOuterAlt(_localctx, 2);
				{
				setState(114);
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
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\3\17x\4\2\t\2\4\3\t"+
		"\3\4\4\t\4\4\5\t\5\4\6\t\6\4\7\t\7\4\b\t\b\4\t\t\t\4\n\t\n\4\13\t\13\3"+
		"\2\3\2\3\2\3\2\3\2\5\2\34\n\2\3\3\3\3\3\3\7\3!\n\3\f\3\16\3$\13\3\3\3"+
		"\5\3\'\n\3\3\3\3\3\7\3+\n\3\f\3\16\3.\13\3\3\3\7\3\61\n\3\f\3\16\3\64"+
		"\13\3\3\4\3\4\3\4\5\49\n\4\3\5\3\5\5\5=\n\5\3\6\3\6\3\6\3\6\3\6\7\6D\n"+
		"\6\f\6\16\6G\13\6\3\6\5\6J\n\6\3\6\3\6\7\6N\n\6\f\6\16\6Q\13\6\3\6\7\6"+
		"T\n\6\f\6\16\6W\13\6\3\6\3\6\3\6\3\6\3\6\3\7\3\7\3\7\3\7\7\7b\n\7\f\7"+
		"\16\7e\13\7\3\b\3\b\3\b\3\b\3\t\3\t\3\t\3\t\3\n\3\n\3\n\5\nr\n\n\3\13"+
		"\3\13\5\13v\n\13\3\13\2\2\f\2\4\6\b\n\f\16\20\22\24\2\2\2\u0083\2\33\3"+
		"\2\2\2\4\35\3\2\2\2\68\3\2\2\2\b<\3\2\2\2\n>\3\2\2\2\fc\3\2\2\2\16f\3"+
		"\2\2\2\20j\3\2\2\2\22q\3\2\2\2\24u\3\2\2\2\26\34\5\4\3\2\27\34\5\n\6\2"+
		"\30\34\5\16\b\2\31\34\5\20\t\2\32\34\7\13\2\2\33\26\3\2\2\2\33\27\3\2"+
		"\2\2\33\30\3\2\2\2\33\31\3\2\2\2\33\32\3\2\2\2\34\3\3\2\2\2\35&\7\17\2"+
		"\2\36\"\7\3\2\2\37!\5\b\5\2 \37\3\2\2\2!$\3\2\2\2\" \3\2\2\2\"#\3\2\2"+
		"\2#%\3\2\2\2$\"\3\2\2\2%\'\7\4\2\2&\36\3\2\2\2&\'\3\2\2\2\'\62\3\2\2\2"+
		"(,\7\5\2\2)+\5\6\4\2*)\3\2\2\2+.\3\2\2\2,*\3\2\2\2,-\3\2\2\2-/\3\2\2\2"+
		".,\3\2\2\2/\61\7\6\2\2\60(\3\2\2\2\61\64\3\2\2\2\62\60\3\2\2\2\62\63\3"+
		"\2\2\2\63\5\3\2\2\2\64\62\3\2\2\2\659\7\13\2\2\669\7\f\2\2\679\5\4\3\2"+
		"8\65\3\2\2\28\66\3\2\2\28\67\3\2\2\29\7\3\2\2\2:=\7\13\2\2;=\5\4\3\2<"+
		":\3\2\2\2<;\3\2\2\2=\t\3\2\2\2>?\7\7\2\2?@\7\r\2\2@I\7\6\2\2AE\7\3\2\2"+
		"BD\5\b\5\2CB\3\2\2\2DG\3\2\2\2EC\3\2\2\2EF\3\2\2\2FH\3\2\2\2GE\3\2\2\2"+
		"HJ\7\4\2\2IA\3\2\2\2IJ\3\2\2\2JU\3\2\2\2KO\7\5\2\2LN\5\6\4\2ML\3\2\2\2"+
		"NQ\3\2\2\2OM\3\2\2\2OP\3\2\2\2PR\3\2\2\2QO\3\2\2\2RT\7\6\2\2SK\3\2\2\2"+
		"TW\3\2\2\2US\3\2\2\2UV\3\2\2\2VX\3\2\2\2WU\3\2\2\2XY\5\f\7\2YZ\7\b\2\2"+
		"Z[\7\r\2\2[\\\7\6\2\2\\\13\3\2\2\2]b\7\13\2\2^b\7\f\2\2_b\5\4\3\2`b\5"+
		"\n\6\2a]\3\2\2\2a^\3\2\2\2a_\3\2\2\2a`\3\2\2\2be\3\2\2\2ca\3\2\2\2cd\3"+
		"\2\2\2d\r\3\2\2\2ec\3\2\2\2fg\7\t\2\2gh\5\22\n\2hi\7\t\2\2i\17\3\2\2\2"+
		"jk\7\n\2\2kl\5\24\13\2lm\7\n\2\2m\21\3\2\2\2nr\7\13\2\2or\7\f\2\2pr\5"+
		"\4\3\2qn\3\2\2\2qo\3\2\2\2qp\3\2\2\2r\23\3\2\2\2sv\5\22\n\2tv\5\n\6\2"+
		"us\3\2\2\2ut\3\2\2\2v\25\3\2\2\2\21\33\"&,\628<EIOUacqu";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}