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

namespace X3P0\Ideas\Block;

use WP_Block;

class Rules
{
	/**
	 * List of allowed rules and their callback methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const RULE_METHODS = [
		'@if'          => 'checkIf',
		'@ifAttribute' => 'checkIfAttribute',
		'@unless'      => 'checkUnless',
		'@user'        => 'checkUser'
	];

	/**
	 * Checks if the block content is allowed to be shown based on the what
	 * is returned by the rule method.
	 *
	 * @since 1.0.0
	 */
	public function isPublic(array $block, WP_Block $instance): bool
	{
		if (
			! isset($block['attrs']['metadata'])
			|| ! is_array($block['attrs']['metadata'])
		) {
			return true;
		}

		$metadata = $block['attrs']['metadata'];

		foreach (self::RULE_METHODS as $rule => $method) {
			if (isset($metadata[$rule])) {
				return $this->$method(
					wp_strip_all_tags($metadata[$rule]),
					$block,
					$instance
				);
			}
		}

		return true;
	}

	/**
	 * Show the block if the condition is met.
	 *
	 * @since 1.0.0
	 */
	protected function checkIf(string|array $condition): bool
	{
		return ! is_callable($condition, false) || boolval(call_user_func($condition));
	}

	/**
	 * Show the block if the attribute has a value.
	 *
	 * @since 1.0.0
	 */
	protected function checkIfAttribute(string $attr, array $block, WP_Block $instance): bool
	{
		return ! empty($instance->attributes[$attr]);
	}

	/**
	 * Show the block unless the condition is met.
	 *
	 * @since 1.0.0
	 */
	protected function checkUnless(string|array $condition): bool
	{
		return ! is_callable($condition, false) || ! boolval(call_user_func($condition));
	}

	/**
	 * Show the block if the user matches.
	 *
	 * @since 1.0.0
	 */
	protected function checkUser(string|int|bool $user): bool
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
