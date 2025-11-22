<?php

/**
 * Rule Type Interface.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

use WP_Block;

/**
 * Interface for rule type classes.
 */
abstract class Rule
{
	/**
	 * Checks if the rule matches.
	 */
	abstract public function matches(array $rule, array $block, WP_Block $instance): bool;
}
