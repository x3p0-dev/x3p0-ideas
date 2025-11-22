<?php

/**
 * Editor settings class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Editor;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Configures editor settings.
 */
final class EditorSettings implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('block_editor_settings_all', $this->settings(...), 999999);
	}

	/**
	 * Customizes the block editor settings.
	 */
	private function settings(array $settings): array
	{
		$settings['imageDefaultSize']   = 'x3p0-wide';
		$settings['fontLibraryEnabled'] = false;

		return $settings;
	}
}
