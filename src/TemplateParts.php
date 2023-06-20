<?php
/**
 * The Block Template Parts class is responsible for housing any custom code
 * related to template parts.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class TemplateParts implements Bootable
{
	use HookAnnotation;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filter the core template part areas to add custom areas needed for
	 * the theme.
	 *
	 * @hook  default_wp_template_part_areas
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/default_wp_template_part_areas/
	 */
	public function filterAreas( array $default_area_definitions ): array
	{
		$default_area_definitions[] = [
			'area'        => 'comments',
			'area_tag'    => 'section',
			'label'       => __( 'Comments', 'x3p0-ideas' ),
			'description' => __( 'The Comments template defines a page area that typically contains the post comments list and form.', 'x3p0-ideas' ),
			// Core only supports four icons at the moment, so this
			// one doesn't actually appear. But the value must be
			// defined to avoid an error.
			// @link https://github.com/WordPress/gutenberg/issues/36814
			'icon'        => 'comments'
		];

		return $default_area_definitions;
	}
}
