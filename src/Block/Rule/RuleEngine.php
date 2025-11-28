<?php

/**
 * Rule Engine class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

use WP_Block;
use X3P0\Ideas\Block\Support\Metadata;

/**
 * Block rules are instructions for how to handle the front-end output of a
 * block. This is done via a limited set of rules that conditionally decide
 * whether the block should be public (should be shown) or not. This could
 * potentially be expanded to include other instructions for how to handle
 * blocks, but the primary goal is conditional inclusion. This class doesn't
 * actually alter blocks in any way. It simply gets a block's attributes to
 * perform checks.
 */
final class RuleEngine
{
	use Metadata;

	/**
	 * Metadata key to check for block rules.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const METADATA_KEY = 'x3p0/rules';

	/**
	 * Sets up the initial object state.
	 */
	public function __construct(private readonly RuleRepository $ruleRepository)
	{}

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
			if (
				isset($rule['type'])
				&& $ruleType = $this->ruleRepository->find($rule['type'])
			) {
				$results[] = $ruleType->matches($rule, $block, $instance);
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
}
