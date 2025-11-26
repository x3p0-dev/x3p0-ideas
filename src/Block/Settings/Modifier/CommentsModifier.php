<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class CommentsModifier extends Modifier
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
