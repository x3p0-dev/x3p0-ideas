<?php

/**
 * Rule registration class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2009-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-breadcrumbs
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

/**
 * Registers rule classes with the registry.
 */
final class RuleRegistrar
{
	public const IF = 'if';
	public const IF_ATTRIBUTE = 'ifAttribute';
	public const IS_USER = 'isUser';
	public const UNLESS = 'unless';
	public const WHEN = 'when';

	/**
	 * An array of rule keys and their associated classes, to be stored
	 * in the rule registry.
	 */
	private static function getRules(): array
	{
		return [
			self::IF           => Type\When::class,
			self::IF_ATTRIBUTE => Type\IfAttribute::class,
			self::IS_USER      => Type\IsUser::class,
			self::UNLESS       => Type\Unless::class,
			self::WHEN         => Type\When::class
		];
	}

	/**
	 * Registers default rules with the registry.
	 */
	public static function register(RuleRegistry $ruleRegistry): void
	{
		foreach (self::getRules() as $key => $ruleClass) {
			if (! $ruleRegistry->isRegistered($key)) {
				$ruleRegistry->register($key, $ruleClass);
			}
		}
	}
}
