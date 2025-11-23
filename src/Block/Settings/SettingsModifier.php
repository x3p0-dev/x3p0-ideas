<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

/**
 * Abstract base class for block settings modifiers.
 */
abstract class SettingsModifier
{
	/**
	 * Modifies the block settings.
	 */
	abstract public function modify(array $settings): array;
}
