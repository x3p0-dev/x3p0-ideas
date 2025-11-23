<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

use X3P0\Ideas\Block\Settings\SettingsModifier;

class NavigationSubmenu extends SettingsModifier
{
	/**
	 * {@inheritDoc}
	 *
	 * Filters the Navigation Submenu block args to set custom selectors via
	 * the Selectors API. We must do this so that values set in `theme.json`
	 * for `core/navigation-submenu` are applied only to the submenu
	 * container. Without this, the values are set to both the container
	 * and the parent menu item.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/39392
	 */
	public function modify(array $settings): array
	{
		$selectors = [
			// Target the submenu and the responsive container.
			'root'       => '.wp-block-navigation__submenu-container, .wp-block-navigation__responsive-container.is-menu-open',
			'color'      => '.wp-block-navigation__submenu-container, .wp-block-navigation__responsive-container.is-menu-open',
			// Only target the submenu.
			'border'     => '.wp-block-navigation__submenu-container',
			'spacing'    => '.wp-block-navigation__submenu-container',
			'typography' => '.wp-block-navigation__submenu-container'
		];

		return [
			...$settings,
			'selectors' => [
				...($settings['selectors'] ?? []),
				...$selectors
			]
		];
	}
}
