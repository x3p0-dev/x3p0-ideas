<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Query implements SettingsModifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['spacing']             ??= [];
		$settings['supports']['spacing']['blockGap'] ??= true;
		$settings['supports']['spacing']['padding']  ??= true;

		return $settings;
	}
}
