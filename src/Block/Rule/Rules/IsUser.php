<?php

/**
 * User Rule Type class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule\Rules;

use WP_Block;
use X3P0\Ideas\Block\Rule\Rule;

/**
 * Show the block if the user matches.
 */
final class IsUser implements Rule
{
	/**
	 * @inheritDoc
	 */
	public function matches(array $rule, array $block, WP_Block $instance): bool
	{
		$user = $rule['user'] ?? null;

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
