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

use X3P0\Ideas\Block\Support\HtmlAttributes;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles filters on block render.
 */
final class InjectAttributes implements Bootable
{
	/**
	 * Sets up the object state.
	 */
	public function __construct(private readonly HtmlAttributes $htmlAttributes) {}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('render_block', $this->renderHtmlAttributes(...), 999999, 2);
	}

	/**
	 * Filters block HTML, adding custom attributes defined as block metadata.
	 */
	private function renderHtmlAttributes(string $content, array $block): string
	{
		return $this->htmlAttributes->processAttributes($content, $block);
	}
}
