<?php

/**
 * Block Rules class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Support;

use WP_Block;

/**
 * Block rules are instructions for how to handle the front-end output of a
 * block. This is done via a limited set of rules that conditionally decide
 * whether the block should be public (should be shown) or not. This could
 * potentially be expanded to include other instructions for how to handle
 * blocks, but the primary goal is conditional inclusion. This class doesn't
 * actually alter blocks in any way. It simply checks a block's attributes to
 * perform checks.
 */
class Rules
{
	use Metadata;

	/**
	 * Metadata key to check in block attributes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const METADATA_KEY = 'x3p0/rules';

	/**
	 * List of allowed rule types and their callback methods.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const RULE_TYPES = [
		'if'          => 'checkIf',
		'ifAttribute' => 'checkIfAttribute',
		'unless'      => 'checkUnless',
		'user'        => 'checkUser'
	];

	/**
	 * Checks if the block content is allowed to be shown based on what is
	 * returned by the rule method.
	 */
	public function isPublic(array $block, WP_Block $instance): bool
	{
		$metadata = $this->getMetaValue($block, self::METADATA_KEY);

		if (! is_array($metadata)) {
			return true;
		}

		$operator = $metadata['operator'] ?? 'AND';
		$rules    = $metadata['rules'] ?? [];
		$results  = [];

		foreach ($rules as $rule) {
			if (isset($rule['type']) && isset(self::RULE_TYPES[$rule['type']])) {
				$method = self::RULE_TYPES[$rule['type']];

				$results[] = $this->$method($rule, $block, $instance);
			}
		}

		if ([] !== $results) {
			return match (strtoupper($operator)) {
				'AND'   => ! in_array(false, $results, true),
				'OR'    => in_array(true, $results, true),
				default => true
			};
		}

		return true;
	}

	/**
	 * Show the block if the condition is met.
	 */
	protected function checkIf(array $rule): bool
	{
		$condition = $rule['callback'] ?? null;

		return ! is_callable($condition) || boolval(call_user_func($condition));
	}

	/**
	 * Show the block if the attribute has a value.
	 */
	protected function checkIfAttribute(array $rule, array $block, WP_Block $instance): bool
	{
		return isset($rule['attribute']) && ! empty($instance->attributes[$rule['attribute']]);
	}

	/**
	 * Show the block unless the condition is met.
	 */
	protected function checkUnless(array $rule): bool
	{
		$condition = $rule['callback'] ?? null;

		return ! is_callable($condition) || ! boolval(call_user_func($condition));
	}

	/**
	 * Show the block if the user matches.
	 */
	protected function checkUser(array $rule): bool
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
