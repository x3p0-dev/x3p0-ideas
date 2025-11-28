<?php

/**
 * Block visibility middleware.
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
 * Middleware component that intercepts block rendering to conditionally control
 * visibility based on defined rules. Hooks into WordPress's block render pipeline
 * and evaluates blocks against a rule engine to determine whether they should be
 * displayed to the current user/context.
 *
 * This middleware acts as a gatekeeper in the rendering process, hiding blocks
 * that don't meet their visibility criteria while allowing compliant blocks to
 * render normally.
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
