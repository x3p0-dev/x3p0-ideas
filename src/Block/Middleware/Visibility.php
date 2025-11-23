<?php

/**
 * Block Render class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Middleware;

use WP_Block;
use X3P0\Ideas\Block\Rule\RuleEngine;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles filters on block render.
 */
final class Visibility implements Bootable
{
	/**
	 * Sets up the object state.
	 */
	public function __construct(private readonly RuleEngine $ruleEngine)
	{}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('render_block', $this->renderByRule(...), 999999, 3);
	}

	/**
	 * Filters block content, determining if it should be shown according to
	 * any rules passed in via attributes.
	 */
	private function renderByRule(string $content, array $block, WP_Block $instance): string
	{
		return $this->ruleEngine->isPublic($block, $instance) ? $content : '';
	}
}
