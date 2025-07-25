<?php

/**
 * The Audio class handles filters related to the `core/audio` block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class Audio implements Bootable
{
	use Hookable;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters the Video block args to set custom selectors via the
	 * Selectors API. The implementation sets borders and shadows to the
	 * media element itself.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/pull/53007
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/audio' === $settings['name']) {
			$settings['selectors']['border'] = '.wp-block-audio audio';
			$settings['selectors']['shadow'] = '.wp-block-audio audio';
		}

		return $settings;
	}
}
