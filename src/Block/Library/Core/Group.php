<?php

/**
 * Group Block class.
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
 * Filters settings and rendered output for the `core/group` block.
 */
class Group implements Bootable
{
	use Hookable;

	/**
	 * Adds `textAlign` support for the Group block. This is needed to align
	 * sub-blocks (e.g., Heading, Paragraph) in one swoop rather than
	 * aligning them individually.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/group' === $settings['name']) {
			$settings['supports']['typography']              ??= [];
			$settings['supports']['typography']['textAlign'] ??= true;
		}

		return $settings;
	}
}
