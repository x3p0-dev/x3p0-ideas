<?php

/**
 * Rule factory.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2009-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-breadcrumbs
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Rule;

/**
 * Factory class for making rule objects.
 */
final class RuleFactory
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(private readonly RuleRegistry $ruleRegistry)
	{}

	/**
	 * Creates an instance of a rule object.
	 */
	public function make(string $key): ?Rule
	{
		if ($rule = $this->ruleRegistry->get($key)) {
			return new $rule();
		}

		return null;
	}
}
