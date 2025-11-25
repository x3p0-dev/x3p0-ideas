<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Comments extends SettingsModifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['align']   ??= [];
		$settings['supports']['align'][]   = 'wide';
		$settings['supports']['align'][]   = 'full';

		$settings['supports']['layout'] ??= true;

		return $settings;
	}
}
