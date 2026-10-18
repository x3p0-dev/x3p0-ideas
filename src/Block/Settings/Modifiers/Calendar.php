<?php

/**
 * Calendar settings modifier.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Calendar implements SettingsModifier
{
	/**
	 * {@inheritDoc}
	 *
	 * Filters the Calendar block args to set custom selectors via the
	 * Selectors API. This ensures that styles are applied to the correct
	 * elements within the block and nested table. Also re-adds the classes
	 * to the outer block wrapper.
	 */
	public function modify(array $settings): array
	{
		if (isset($settings['supports']['color']['__experimentalSkipSerialization'])) {
			unset($settings['supports']['color']['__experimentalSkipSerialization']);
		}

		return [
			...$settings,
			'selectors' => [
				...($settings['selectors'] ?? []),
				'root' => '.wp-block-calendar'
			]
		];
	}
}
