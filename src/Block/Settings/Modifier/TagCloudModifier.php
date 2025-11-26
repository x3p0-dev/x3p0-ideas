<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class TagCloudModifier extends Modifier
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
