<?php

/**
 * Avatar settings modifier.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Avatar implements SettingsModifier
{
	/**
	 * {@inheritDoc}
	 *
	 * Filters the Avatar block args to set custom selectors via the
	 * Selectors API. Originally, Core set the border to the wrapping `<div>`
	 * for around the image. This was fixed by applying the border to the
	 * image itself. But that has the unfortunate side effect of link
	 * outlines not being sharing the same radius. So we fix this in CSS.
	 *
	 * @link https://github.com/WordPress/gutenberg/pull/53007
	 */
	public function modify(array $settings): array
	{
		$settings['selectors']['border'] = '.wp-block-avatar';

		return $settings;
	}
}
