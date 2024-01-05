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

class Patterns implements Bootable
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
		register_block_pattern_category( 'x3p0-content', [
			'label'       => __( 'Content', 'x3p0-ideas' ),
			'description' => __( 'Content patterns handle the design for the content area of templates—specifically, the section between the header and footer.', 'x3p0-ideas' )
		] );
	}
}
