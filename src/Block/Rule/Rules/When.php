<?php

/**
 * If/When Rule Type class.
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
 * Show the block if the condition is met.
 */
final class When implements Rule
{
	/**
	 * Checks if the rule matches.
	 */
	public function matches(array $rule, array $block, WP_Block $instance): bool
	{
		$condition = $rule['callback'] ?? null;

		return ! is_callable($condition) || boolval(call_user_func($condition));
	}
}
