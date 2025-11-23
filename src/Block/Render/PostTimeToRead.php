<?php

/**
 * Post Time To Read Block class.
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
 * Filters settings and rendered output for the `core/post-time-to-read` block.
 */
class PostTimeToRead extends RendersBlock
{
	protected const BLOCK_TYPE = 'core/post-time-to-read';

	/**
	 * Adds a display mode class to the block so that it can be styled based
	 * on what it is showing.
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
	{
		$mode = $block['attrs']['displayMode'] ?? 'time';

		$processor = new WP_HTML_Tag_Processor($content);
		$processor->next_tag();
		$processor->add_class(sprintf('display-mode-%s', $mode));

		return $processor->get_updated_html();
	}
}
