<?php
/**
 * The Block Patterns class is responsible for registering block pattern
 * categories and block patterns. However, it's recommended to register patterns
 * by placing individual files in the `/patterns` folder.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

use WP_Theme;

class Patterns implements Bootable
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

		// Removes the core and Gutenberg theme pattern registration
		// callback functions, which do not properly handle child theme
		// pattern overrides.
		remove_action( 'init', '_register_theme_block_patterns'          );
		remove_action( 'init', 'gutenberg_register_theme_block_patterns' );
	}

	/**
	 * Removes theme support for core patterns.
	 *
	 * @hook  after_setup_theme
	 * @since 1.0.0
	 */
	public function themeSupport(): void
	{
		remove_theme_support( 'core-block-patterns' );
	}

	/**
	 * Register block pattern categories. Note that this theme registers
	 * patterns by adding them as individual pattern files in the `/patterns`
	 * folder.
	 *
	 * @hook  init
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/register_block_pattern_category/
	 */
	public function register(): void
	{
		register_block_pattern_category( 'content', [
			'label'       => __( 'Content', 'x3p0-ideas' ),
			'description' => __( 'Content areas...', 'x3p0-ideas' )
		] );

		// Registers patterns from the `/patterns` folder.
		$this->registerPatterns();
	}

	/**
	 * Fixes both core and Gutenberg's implementation of patterns for child
	 * themes, allowing child patterns to overwrite their parent if they
	 * share the same slug.
	 *
	 * @since 1.0.0
	 */
	private function registerPatterns(): void
	{
		$wp_theme = wp_get_theme();

		if ( $wp_theme->parent() ) {
			$this->registerThemePatterns( $wp_theme->parent() );
		}

		$this->registerThemePatterns( $wp_theme );
	}

	/**
	 * Registers an individual theme's patterns from its `/patterns` folder.
	 *
	 * @since 1.0.0
	 */
	private function registerThemePatterns( WP_Theme $theme ): void
	{
		$path = $theme->get_file_path( 'patterns' );

		// Bail if the theme doesn't have a readable `/patterns` directory.
		if (
			! file_exists( $path ) ||
			! is_dir( $path ) ||
			! is_readable( $path ) )
		{
			return;
		}

		// Gets the theme's pattern files and registers each.
		$files = glob( "{$path}/*.php" );

		foreach ( $files as $file ) {
			$this->registerPatternByFile( $file, $theme );
		}
	}

	/**
	 * Registers a block pattern by file.
	 *
	 * @since 1.0.0
	 */
	private function registerPatternByFile( string $file, WP_Theme $theme ): void
	{
		$default_headers = [
			'title'         => 'Title',
			'slug'          => 'Slug',
			'description'   => 'Description',
			'viewportWidth' => 'Viewport Width',
			'categories'    => 'Categories',
			'keywords'      => 'Keywords',
			'blockTypes'    => 'Block Types',
			'postTypes'     => 'Post Types',
			'inserter'      => 'Inserter',
			'templateTypes' => 'Template Types',
			'source'        => 'Source'
		];

		$data = get_file_data( $file, $default_headers );

		// Bail if there is no valid slug or title.
		if (
			! $data['slug'] ||
			! $data['title'] ||
			! preg_match( '/^[A-z0-9\/_-]+$/', $data['slug'] )
		) {
			return;
		}

		// Get the pattern content.
		ob_start();
		include $file;
		$data['content'] = ob_get_clean();

		// Bail if there is no content.
		if ( ! $data['content'] ) {
			return;
		}

		// Get the theme text domain.
		$text_domain = $theme->get( 'TextDomain' );

		// Translate the pattern title.
		$data['title'] = translate_with_gettext_context(
			$data['title'],
			'Pattern title',
			$text_domain
		);

		// Get and translate the pattern description.
		$data['description'] = ! $data['description'] ? '' : translate_with_gettext_context(
			$data['description'],
			'Pattern description',
			$text_domain
		);

		// Add the pattern source (WordPress 6.3).
		$data['source'] = $data['source'] ? $data['source'] : 'theme';

		// Handles properties that should be arrays (delineated by a
		// comma in the file header).
		$arr_props = [
			'categories',
			'keywords',
			'blockTypes',
			'postTypes',
			'templateTypes'
		];

		foreach ( $arr_props as $property ) {
			if ( $data[ $property ] ) {
				$data[ $property ] = array_filter(
					preg_split( '/[\s,]+/', $data[ $property ] )
				);
			} else {
				unset( $data[ $property ] );
			}
		}

		// Though undocumented, WP sets the default width to 1200px.
		$data['viewportWidth'] = ! $data[ 'viewportWidth' ] ? 1200 : intval(
			$data[ 'viewportWidth' ]
		);

		// Inserter is `true` by default.
		$data['inserter'] = ! $data['inserter'] ? true : in_array(
			strtolower( $data[ 'inserter' ] ),
			[ 'yes', 'true' ],
			true
		);

		register_block_pattern( $data['slug'], $data );
	}
}
