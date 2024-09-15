<?php

/**
 * The Block Template Parts class is responsible for housing any custom code
 * related to template parts.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class Parts implements Bootable
{
	use Hookable;

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
	 * Filter the core template part areas to add custom areas needed for
	 * the theme.
	 *
	 * Core only supports four icons at the moment, so the `icon` field
	 * value doesn't actually work. But the value must be defined to avoid
	 * an error.
	 * @link https://github.com/WordPress/gutenberg/issues/36814
	 *
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/default_wp_template_part_areas/
	 */
	#[Filter('default_wp_template_part_areas')]
	public function registerAreas(array $areas): array
	{
		$areas[] = [
			'area'        => 'comments',
			'area_tag'    => 'section',
			'label'       => __('Comments', 'x3p0-ideas'),
			'description' => __('The Comments template part defines an area that contains the comments list and form.', 'x3p0-ideas'),
			'icon'        => 'layout'
		];

		$areas[] = [
			'area'        => 'archive-header',
			'area_tag'    => 'header',
			'label'       => __('Archive Header', 'x3p0-ideas'),
			'description' => __('The Archive Header template part defines an area that contains the archive title and description for archive-type pages.', 'x3p0-ideas'),
			'icon'        => 'layout'
		];

		$areas[] = [
			'area'        => 'author-header',
			'area_tag'    => 'header',
			'label'       => __('Author Header', 'x3p0-ideas'),
			'description' => __('The Archive Header template part defines an area that contains the archive title and description for archive-type pages.', 'x3p0-ideas'),
			'icon'        => 'layout'
		];

		$areas[] = [
			'area'        => 'search-header',
			'area_tag'    => 'header',
			'label'       => __('Search Header', 'x3p0-ideas'),
			'description' => __('The Archive Header template part defines an area that contains the archive title and description for archive-type pages.', 'x3p0-ideas'),
			'icon'        => 'layout'
		];

		$areas[] = [
			'area'        => 'loop',
			'area_tag'    => 'div',
			'label'       => __('Loop', 'x3p0-ideas'),
			'description' => __('The Loop template part defines an area that contains the post list on blog, search results, and other archive-type pages.', 'x3p0-ideas'),
			'icon'        => 'layout'
		];

		return $areas;
	}
}
