<?php

/**
 * Editor class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Defines block editor settings while in development mode.
 */
class Editor implements Bootable
{
	use Hookable;

	/**
	 * Enables features that are disabled for production installs.
	 *
	 * @since 1.0.0
	 */
	#[Filter('block_editor_settings_all', 'last')]
	public function registerSettings(array $settings): array
	{
		$settings['fontLibraryEnabled'] = true;

		return $settings;
	}
}
