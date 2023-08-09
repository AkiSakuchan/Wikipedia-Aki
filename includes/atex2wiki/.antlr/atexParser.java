// Generated from /Users/huzhilin/Projet/GIT/Wikipedia-Aki/includes/atex2wiki/atex.g4 by ANTLR 4.9.2
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
		T__0=1, T__1=2, T__2=3, T__3=4, T__4=5, T__5=6, T__6=7, T__7=8, T__8=9, 
		PLAIN_TEXT=10, BRACKET=11, SYMBOL_MATH=12, SYMBOL_ARGS=13, SYMBOL_VERTICAL=14, 
		LETTERS=15, DIGIT=16, COMMAND=17;
	public static final int
		RULE_start = 0, RULE_multi_plain_text = 1, RULE_command = 2, RULE_necessary_real_arg = 3, 
		RULE_option_real_arg = 4, RULE_newcommand = 5, RULE_define_args = 6, RULE_environment = 7, 
		RULE_env_body = 8, RULE_math_inline = 9, RULE_math_display = 10, RULE_in_math_inline = 11, 
		RULE_in_math_display = 12;
	private static String[] makeRuleNames() {
		return new String[] {
			"start", "multi_plain_text", "command", "necessary_real_arg", "option_real_arg", 
			"newcommand", "define_args", "environment", "env_body", "math_inline", 
			"math_display", "in_math_inline", "in_math_display"
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
		public List<Math_inlineContext> math_inline() {
			return getRuleContexts(Math_inlineContext.class);
		}
		public Math_inlineContext math_inline(int i) {
			return getRuleContext(Math_inlineContext.class,i);
		}
		public List<Math_displayContext> math_display() {
			return getRuleContexts(Math_displayContext.class);
		}
		public Math_displayContext math_display(int i) {
			return getRuleContext(Math_displayContext.class,i);
		}
		public List<Multi_plain_textContext> multi_plain_text() {
			return getRuleContexts(Multi_plain_textContext.class);
		}
		public Multi_plain_textContext multi_plain_text(int i) {
			return getRuleContext(Multi_plain_textContext.class,i);
		}
		public List<NewcommandContext> newcommand() {
			return getRuleContexts(NewcommandContext.class);
		}
		public NewcommandContext newcommand(int i) {
			return getRuleContext(NewcommandContext.class,i);
		}
		public StartContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_start; }
	}

	public final StartContext start() throws RecognitionException {
		StartContext _localctx = new StartContext(_ctx, getState());
		enterRule(_localctx, 0, RULE_start);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(32); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				setState(32);
				_errHandler.sync(this);
				switch (_input.LA(1)) {
				case COMMAND:
					{
					setState(26);
					command();
					}
					break;
				case T__5:
					{
					setState(27);
					environment();
					}
					break;
				case T__7:
					{
					setState(28);
					math_inline();
					}
					break;
				case T__8:
					{
					setState(29);
					math_display();
					}
					break;
				case PLAIN_TEXT:
				case SYMBOL_VERTICAL:
					{
					setState(30);
					multi_plain_text();
					}
					break;
				case T__4:
					{
					setState(31);
					newcommand();
					}
					break;
				default:
					throw new NoViableAltException(this);
				}
				}
				setState(34); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__4) | (1L << T__5) | (1L << T__7) | (1L << T__8) | (1L << PLAIN_TEXT) | (1L << SYMBOL_VERTICAL) | (1L << COMMAND))) != 0) );
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

	public static class Multi_plain_textContext extends ParserRuleContext {
		public TerminalNode PLAIN_TEXT() { return getToken(atexParser.PLAIN_TEXT, 0); }
		public TerminalNode SYMBOL_VERTICAL() { return getToken(atexParser.SYMBOL_VERTICAL, 0); }
		public Multi_plain_textContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_multi_plain_text; }
	}

	public final Multi_plain_textContext multi_plain_text() throws RecognitionException {
		Multi_plain_textContext _localctx = new Multi_plain_textContext(_ctx, getState());
		enterRule(_localctx, 2, RULE_multi_plain_text);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(36);
			_la = _input.LA(1);
			if ( !(_la==PLAIN_TEXT || _la==SYMBOL_VERTICAL) ) {
			_errHandler.recoverInline(this);
			}
			else {
				if ( _input.LA(1)==Token.EOF ) matchedEOF = true;
				_errHandler.reportMatch(this);
				consume();
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
		enterRule(_localctx, 4, RULE_command);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(38);
			match(COMMAND);
			setState(47);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(39);
				match(T__0);
				setState(43);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__7) | (1L << PLAIN_TEXT) | (1L << COMMAND))) != 0)) {
					{
					{
					setState(40);
					option_real_arg();
					}
					}
					setState(45);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(46);
				match(T__1);
				}
			}

			setState(59);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(49);
				match(T__2);
				setState(53);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__7) | (1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << COMMAND))) != 0)) {
					{
					{
					setState(50);
					necessary_real_arg();
					}
					}
					setState(55);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(56);
				match(T__3);
				}
				}
				setState(61);
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
		public Math_inlineContext math_inline() {
			return getRuleContext(Math_inlineContext.class,0);
		}
		public Necessary_real_argContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_necessary_real_arg; }
	}

	public final Necessary_real_argContext necessary_real_arg() throws RecognitionException {
		Necessary_real_argContext _localctx = new Necessary_real_argContext(_ctx, getState());
		enterRule(_localctx, 6, RULE_necessary_real_arg);
		try {
			setState(66);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(62);
				match(PLAIN_TEXT);
				}
				break;
			case BRACKET:
				enterOuterAlt(_localctx, 2);
				{
				setState(63);
				match(BRACKET);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 3);
				{
				setState(64);
				command();
				}
				break;
			case T__7:
				enterOuterAlt(_localctx, 4);
				{
				setState(65);
				math_inline();
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
		public Math_inlineContext math_inline() {
			return getRuleContext(Math_inlineContext.class,0);
		}
		public Option_real_argContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_option_real_arg; }
	}

	public final Option_real_argContext option_real_arg() throws RecognitionException {
		Option_real_argContext _localctx = new Option_real_argContext(_ctx, getState());
		enterRule(_localctx, 8, RULE_option_real_arg);
		try {
			setState(71);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(68);
				match(PLAIN_TEXT);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 2);
				{
				setState(69);
				command();
				}
				break;
			case T__7:
				enterOuterAlt(_localctx, 3);
				{
				setState(70);
				math_inline();
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

	public static class NewcommandContext extends ParserRuleContext {
		public TerminalNode COMMAND() { return getToken(atexParser.COMMAND, 0); }
		public TerminalNode DIGIT() { return getToken(atexParser.DIGIT, 0); }
		public Option_real_argContext option_real_arg() {
			return getRuleContext(Option_real_argContext.class,0);
		}
		public List<Define_argsContext> define_args() {
			return getRuleContexts(Define_argsContext.class);
		}
		public Define_argsContext define_args(int i) {
			return getRuleContext(Define_argsContext.class,i);
		}
		public NewcommandContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_newcommand; }
	}

	public final NewcommandContext newcommand() throws RecognitionException {
		NewcommandContext _localctx = new NewcommandContext(_ctx, getState());
		enterRule(_localctx, 10, RULE_newcommand);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(73);
			match(T__4);
			setState(74);
			match(COMMAND);
			setState(75);
			match(T__3);
			setState(79);
			_errHandler.sync(this);
			switch ( getInterpreter().adaptivePredict(_input,8,_ctx) ) {
			case 1:
				{
				setState(76);
				match(T__0);
				setState(77);
				match(DIGIT);
				setState(78);
				match(T__1);
				}
				break;
			}
			setState(85);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(81);
				match(T__0);
				setState(82);
				option_real_arg();
				setState(83);
				match(T__1);
				}
			}

			setState(91); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(87);
				match(T__2);
				setState(88);
				define_args();
				setState(89);
				match(T__3);
				}
				}
				setState(93); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( _la==T__2 );
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

	public static class Define_argsContext extends ParserRuleContext {
		public Necessary_real_argContext necessary_real_arg() {
			return getRuleContext(Necessary_real_argContext.class,0);
		}
		public TerminalNode SYMBOL_ARGS() { return getToken(atexParser.SYMBOL_ARGS, 0); }
		public Define_argsContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_define_args; }
	}

	public final Define_argsContext define_args() throws RecognitionException {
		Define_argsContext _localctx = new Define_argsContext(_ctx, getState());
		enterRule(_localctx, 12, RULE_define_args);
		try {
			setState(97);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case T__7:
			case PLAIN_TEXT:
			case BRACKET:
			case COMMAND:
				enterOuterAlt(_localctx, 1);
				{
				setState(95);
				necessary_real_arg();
				}
				break;
			case SYMBOL_ARGS:
				enterOuterAlt(_localctx, 2);
				{
				setState(96);
				match(SYMBOL_ARGS);
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
		enterRule(_localctx, 14, RULE_environment);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(99);
			match(T__5);
			setState(100);
			match(LETTERS);
			setState(101);
			match(T__3);
			setState(110);
			_errHandler.sync(this);
			_la = _input.LA(1);
			if (_la==T__0) {
				{
				setState(102);
				match(T__0);
				setState(106);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__7) | (1L << PLAIN_TEXT) | (1L << COMMAND))) != 0)) {
					{
					{
					setState(103);
					option_real_arg();
					}
					}
					setState(108);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(109);
				match(T__1);
				}
			}

			setState(122);
			_errHandler.sync(this);
			_la = _input.LA(1);
			while (_la==T__2) {
				{
				{
				setState(112);
				match(T__2);
				setState(116);
				_errHandler.sync(this);
				_la = _input.LA(1);
				while ((((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__7) | (1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << COMMAND))) != 0)) {
					{
					{
					setState(113);
					necessary_real_arg();
					}
					}
					setState(118);
					_errHandler.sync(this);
					_la = _input.LA(1);
				}
				setState(119);
				match(T__3);
				}
				}
				setState(124);
				_errHandler.sync(this);
				_la = _input.LA(1);
			}
			setState(125);
			env_body();
			setState(126);
			match(T__6);
			setState(127);
			match(LETTERS);
			setState(128);
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
		public List<In_math_displayContext> in_math_display() {
			return getRuleContexts(In_math_displayContext.class);
		}
		public In_math_displayContext in_math_display(int i) {
			return getRuleContext(In_math_displayContext.class,i);
		}
		public Env_bodyContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_env_body; }
	}

	public final Env_bodyContext env_body() throws RecognitionException {
		Env_bodyContext _localctx = new Env_bodyContext(_ctx, getState());
		enterRule(_localctx, 16, RULE_env_body);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(131); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(130);
				in_math_display();
				}
				}
				setState(133); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__5) | (1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << SYMBOL_MATH) | (1L << SYMBOL_VERTICAL) | (1L << COMMAND))) != 0) );
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
		public List<In_math_inlineContext> in_math_inline() {
			return getRuleContexts(In_math_inlineContext.class);
		}
		public In_math_inlineContext in_math_inline(int i) {
			return getRuleContext(In_math_inlineContext.class,i);
		}
		public Math_inlineContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_math_inline; }
	}

	public final Math_inlineContext math_inline() throws RecognitionException {
		Math_inlineContext _localctx = new Math_inlineContext(_ctx, getState());
		enterRule(_localctx, 18, RULE_math_inline);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(135);
			match(T__7);
			setState(137); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(136);
				in_math_inline();
				}
				}
				setState(139); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << SYMBOL_MATH) | (1L << COMMAND))) != 0) );
			setState(141);
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

	public static class Math_displayContext extends ParserRuleContext {
		public List<In_math_displayContext> in_math_display() {
			return getRuleContexts(In_math_displayContext.class);
		}
		public In_math_displayContext in_math_display(int i) {
			return getRuleContext(In_math_displayContext.class,i);
		}
		public Math_displayContext(ParserRuleContext parent, int invokingState) {
			super(parent, invokingState);
		}
		@Override public int getRuleIndex() { return RULE_math_display; }
	}

	public final Math_displayContext math_display() throws RecognitionException {
		Math_displayContext _localctx = new Math_displayContext(_ctx, getState());
		enterRule(_localctx, 20, RULE_math_display);
		int _la;
		try {
			enterOuterAlt(_localctx, 1);
			{
			setState(143);
			match(T__8);
			setState(145); 
			_errHandler.sync(this);
			_la = _input.LA(1);
			do {
				{
				{
				setState(144);
				in_math_display();
				}
				}
				setState(147); 
				_errHandler.sync(this);
				_la = _input.LA(1);
			} while ( (((_la) & ~0x3f) == 0 && ((1L << _la) & ((1L << T__5) | (1L << PLAIN_TEXT) | (1L << BRACKET) | (1L << SYMBOL_MATH) | (1L << SYMBOL_VERTICAL) | (1L << COMMAND))) != 0) );
			setState(149);
			match(T__8);
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
		public TerminalNode SYMBOL_MATH() { return getToken(atexParser.SYMBOL_MATH, 0); }
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
		enterRule(_localctx, 22, RULE_in_math_inline);
		try {
			setState(155);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
				enterOuterAlt(_localctx, 1);
				{
				setState(151);
				match(PLAIN_TEXT);
				}
				break;
			case SYMBOL_MATH:
				enterOuterAlt(_localctx, 2);
				{
				setState(152);
				match(SYMBOL_MATH);
				}
				break;
			case BRACKET:
				enterOuterAlt(_localctx, 3);
				{
				setState(153);
				match(BRACKET);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 4);
				{
				setState(154);
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
		public Multi_plain_textContext multi_plain_text() {
			return getRuleContext(Multi_plain_textContext.class,0);
		}
		public TerminalNode SYMBOL_MATH() { return getToken(atexParser.SYMBOL_MATH, 0); }
		public TerminalNode BRACKET() { return getToken(atexParser.BRACKET, 0); }
		public CommandContext command() {
			return getRuleContext(CommandContext.class,0);
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
		enterRule(_localctx, 24, RULE_in_math_display);
		try {
			setState(162);
			_errHandler.sync(this);
			switch (_input.LA(1)) {
			case PLAIN_TEXT:
			case SYMBOL_VERTICAL:
				enterOuterAlt(_localctx, 1);
				{
				setState(157);
				multi_plain_text();
				}
				break;
			case SYMBOL_MATH:
				enterOuterAlt(_localctx, 2);
				{
				setState(158);
				match(SYMBOL_MATH);
				}
				break;
			case BRACKET:
				enterOuterAlt(_localctx, 3);
				{
				setState(159);
				match(BRACKET);
				}
				break;
			case COMMAND:
				enterOuterAlt(_localctx, 4);
				{
				setState(160);
				command();
				}
				break;
			case T__5:
				enterOuterAlt(_localctx, 5);
				{
				setState(161);
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
		"\3\u608b\ua72a\u8133\ub9ed\u417c\u3be7\u7786\u5964\3\23\u00a7\4\2\t\2"+
		"\4\3\t\3\4\4\t\4\4\5\t\5\4\6\t\6\4\7\t\7\4\b\t\b\4\t\t\t\4\n\t\n\4\13"+
		"\t\13\4\f\t\f\4\r\t\r\4\16\t\16\3\2\3\2\3\2\3\2\3\2\3\2\6\2#\n\2\r\2\16"+
		"\2$\3\3\3\3\3\4\3\4\3\4\7\4,\n\4\f\4\16\4/\13\4\3\4\5\4\62\n\4\3\4\3\4"+
		"\7\4\66\n\4\f\4\16\49\13\4\3\4\7\4<\n\4\f\4\16\4?\13\4\3\5\3\5\3\5\3\5"+
		"\5\5E\n\5\3\6\3\6\3\6\5\6J\n\6\3\7\3\7\3\7\3\7\3\7\3\7\5\7R\n\7\3\7\3"+
		"\7\3\7\3\7\5\7X\n\7\3\7\3\7\3\7\3\7\6\7^\n\7\r\7\16\7_\3\b\3\b\5\bd\n"+
		"\b\3\t\3\t\3\t\3\t\3\t\7\tk\n\t\f\t\16\tn\13\t\3\t\5\tq\n\t\3\t\3\t\7"+
		"\tu\n\t\f\t\16\tx\13\t\3\t\7\t{\n\t\f\t\16\t~\13\t\3\t\3\t\3\t\3\t\3\t"+
		"\3\n\6\n\u0086\n\n\r\n\16\n\u0087\3\13\3\13\6\13\u008c\n\13\r\13\16\13"+
		"\u008d\3\13\3\13\3\f\3\f\6\f\u0094\n\f\r\f\16\f\u0095\3\f\3\f\3\r\3\r"+
		"\3\r\3\r\5\r\u009e\n\r\3\16\3\16\3\16\3\16\3\16\5\16\u00a5\n\16\3\16\2"+
		"\2\17\2\4\6\b\n\f\16\20\22\24\26\30\32\2\3\4\2\f\f\20\20\2\u00ba\2\"\3"+
		"\2\2\2\4&\3\2\2\2\6(\3\2\2\2\bD\3\2\2\2\nI\3\2\2\2\fK\3\2\2\2\16c\3\2"+
		"\2\2\20e\3\2\2\2\22\u0085\3\2\2\2\24\u0089\3\2\2\2\26\u0091\3\2\2\2\30"+
		"\u009d\3\2\2\2\32\u00a4\3\2\2\2\34#\5\6\4\2\35#\5\20\t\2\36#\5\24\13\2"+
		"\37#\5\26\f\2 #\5\4\3\2!#\5\f\7\2\"\34\3\2\2\2\"\35\3\2\2\2\"\36\3\2\2"+
		"\2\"\37\3\2\2\2\" \3\2\2\2\"!\3\2\2\2#$\3\2\2\2$\"\3\2\2\2$%\3\2\2\2%"+
		"\3\3\2\2\2&\'\t\2\2\2\'\5\3\2\2\2(\61\7\23\2\2)-\7\3\2\2*,\5\n\6\2+*\3"+
		"\2\2\2,/\3\2\2\2-+\3\2\2\2-.\3\2\2\2.\60\3\2\2\2/-\3\2\2\2\60\62\7\4\2"+
		"\2\61)\3\2\2\2\61\62\3\2\2\2\62=\3\2\2\2\63\67\7\5\2\2\64\66\5\b\5\2\65"+
		"\64\3\2\2\2\669\3\2\2\2\67\65\3\2\2\2\678\3\2\2\28:\3\2\2\29\67\3\2\2"+
		"\2:<\7\6\2\2;\63\3\2\2\2<?\3\2\2\2=;\3\2\2\2=>\3\2\2\2>\7\3\2\2\2?=\3"+
		"\2\2\2@E\7\f\2\2AE\7\r\2\2BE\5\6\4\2CE\5\24\13\2D@\3\2\2\2DA\3\2\2\2D"+
		"B\3\2\2\2DC\3\2\2\2E\t\3\2\2\2FJ\7\f\2\2GJ\5\6\4\2HJ\5\24\13\2IF\3\2\2"+
		"\2IG\3\2\2\2IH\3\2\2\2J\13\3\2\2\2KL\7\7\2\2LM\7\23\2\2MQ\7\6\2\2NO\7"+
		"\3\2\2OP\7\22\2\2PR\7\4\2\2QN\3\2\2\2QR\3\2\2\2RW\3\2\2\2ST\7\3\2\2TU"+
		"\5\n\6\2UV\7\4\2\2VX\3\2\2\2WS\3\2\2\2WX\3\2\2\2X]\3\2\2\2YZ\7\5\2\2Z"+
		"[\5\16\b\2[\\\7\6\2\2\\^\3\2\2\2]Y\3\2\2\2^_\3\2\2\2_]\3\2\2\2_`\3\2\2"+
		"\2`\r\3\2\2\2ad\5\b\5\2bd\7\17\2\2ca\3\2\2\2cb\3\2\2\2d\17\3\2\2\2ef\7"+
		"\b\2\2fg\7\21\2\2gp\7\6\2\2hl\7\3\2\2ik\5\n\6\2ji\3\2\2\2kn\3\2\2\2lj"+
		"\3\2\2\2lm\3\2\2\2mo\3\2\2\2nl\3\2\2\2oq\7\4\2\2ph\3\2\2\2pq\3\2\2\2q"+
		"|\3\2\2\2rv\7\5\2\2su\5\b\5\2ts\3\2\2\2ux\3\2\2\2vt\3\2\2\2vw\3\2\2\2"+
		"wy\3\2\2\2xv\3\2\2\2y{\7\6\2\2zr\3\2\2\2{~\3\2\2\2|z\3\2\2\2|}\3\2\2\2"+
		"}\177\3\2\2\2~|\3\2\2\2\177\u0080\5\22\n\2\u0080\u0081\7\t\2\2\u0081\u0082"+
		"\7\21\2\2\u0082\u0083\7\6\2\2\u0083\21\3\2\2\2\u0084\u0086\5\32\16\2\u0085"+
		"\u0084\3\2\2\2\u0086\u0087\3\2\2\2\u0087\u0085\3\2\2\2\u0087\u0088\3\2"+
		"\2\2\u0088\23\3\2\2\2\u0089\u008b\7\n\2\2\u008a\u008c\5\30\r\2\u008b\u008a"+
		"\3\2\2\2\u008c\u008d\3\2\2\2\u008d\u008b\3\2\2\2\u008d\u008e\3\2\2\2\u008e"+
		"\u008f\3\2\2\2\u008f\u0090\7\n\2\2\u0090\25\3\2\2\2\u0091\u0093\7\13\2"+
		"\2\u0092\u0094\5\32\16\2\u0093\u0092\3\2\2\2\u0094\u0095\3\2\2\2\u0095"+
		"\u0093\3\2\2\2\u0095\u0096\3\2\2\2\u0096\u0097\3\2\2\2\u0097\u0098\7\13"+
		"\2\2\u0098\27\3\2\2\2\u0099\u009e\7\f\2\2\u009a\u009e\7\16\2\2\u009b\u009e"+
		"\7\r\2\2\u009c\u009e\5\6\4\2\u009d\u0099\3\2\2\2\u009d\u009a\3\2\2\2\u009d"+
		"\u009b\3\2\2\2\u009d\u009c\3\2\2\2\u009e\31\3\2\2\2\u009f\u00a5\5\4\3"+
		"\2\u00a0\u00a5\7\16\2\2\u00a1\u00a5\7\r\2\2\u00a2\u00a5\5\6\4\2\u00a3"+
		"\u00a5\5\20\t\2\u00a4\u009f\3\2\2\2\u00a4\u00a0\3\2\2\2\u00a4\u00a1\3"+
		"\2\2\2\u00a4\u00a2\3\2\2\2\u00a4\u00a3\3\2\2\2\u00a5\33\3\2\2\2\27\"$"+
		"-\61\67=DIQW_clpv|\u0087\u008d\u0095\u009d\u00a4";
	public static final ATN _ATN =
		new ATNDeserializer().deserialize(_serializedATN.toCharArray());
	static {
		_decisionToDFA = new DFA[_ATN.getNumberOfDecisions()];
		for (int i = 0; i < _ATN.getNumberOfDecisions(); i++) {
			_decisionToDFA[i] = new DFA(_ATN.getDecisionState(i), i);
		}
	}
}