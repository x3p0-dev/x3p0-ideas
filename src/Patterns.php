<?php
/**
 * The Block Patterns class is responsible for registering block pattern
 * categories and block patterns. However, it's recommended to register patterns
 * by placing individual files in the `/patterns` folder.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;

class Patterns implements Bootable
{
	/**
         * Boots the component, running its actions/filters.
         *
         * @since 1.0.0
         */
	public function boot(): void
	{
		// Patterns theme support.
		add_action( 'after_setup_theme', [ $this, 'themeSupport' ] );

		// Register patterns/categories.
		add_action( 'init', [ $this, 'register' ] );
	}

	/**
	 *  Removes theme support for core patterns.
	 *
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
         * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/register_block_pattern_category/
         */
	public function register(): void
	{
		// Registers a base `theme` category.
		register_block_pattern_category( 'theme', [
			'label'       => __( 'Theme', 'x3p0-ideas' ),
			'description' => __( 'Patterns registered by the theme.', 'x3p0-ideas' )
		] );
	}
}
