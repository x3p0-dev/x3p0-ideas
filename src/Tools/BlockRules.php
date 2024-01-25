<?php

/**
 * Block rules are instructions for how to handle the front-end output of a
 * block. This is done via a limited set of rules that conditionally decide
 * whether the block should be public (should be shown) or not. This could
 * potentially be expanded to include other instructions for how to handle
 * blocks, but the primary goal is conditional inclusion. This class doesn't
 * actually alter blocks in any way. It simply checks a block's attributes to
 * perform checks.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools;

class BlockRules
{
	/**
	 * List of allowed rules and their callback methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const RULE_METHODS = [
		'@if'     => 'checkIf',
		'@unless' => 'checkUnless',
		'@user'   => 'checkUser'
	];

	/**
	 * Checks if the block content is allowed to be shown based on the what
	 * is returned by the rule method.
	 *
	 * @since 1.0.0
	 */
	public function isPublic(array $block): bool
	{
		foreach (self::RULE_METHODS as $rule => $method) {
			if (isset($block['attrs'][ $rule ])) {
				$value = $block['attrs'][ $rule ];

				return is_array($value)
					? $this->$method(array_map('wp_strip_all_tags', $value))
					: $this->$method(wp_strip_all_tags($value));
			}
		}

		return true;
	}

	/**
	 * Show the block if the condition is met.
	 *
	 * @since 1.0.0
	 * @param string|array $condition
	 */
	protected function checkIf($condition): bool
	{
		$callable = is_callable($condition, false, $callback);
		return $callable ? boolval($callback()) : true;
	}

	/**
	 * Show the block unless the condition is met.
	 *
	 * @since 1.0.0
	 * @param string|array $condition
	 */
	protected function checkUnless($condition): bool
	{
		$callable = is_callable($condition, false, $callback);
		return $callable ? ! boolval($callback()) : true;
	}

	/**
	 * Show the block if the user matches.
	 *
	 * @since 1.0.0
	 * @param string|int|bool $user
	 */
	protected function checkUser($user): bool
	{
		$logged_in = is_user_logged_in();

		// If a boolean value is provided, check against the user's
		// logged-in status. `false` for not logged in. `true` for
		// logged in. For all other scenarios, the user must be logged
		// in, so return `false` if they are not.
		if (is_bool($user)) {
			return false === $user ? ! $logged_in : $logged_in;
		} elseif (! $logged_in) {
			return false;
		}

		$current_user = wp_get_current_user();

		return is_numeric($user)
			? absint($user) === $current_user->ID
			: $user === $current_user->get('user_nicename');
	}
}
