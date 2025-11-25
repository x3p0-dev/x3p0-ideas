<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Group extends SettingsModifier
{
	/**
	 * {@inheritDoc}
	 *
	 * Adds `textAlign` support for the Group block. This is needed to align
	 * sub-blocks (e.g., Heading, Paragraph) in one swoop rather than
	 * aligning them individually.
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['typography']              ??= [];
		$settings['supports']['typography']['textAlign'] ??= true;

		return $settings;
	}
}
