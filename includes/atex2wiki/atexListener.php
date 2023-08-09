<?php

/*
 * Generated from atex.g4 by ANTLR 4.12.0
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see atexParser}.
 */
interface atexListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see atexParser::start()}.
	 * @param $context The parse tree.
	 */
	public function enterStart(Context\StartContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::start()}.
	 * @param $context The parse tree.
	 */
	public function exitStart(Context\StartContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::multi_plain_text()}.
	 * @param $context The parse tree.
	 */
	public function enterMulti_plain_text(Context\Multi_plain_textContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::multi_plain_text()}.
	 * @param $context The parse tree.
	 */
	public function exitMulti_plain_text(Context\Multi_plain_textContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::command()}.
	 * @param $context The parse tree.
	 */
	public function enterCommand(Context\CommandContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::command()}.
	 * @param $context The parse tree.
	 */
	public function exitCommand(Context\CommandContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::necessary_real_arg()}.
	 * @param $context The parse tree.
	 */
	public function enterNecessary_real_arg(Context\Necessary_real_argContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::necessary_real_arg()}.
	 * @param $context The parse tree.
	 */
	public function exitNecessary_real_arg(Context\Necessary_real_argContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::option_real_arg()}.
	 * @param $context The parse tree.
	 */
	public function enterOption_real_arg(Context\Option_real_argContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::option_real_arg()}.
	 * @param $context The parse tree.
	 */
	public function exitOption_real_arg(Context\Option_real_argContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::newcommand()}.
	 * @param $context The parse tree.
	 */
	public function enterNewcommand(Context\NewcommandContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::newcommand()}.
	 * @param $context The parse tree.
	 */
	public function exitNewcommand(Context\NewcommandContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::define_args()}.
	 * @param $context The parse tree.
	 */
	public function enterDefine_args(Context\Define_argsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::define_args()}.
	 * @param $context The parse tree.
	 */
	public function exitDefine_args(Context\Define_argsContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::environment()}.
	 * @param $context The parse tree.
	 */
	public function enterEnvironment(Context\EnvironmentContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::environment()}.
	 * @param $context The parse tree.
	 */
	public function exitEnvironment(Context\EnvironmentContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::env_body()}.
	 * @param $context The parse tree.
	 */
	public function enterEnv_body(Context\Env_bodyContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::env_body()}.
	 * @param $context The parse tree.
	 */
	public function exitEnv_body(Context\Env_bodyContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::math_inline()}.
	 * @param $context The parse tree.
	 */
	public function enterMath_inline(Context\Math_inlineContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::math_inline()}.
	 * @param $context The parse tree.
	 */
	public function exitMath_inline(Context\Math_inlineContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::math_display()}.
	 * @param $context The parse tree.
	 */
	public function enterMath_display(Context\Math_displayContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::math_display()}.
	 * @param $context The parse tree.
	 */
	public function exitMath_display(Context\Math_displayContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::in_math_inline()}.
	 * @param $context The parse tree.
	 */
	public function enterIn_math_inline(Context\In_math_inlineContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::in_math_inline()}.
	 * @param $context The parse tree.
	 */
	public function exitIn_math_inline(Context\In_math_inlineContext $context): void;
	/**
	 * Enter a parse tree produced by {@see atexParser::in_math_display()}.
	 * @param $context The parse tree.
	 */
	public function enterIn_math_display(Context\In_math_displayContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::in_math_display()}.
	 * @param $context The parse tree.
	 */
	public function exitIn_math_display(Context\In_math_displayContext $context): void;
}