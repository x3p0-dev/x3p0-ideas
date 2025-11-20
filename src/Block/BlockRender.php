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

namespace X3P0\Ideas\Block;

use WP_Block;
use X3P0\Ideas\Block\Support\HtmlAttributes;
use X3P0\Ideas\Block\Support\Rules;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles filters on block render.
 *
 * @todo All of the `render()` callbacks in `../Library/Core` need to be a part
 *       of a registry and all run from a centralized manager class.
 * @todo The filters in this file should be registered as separate filter classes
 *       since they have separate concerns.
 */
final class BlockRender implements Bootable
{
	/**
	 * Sets up the object state.
	 */
	public function __construct(
		private readonly Rules $rules,
		private readonly HtmlAttributes $htmlAttributes
	) {}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('render_block', $this->renderByRule(...), 999999, 3);
		add_filter('render_block', $this->renderHtmlAttributes(...), 999999, 2);
	}

	/**
	 * Filters block content, determining if it should be shown according to
	 * any rules passed in via attributes.
	 */
	private function renderByRule(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		return $this->rules->isPublic($block, $instance) ? $content : '';
	}

	/**
	 * Filters block HTML, adding custom attributes defined as block metadata.
	 */
	private function renderHtmlAttributes(string $content, array $block): string
	{
		return $this->htmlAttributes->processAttributes($content, $block);
	}
}
