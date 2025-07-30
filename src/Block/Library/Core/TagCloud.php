<?php

/**
 * Tag Cloud Block class.
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
 * Filters settings and rendered output for the `core/tag-cloud` block.
 */
class TagCloud implements Bootable
{
	use Hookable;

	/**
	 * Adds color and typography support to the Tag Cloud block.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/tag-cloud' === $settings['name']) {
			$settings['supports']['color'] ??= [];
			$settings['supports']['color']['gradients'] ??= true;
			$settings['supports']['color']['link'] ??= true;

			$settings['supports']['typography'] ??= [];
			$settings['supports']['typography']['fontSize'] = true;
		}

		return $settings;
	}

	/**
	 * WordPress doesn't add the taxonomy name to the tag cloud wrapper. In
	 * order for taxonomy-based block styles to work, the theme is adding
	 * a `.taxonomy-{taxonomy}` class to the wrapper.
	 */
	#[Filter('render_block_core/tag-cloud')]
	public function render(string $content, array $block): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		if ($processor->next_tag('p')) {
			$processor->add_class(sprintf(
				'taxonomy-%s',
				$block['attrs']['taxonomy'] ?? 'post_tag'
			));
		}

		return $processor->get_updated_html();
	}
}
