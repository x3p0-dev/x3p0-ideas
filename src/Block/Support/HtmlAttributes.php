<?php

/**
 * Block HTML attributes class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Support;

use WP_HTML_Tag_Processor;

/**
 * Lets you pass custom HTML attributes via the `x3p0/attr` block metadata to be
 * attached to the block markup on the front end. This is necessary for custom
 * attributes that would invalidate the block markup in the editor.
 */
class HtmlAttributes
{
	/**
	 * Metadata key to check in block attributes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const METADATA_KEY = 'x3p0/attr';

	/**
	 * Sets custom HTML attributes on the block wrapper element.
	 */
	public function setAttributes(
		string $content,
		array $block
	): string {
		if (
			empty($block['attrs']['metadata'][self::METADATA_KEY])
			|| ! is_array($block['attrs']['metadata'][self::METADATA_KEY])
		) {
			return $content;
		}

		$processor = new WP_HTML_Tag_Processor($content);
		$processor->next_tag();

		foreach ($block['attrs']['metadata'][self::METADATA_KEY] as $attr => $value) {
			$processor->set_attribute($attr, $value);
		}

		return $processor->get_updated_html();
	}
}
