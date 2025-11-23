<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

class Heading extends SettingsModifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['background']                    ??= [];
		$settings['supports']['background']['backgroundImage'] ??= true;
		$settings['supports']['background']['backgroundSize']  ??= true;

		return $settings;
	}
}
