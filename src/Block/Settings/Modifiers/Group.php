<?php

/**
 * Group settings modifier.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Group implements SettingsModifier
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
