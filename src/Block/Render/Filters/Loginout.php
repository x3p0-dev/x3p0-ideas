<?php

/**
 * Login/out Block class.
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
 * Filters settings and rendered output for the `core/loginout` block.
 */
final class Loginout extends RenderFilter
{
	protected const BLOCK_TYPE = 'core/loginout';

	/**
	 * Adds the `.wp-element-button` class to the login form's submit button.
	 * This is currently missing from core WP.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/50466
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
	{
		if (
			empty($block['attrs']['displayLoginAsForm'])
			|| is_user_logged_in()
		) {
			return $content;
		}

		$processor = new WP_HTML_Tag_Processor($content);

		// Specifically look for `<input name="wp-submit"/>` and add the
		// `.wp-element-button` class to it.
		while ($processor->next_tag()) {
			if (
				'INPUT' === $processor->get_tag()
				&& 'wp-submit' === $processor->get_attribute('name')
			) {
				$processor->add_class(wp_theme_get_element_class_name('button'));
				break;
			}
		}

		return $processor->get_updated_html();
	}
}
