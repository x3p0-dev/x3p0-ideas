<?php

/**
 * Cover block render filter.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render\Filters;

use WP_Block;
use WP_HTML_Tag_Processor;
use X3P0\Ideas\Block\Render\RenderFilter;

/**
 * Filters rendered output for the `core/cover` block.
 */
final class Cover extends RenderFilter
{
	protected const BLOCK_TYPE = 'core/cover';

	/**
	 * Adds poster support for the Cover block by using the attachment's
	 * featured image if it exists.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/18962
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
	{
		if (
			! isset($block['attrs']['backgroundType'])
			|| 'video' !== $block['attrs']['backgroundType']
			|| ! isset($block['attrs']['id'])
			|| ! $poster = get_the_post_thumbnail_url($block['attrs']['id'], 'full')
		) {
			return $content;
		}

		$processor = new WP_HTML_Tag_Processor($content);

		if (
			$processor->next_tag('video')
			&& is_null($processor->get_attribute('poster'))
		) {
			$processor->set_attribute('poster', $poster);
		}

		return $processor->get_updated_html();
	}
}
