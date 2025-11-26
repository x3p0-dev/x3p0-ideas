<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class CommentContentModifier extends Modifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['layout'] ??= true;

		$settings['supports']['spacing']             ??= [];
		$settings['supports']['spacing']['blockGap'] ??= true;

		return $settings;
	}
}
