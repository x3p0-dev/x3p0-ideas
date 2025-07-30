<?php

/**
 * Avatar block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Filters settings and rendered output for the `core/avatar` block.
 */
class Avatar implements Bootable
{
	use Hookable;

	/**
	 * Filters the Avatar block args to set custom selectors via the
	 * Selectors API. Originally, Core set the border to the wrapping `<div>`
	 * for around the image. This was fixed by applying the border to the
	 * image itself. But that has the unfortunate side effect of link
	 * outlines not being sharing the same radius. So we fix this in CSS.
	 *
	 * @link https://github.com/WordPress/gutenberg/pull/53007
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/avatar' === $settings['name']) {
			$settings['selectors']['border'] = '.wp-block-avatar';
		}

		return $settings;
	}
}
