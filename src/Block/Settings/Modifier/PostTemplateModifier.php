<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class PostTemplateModifier extends Modifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['__experimentalBorder']           ??= [];
		$settings['supports']['__experimentalBorder']['color']  ??= true;
		$settings['supports']['__experimentalBorder']['radius'] ??= true;
		$settings['supports']['__experimentalBorder']['style']  ??= true;
		$settings['supports']['__experimentalBorder']['width']  ??= true;

		$settings['supports']['spacing']            ??= [];
		$settings['supports']['spacing']['padding'] ??= true;

		return $settings;
	}
}
