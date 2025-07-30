<?php

/**
 * Cover Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use WP_HTML_Tag_Processor;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Filters settings and rendered output for the `core/cover` block.
 */
class Cover implements Bootable
{
	use Hookable;

	/**
	 * Adds more color support to the Cover block.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/cover' === $settings['name']) {
			$settings['supports']['color']               ??= [];
			$settings['supports']['color']['background']   = true;
			$settings['supports']['color']['button']       = true;
			$settings['supports']['color']['link']         = true;
		}

		return $settings;
	}

	/**
	 * Adds poster support for the Cover block by using the attachment's
	 * featured image if it exists.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/18962
	 */
	#[Filter('render_block_core/cover')]
	public function render(string $content, array $block): string
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
