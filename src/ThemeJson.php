<?php

/**
 * The Theme JSON class adds custom filters to `theme.json` data.
 *
 * Note that we can't use proper type hinting on the `theme.json` data filters
 * because the Gutenberg plugin doesn't extend `WP_Theme_JSON_Data` and WP
 * doesn't implement proper interfaces or enforce the types noted in its PHPDoc.
 * What we actually get is up in the air, but that's WordPress for you.
 * Generally, what will be passed will either be `WP_Theme_JSON_Data` or
 * `WP_Theme_JSON_Data_Gutenberg`. We could use a union type here when the
 * theme has a minimum requirement of PHP 8.0, but---quite frankly---I don't
 * trust that this won't change. Regardless, the code will expect the public
 * properties and methods of `WP_Theme_JSON_Data`.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Theme_JSON_Data;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class ThemeJson implements Bootable
{
	use HookAnnotation;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Removes the core font-sizes entirely from the being rendered. We're
	 * handling the fallbacks for this via CSS.
	 *
	 * These were merged (and put at the top) of the font-size picker in
	 * Gutenberg 16.9 with no `theme.json`-method of disabling them. In the
	 * past, if a theme defined a set of custom sizes, these were not shown.
	 * @link https://github.com/WordPress/gutenberg/issues/55744
	 *
	 * Gutenberg 17.6 added the `defaultFontSizes` prop:
	 * @link https://github.com/WordPress/gutenberg/pull/56661
	 *
	 * @todo Remove above notes with WordPress 6.5+ min. requirement.
	 *
	 * @hook  wp_theme_json_data_default
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 */
	public function filterDefaultData(object $theme_json): object
	{
		$data = [
			'version'  => 2,
			'settings' => [
				'typography' => [
					'fontSizes' => []
				]
			]
		];

		return $theme_json->update_with($data);
	}
}
