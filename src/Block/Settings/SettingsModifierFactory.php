<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

use X3P0\Ideas\Block\Settings\Modifier\Modifier;

final class SettingsModifierFactory
{
	public function __construct(private readonly SettingsModifierRegistry $registry)
	{}

	public function make(string $blockName): ?Modifier
	{
		if ($modifier = $this->registry->get($blockName)) {
			return new $modifier();
		}

		return null;
	}
}
