<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class File implements SettingsModifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['color'] ??= [];
		$settings['supports']['color']['button'] ??= true;

		$settings['supports']['color']['__experimentalDefaultControls'] ??= [];
		$settings['supports']['color']['__experimentalDefaultControls']['button'] = true;

		return $settings;
	}
}
