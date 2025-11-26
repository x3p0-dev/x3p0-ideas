<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

final class SettingsModifierFactory
{
	public function __construct(private readonly SettingsModifierRegistry $registry)
	{}

	public function make(string $blockName): ?SettingsModifier
	{
		if ($modifier = $this->registry->get($blockName)) {
			return new $modifier();
		}

		return null;
	}
}
