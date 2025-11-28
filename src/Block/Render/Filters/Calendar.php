<?php

/**
 * Calendar block render filter.
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
 * Filters rendered output for the `core/calendar` block.
 */
final class Calendar extends RenderFilter
{
	protected const BLOCK_TYPE = 'core/calendar';

	/**
	 * Adds a caption class and replaces nav arrows.
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		// Ensures the table caption has the same class as other the
		// other captions in WordPress. The `.wp-element-caption` class
		// is necessary for styling this via `theme.json`.
		if ($processor->next_tag('caption')) {
			$processor->add_class(wp_theme_get_element_class_name('caption'));
		}

		// Hacky method to replace the arrows until the HTML API allows
		// replacing inner text.
		return str_replace(
			[ '&raquo;', '&laquo;' ],
			[ '&rarr;',  '&larr;'  ],
			$processor->get_updated_html()
		);
	}
}
