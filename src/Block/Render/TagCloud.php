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

namespace X3P0\Ideas\Block\Render;

use WP_Block;
use WP_HTML_Tag_Processor;

/**
 * Filters settings and rendered output for the `core/tag-cloud` block.
 */
class TagCloud extends RendersBlock
{
	protected const BLOCK_TYPE = 'core/tag-cloud';

	/**
	 * WordPress doesn't add the taxonomy name to the tag cloud wrapper. In
	 * order for taxonomy-based block styles to work, the theme is adding
	 * a `.taxonomy-{taxonomy}` class to the wrapper.
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
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
