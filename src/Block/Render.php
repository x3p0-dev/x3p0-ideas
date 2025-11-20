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
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Handles filters on block render.
 */
class Render implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 */
	public function __construct(
		protected Rules $rules,
		protected HtmlAttributes $html_attributes
	) {}

	/**
	 * Filters block content, determining if it should be shown according to
	 * any rules passed in via attributes.
	 */
	#[Filter('render_block', 'last')]
	public function renderByRule(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		return $this->rules->isPublic($block, $instance) ? $content : '';
	}

	/**
	 * Filters block HTML, adding custom attributes defined as block metadata.
	 */
	#[Filter('render_block', 'last')]
	public function renderHtmlAttributes(
		string $content,
		array $block
	): string {
		return $this->html_attributes->processAttributes($content, $block);
	}
}
