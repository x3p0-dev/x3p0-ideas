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
use X3P0\Ideas\Tools\HookAnnotation;

class Templates implements Bootable
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
			'404'        => _x( '404',              'Template name', 'x3p0-ideas' ),
			'archive'    => _x( 'Archive',          'Template name', 'x3p0-ideas' ),
			'attachment' => _x( 'Media',            'Template name', 'x3p0-ideas' ),
			'author'     => _x( 'Author Archive',   'Template name', 'x3p0-ideas' ),
			'category'   => _x( 'Category Archive', 'Template name', 'x3p0-ideas' ),
			'date'       => _x( 'Date Archive',     'Template name', 'x3p0-ideas' ),
			'home'       => _x( 'Blog',             'Template name', 'x3p0-ideas' ),
			'page'       => _x( 'Page',             'Template name', 'x3p0-ideas' ),
			'single'     => _x( 'Single',           'Template name', 'x3p0-ideas' ),
			'singular'   => _x( 'Singular',         'Template name', 'x3p0-ideas' ),
			'tag'        => _x( 'Tag Archive',      'Template name', 'x3p0-ideas' ),
			'taxonomy'   => _x( 'Term Archive',     'Template name', 'x3p0-ideas' ),
		];

		foreach ( $template_titles as $template => $title ) {
			if ( isset( $default_template_types[ $template ] ) ) {
				$default_template_types[ $template ]['title'] = $title;
			}
		}

		// Core doesn't yet support descriptions for custom template
		// types, so we must register them via PHP. The downside is that
		// we must also manually register the template title both here
		// and in `theme.json`, so we must keep these in sync.
		//
		// @link https://github.com/WordPress/gutenberg/issues/44097
		$custom_templates = [
			'template-canvas' => [
				'title'       => _x( 'Custom: Canvas', 'Template name', 'x3p0-ideas' ),
				'description' => __( 'An open canvas template for single posts and pages, showing only the site header, footer, and content by default.', 'x3p0-ideas' )
			],
			'template-post-faded-cover' => [
				'title'       => _x( 'Post: Faded Cover', 'Template name', 'x3p0-ideas' ),
				'description' => __( 'Single post template that uses the featured image as the site header background with an overlay that fades into the background color.', 'x3p0-ideas' )
			],
			'template-post-featured' => [
				'title'       => _x( 'Post: Featured', 'Template name', 'x3p0-ideas' ),
				'description' => __( 'Single post template that puts the featured image below the header with the post title and metadata centered over it.', 'x3p0-ideas' )
			],
			'template-post-featured-cover' => [
				'title'       => _x( 'Post: Featured Cover', 'Template name', 'x3p0-ideas' ),
				'description' => __( 'Single post template that uses the featured image as the site header background with a dark overlay and light text.', 'x3p0-ideas' )
			],
		];

		return [
			...$default_template_types,
			...$custom_templates
		];
	}
}
