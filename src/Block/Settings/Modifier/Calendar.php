<?php

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Calendar extends SettingsModifier
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
