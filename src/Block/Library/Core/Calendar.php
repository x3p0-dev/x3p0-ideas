<?php

/**
 * The Calendar class handles filters related to the `core/calendar` block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use WP_HTML_Tag_Processor;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class Calendar implements Bootable
{
	use Hookable;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters the Calendar block args to set custom selectors via the
	 * Selectors API. This ensures that styles are applied to the correct
	 * elements within the block and nested table. Also re-adds the classes
	 * to the outer block wrapper.
	 *
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/block-editor/reference-guides/block-api/block-selectors/
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/calendar' !== $settings['name']) {
			return $settings;
		}

		if (isset($settings['supports']['color']['__experimentalSkipSerialization'])) {
			unset($settings['supports']['color']['__experimentalSkipSerialization']);
		}

		return [ 'selectors' => [
				'root' => '.wp-block-calendar'
			] ] + $settings;
	}

	/**
	 * Adds a caption class and replaces nav arrows.
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block_core/calendar')]
	public function render(string $content): string
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
