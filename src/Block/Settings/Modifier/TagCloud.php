<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class TagCloud extends SettingsModifier
{
	public function modify(array $settings): array
	{
		$settings['supports']['color']              ??= [];
		$settings['supports']['color']['gradients'] ??= true;
		$settings['supports']['color']['link']      ??= true;

		$settings['supports']['typography']             ??= [];
		$settings['supports']['typography']['fontSize']   = true;

		return $settings;
	}
}
