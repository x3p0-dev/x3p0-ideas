<?php

/**
 * Navigation Submenu Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Filters settings and rendered output for the `core/navigation-submenu` block.
 */
class NavigationSubmenu implements Bootable
{
	use Hookable;

	/**
	 * Boots the component, running its actions/filters.
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters the Navigation Submenu block args to set custom selectors via
	 * the Selectors API. We must do this so that values set in `theme.json`
	 * for `core/navigation-submenu` are applied only to the submenu
	 * container. Without this, the values are set to both the container
	 * and the parent menu item.
	 *
	 * @link https://developer.wordpress.org/block-editor/reference-guides/block-api/block-selectors/
	 * @link https://github.com/WordPress/gutenberg/issues/39392
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/navigation-submenu' !== $settings['name']) {
			return $settings;
		}

		$selectors = [
			// Target the submenu and the responsive container.
			'root'       => '.wp-block-navigation__submenu-container, .wp-block-navigation__responsive-container.is-menu-open',
			'color'      => '.wp-block-navigation__submenu-container, .wp-block-navigation__responsive-container.is-menu-open',
			// Only target the submenu.
			'border'     => '.wp-block-navigation__submenu-container',
			'spacing'    => '.wp-block-navigation__submenu-container',
			'typography' => '.wp-block-navigation__submenu-container'
		];

		return [ 'selectors' => $selectors ] + $settings;
	}
}
