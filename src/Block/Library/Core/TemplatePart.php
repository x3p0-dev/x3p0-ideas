<?php

/**
 * Template Part Block class.
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
 * Filters settings and rendered output for the `core/template-part` block.
 */
class TemplatePart implements Bootable
{
	use Hookable;

	/**
	 * Boots the component, running its actions/filters.
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * This filter first disables the Comments template part when there are
	 * no comments and commenting is disabled. Then, it adds a contextual
	 * class to the wrapping template part markup with the slug name (e.g.,
	 * `.wp-block-template-part-{slug}`).
	 */
	#[Filter('render_block_core/template-part')]
	public function render(string $content, array $block): string
	{
		if (
			isset($block['attrs']['slug'])
			&& 'comments' === $block['attrs']['slug']
			&& ! comments_open()
			&& 0 === absint(get_comments_number())
		) {
			return '';
		}

		$processor = new WP_HTML_Tag_Processor($content);

		if ($processor->next_tag(['class_name' => 'wp-block-template-part'])) {
			$processor->add_class(sprintf(
				'wp-block-template-part-%s',
				$block['attrs']['slug'] ?? 'unknown'
			));
		}

		return $processor->get_updated_html();
	}
}
