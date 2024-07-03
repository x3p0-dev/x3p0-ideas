<?php

/**
 * The Language class includes helper methods related to language and i18n.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2022-2024, Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools;

class Language
{
	/**
	 * Returns lorem ipsum text for use in patterns as placeholder text.
	 *
	 * @since 1.0.0
	 */
	public static function loremIpsum(int $words = 25): string
	{
		return wp_trim_words(
			// Translators: This is placeholder text used in patterns.
			__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pharetra eget neque ut consequat. Nunc odio sem, finibus malesuada sagittis vitae, euismod at ante. Sed quis suscipit quam, sit amet interdum ligula.', 'x3p0-ideas'),
			$words
		);
	}
}
