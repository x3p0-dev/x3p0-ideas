<?php

/**
 * Heading settings modifier.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class Heading implements SettingsModifier
{
	/**
	 * @inheritDoc
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['background']                    ??= [];
		$settings['supports']['background']['backgroundImage'] ??= true;
		$settings['supports']['background']['backgroundSize']  ??= true;

		return $settings;
	}
}
