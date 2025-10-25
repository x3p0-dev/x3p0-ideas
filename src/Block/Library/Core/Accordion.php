<?php

/**
 * Accordion Block class.
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
 * Filters settings and rendered output for the `core/accordion` block.
 */
class Accordion implements Bootable
{
	use Hookable;

	/**
	 * Adds a caption class and replaces nav arrows.
	 */
	#[Filter('render_block_core/accordion')]
	public function render(string $content, $block): string
	{
		if (
			isset($block['attrs']['className'])
			&& str_contains($block['attrs']['className'], 'is-faqs')
		) {
			return $this->renderFaqSchema($content);
		}

		return $content;
	}

	/**
	 * Adds FAQ schema microdata when the Accordion block has the `.is-faqs`
	 * class added to it.
	 */
	private function renderFaqSchema(string $content): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		if (! $processor->next_tag([ 'class_name' => 'is-faqs' ])) {
			return $processor->get_updated_html();
		}

		$processor->set_attribute('itemscope', true);
		$processor->set_attribute('itemtype', 'https://schema.org/FAQPage');

		while ($processor->next_tag([ 'class_name' => 'wp-block-accordion-item' ])) {
			$processor->set_attribute('itemscope', true);
			$processor->set_attribute('itemprop', 'mainEntity');
			$processor->set_attribute('itemtype', 'https://schema.org/Question');

			if ($processor->next_tag([ 'class_name' => 'wp-block-accordion-heading__toggle-title' ])) {
				$processor->set_attribute('itemprop', 'name');
			}

			if ($processor->next_tag([ 'class_name' => 'wp-block-accordion-panel' ])) {
				$processor->set_attribute('itemscope', true);
				$processor->set_attribute('itemprop', 'acceptedAnswer');
				$processor->set_attribute('itemtype', 'https://schema.org/Answer');

				if ($processor->next_tag('p')) {
					$processor->set_attribute('itemprop', 'text');
				}
			}
		}

		return $processor->get_updated_html();
	}
}
