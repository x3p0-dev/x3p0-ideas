<?php

/**
 * Template part area registrar.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Template;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Registers template part areas.
 */
final class TemplatePartAreaRegistrar implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('default_wp_template_part_areas', $this->register(...));
	}

	/**
	 * Filter the core template part areas to add custom areas needed for
	 * the theme.
	 *
	 * Core only supports four icons at the moment, so the `icon` field
	 * value doesn't actually work. But the value must be defined to avoid
	 * an error.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/36814
	 * @link https://developer.wordpress.org/reference/hooks/default_wp_template_part_areas/
	 */
	private function register(array $areas): array
	{
		return [
			...$areas,
			[
				'area'        => 'archive-header',
				'area_tag'    => 'header',
				'label'       => __('Archive Header', 'x3p0-ideas'),
				'description' => __('The Archive Header template part defines an area that contains the archive title and description for archive-type pages.', 'x3p0-ideas'),
				'icon'        => 'layout'
			],
			[
				'area'        => 'author-header',
				'area_tag'    => 'header',
				'label'       => __('Author Header', 'x3p0-ideas'),
				'description' => __('The Author Header template part defines an area that contains the author name and biography for author archives.', 'x3p0-ideas'),
				'icon'        => 'layout'
			],
			[
				'area'        => 'comments',
				'area_tag'    => 'section',
				'label'       => __('Comments', 'x3p0-ideas'),
				'description' => __('The Comments template part defines an area that contains the comments list and form.', 'x3p0-ideas'),
				'icon'        => 'layout'
			],
			[
				'area'        => 'loop',
				'area_tag'    => 'div',
				'label'       => __('Loop', 'x3p0-ideas'),
				'description' => __('The Loop template part defines an area that contains the post list on blog, search results, and other archive-type pages.', 'x3p0-ideas'),
				'icon'        => 'layout'
			],
			[
				'area'        => 'search-header',
				'area_tag'    => 'header',
				'label'       => __('Search Header', 'x3p0-ideas'),
				'description' => __('The Search Header template part defines an area that contains the search title and description for search results.', 'x3p0-ideas'),
				'icon'        => 'layout'
			],
			[
				'area'        => 'taxonomy-header',
				'area_tag'    => 'header',
				'label'       => __('Taxonomy Header', 'x3p0-ideas'),
				'description' => __('The Taxonomy Header template part defines an area that contains the taxonomy term and description for taxonomy term archives.', 'x3p0-ideas'),
				'icon'        => 'layout'
			]
		];
	}
}
