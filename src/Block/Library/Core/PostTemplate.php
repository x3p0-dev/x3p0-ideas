<?php

/**
 * Post Template Block class.
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
 * Filters settings and rendered output for the `core/post-template` block.
 */
class PostTemplate implements Bootable
{
	use Hookable;

	/**
	 * Adds border and spacing support to the Post Template block.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/post-template' === $settings['name']) {
			$settings['supports']['__experimentalBorder']           ??= [];
			$settings['supports']['__experimentalBorder']['color']  ??= true;
			$settings['supports']['__experimentalBorder']['radius'] ??= true;
			$settings['supports']['__experimentalBorder']['style']  ??= true;
			$settings['supports']['__experimentalBorder']['width']  ??= true;

			$settings['supports']['spacing']            ??= [];
			$settings['supports']['spacing']['padding'] ??= true;
		}

		return $settings;
	}
}
