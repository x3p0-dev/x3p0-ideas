<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

class File extends SettingsModifier
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
