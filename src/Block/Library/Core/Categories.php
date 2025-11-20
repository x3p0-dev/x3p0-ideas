<?php

/**
 * Categories Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Support\Hooks\{Filter, Hookable};

/**
 * Filters settings and rendered output for the `core/categories` block.
 */
class Categories implements Bootable
{
	use Hookable;

	/**
	 * Adds color support to the Categories block.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/categories' === $settings['name']) {
			$settings['supports']['color']              ??= [];
			$settings['supports']['color']['gradients'] ??= true;
			$settings['supports']['color']['link']      ??= true;
		}

		return $settings;
	}
}
