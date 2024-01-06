<?php
/**
 * The Templates class is responsible for housing any custom code related to
 * block templates.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Helpers;
use X3P0\Ideas\Tools\HookAnnotation;

class Templates implements Bootable
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
	 * Filter the core template types.
	 *
	 * @hook  default_template_types
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/default_template_types/
	 * @todo  Register missing core templates.
	 */
	public function defaultTemplateTypes( array $default_template_types ): array
	{
		// Registers custom template titles for the core templates.
		$template_titles = [
			'404'        => _x( 'Error 404',        'Template name', 'x3p0-ideas' ),
			'archive'    => _x( 'Archive',          'Template name', 'x3p0-ideas' ),
			'attachment' => _x( 'Media',            'Template name', 'x3p0-ideas' ),
			'author'     => _x( 'Author Archive',   'Template name', 'x3p0-ideas' ),
			'category'   => _x( 'Category Archive', 'Template name', 'x3p0-ideas' ),
			'date'       => _x( 'Date Archive',     'Template name', 'x3p0-ideas' ),
			'home'       => _x( 'Blog',             'Template name', 'x3p0-ideas' ),
			'page'       => _x( 'Single Page',      'Template name', 'x3p0-ideas' ),
			'single'     => _x( 'Single Post',      'Template name', 'x3p0-ideas' ),
			'singular'   => _x( 'Single Entry',     'Template name', 'x3p0-ideas' ),
			'tag'        => _x( 'Tag Archive',      'Template name', 'x3p0-ideas' ),
			'taxonomy'   => _x( 'Term Archive',     'Template name', 'x3p0-ideas' ),
		];

		foreach ( $template_titles as $template => $title ) {
			if ( isset( $default_template_types[ $template ] ) ) {
				$default_template_types[ $template ]['title'] = $title;
			}
		}

		return $default_template_types;
	}

	/**
	 * Filter the body class.
	 *
	 * @hook  body_class
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/body_class/
	 */
	public function bodyClass( array $classes ): array
	{
		if ( Helpers::isPagedQueryBlock() && ! in_array( 'paged', $classes ) ) {
			$classes[] = 'paged';
		}

		return $classes;
	}
}
