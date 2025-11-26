<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class FileModifier extends Modifier
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
