<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class QueryModifier extends Modifier
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
