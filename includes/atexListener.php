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
	 * Enter a parse tree produced by {@see atexParser::real_args()}.
	 * @param $context The parse tree.
	 */
	public function enterReal_args(Context\Real_argsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::real_args()}.
	 * @param $context The parse tree.
	 */
	public function exitReal_args(Context\Real_argsContext $context): void;
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
	 * Enter a parse tree produced by {@see atexParser::in_math()}.
	 * @param $context The parse tree.
	 */
	public function enterIn_math(Context\In_mathContext $context): void;
	/**
	 * Exit a parse tree produced by {@see atexParser::in_math()}.
	 * @param $context The parse tree.
	 */
	public function exitIn_math(Context\In_mathContext $context): void;
}