<?php

/**
 * Style variation tester.
 *
 * Style variations in WordPress can only be tested by going to the site editor
 * and selecting a variation. Once a variation is selected, the settings are
 * stored in the database as custom global styles at the user level. This is
 * problematic in development because it means that any changes that you make
 * to the variation's JSON file are not reflected on the front end. The "user"
 * settings are used instead. The only way to test at this point is to reset the
 * styles in the site editor.
 *
 * This class was developed to quickly test variations without: 1) selecting a
 * variation at all and 2) needing to reset styles if a variation is currently
 * stored as user styles.
 *
 * To test, simply pass the variation slug(s) into the constructor and boot. If
 * the slug isn't set, no test will be run.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

use WP_Theme_JSON_Data;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class StyleVariations implements Bootable
{
	use Hookable;

	/**
	 * Mappings for short variation names.
	 *
	 * @since 1.0.0
	 * @todo  Add type hinting with PHP 8.3+ requirement.
	 */
	private const SHORT_NAMES = [
		'bookish'  => 'a-little-bit-bookish',
		'chestnut' => 'chestnut-rose'
	];

	/**
	 * Set up the object's initial state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(protected Config $config)
	{}

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
	 * Filters the data at the user level in case something is saved in the
	 * database already. We want the front end to use the variation passed
	 * into the constructor.
	 *
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_data_user/
	 */
	#[Filter('wp_theme_json_data_user', 'first')]
	public function setThemeStyle(object $theme_json): object
	{
		$data = $this->getVariationData('theme');

		return ! is_null($data)
			? new WP_Theme_JSON_Data($data, 'user')
			: $theme_json;
	}

	/**
	 * Filters color variation.
	 *
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_data_user/
	 */
	#[Filter('wp_theme_json_data_user', 'first')]
	public function setColorStyle(object $theme_json): object
	{
		$data = $this->getVariationData('color');

		return ! is_null($data)
			? $theme_json->update_with($data)
			: $theme_json;
	}

	/**
	 * Filters typography variation.
	 *
	 * @param WP_Theme_JSON_Data  The Gutenberg plugin breaks this.
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/wp_theme_json_data_user/
	 */
	#[Filter('wp_theme_json_data_user', 'first')]
	public function setTypographyStyle(object $theme_json): object
	{
		$data = $this->getVariationData('typography');

		return ! is_null($data)
			? $theme_json->update_with($data)
			: $theme_json;
	}

	/**
	 * Returns a variation's data based on type (`theme`, `color`, or
	 * `typography`) or `null`.
	 *
	 * @since 1.0.0
	 */
	protected function getVariationData(string $type): ?array
	{
		$variation = (string) $this->config->get($type);

		if ('' === $variation) {
			return null;
		}

		if (isset(self::SHORT_NAMES[$variation])) {
			$variation = self::SHORT_NAMES[$variation];
		}

		$filename = $this->getFilename($type, $variation);

		return is_readable($filename)
			? wp_json_file_decode($filename, [ 'associative' => true ])
			: null;
	}

	/**
	 * Returns the variation's JSON filename and path or an empty string if
	 * not found or unreadable.
	 *
	 * @since 1.0.0
	 */
	protected function getFilename(string $type, string $variation): string
	{
		if ('' === $variation) {
			return '';
		}

		if (file_exists(get_theme_file_path("styles/{$type}/{$variation}.json"))) {
			return get_theme_file_path("styles/{$type}/{$variation}.json");
		}

		return get_theme_file_path("experiments/styles/{$type}/experiment-{$variation}.json");
	}
}
