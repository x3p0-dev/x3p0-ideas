<?php

/**
 * The Block Patterns class is responsible for registering block pattern
 * categories and block patterns. However, it's recommended to register patterns
 * by placing individual files in the `/patterns` folder.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Type_Registry;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Patterns implements Bootable
{
	use HookAnnotation;

	/**
	 * Patterns that should be conditionally removed if the block is not
	 * registered for the install.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	protected const CONDITIONAL_PATTERNS = [
		'core/table-of-contents' => [ 'x3p0-ideas/card-table-of-contents' ],
		'x3p0/breadcrumbs'       => [ 'x3p0-ideas/breadcrumbs' ]
	];

	/**
	 * Stores the instance of the block type registry.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected WP_Block_Type_Registry $block_types;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 * @todo  Promote params to properties with PHP 8.0+ requirement.
	 */
	public function __construct(WP_Block_Type_Registry $block_types)
	{
		$this->block_types = $block_types;
	}

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
		remove_theme_support('core-block-patterns');
	}

	/**
	 * Register block pattern categories. Note that this theme registers
	 * patterns by adding them as individual pattern files in the `/patterns`
	 * folder.
	 *
	 * @hook  init  first
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/register_block_pattern_category/
	 */
	public function registerCategories(): void
	{
		register_block_pattern_category('x3p0-card', [
			'label'       => __('Cards', 'x3p0-ideas'),
			'description' => __('A variety of card-based designs.', 'x3p0-ideas')
		]);

		register_block_pattern_category('x3p0-grid', [
			'label'       => __('Grids', 'x3p0-ideas'),
			'description' => __('A variety of designs that group items in a grid layout.', 'x3p0-ideas')
		]);

		register_block_pattern_category('x3p0-hero', [
			'label'       => __('Heroes', 'x3p0-ideas'),
			'description' => __('Large, full-width sections that make a statement.', 'x3p0-ideas')
		]);

		register_block_pattern_category('x3p0-layout', [
			'label'       => __('Layout', 'x3p0-ideas'),
			'description' => __('Basic building blocks for arranging custom layouts.', 'x3p0-ideas')
		]);
	}

	/**
	 * Unregister block patterns, specifically those that use block types
	 * that are not in use on the site.
	 *
	 * @hook  init  last
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/unregister_block_pattern/
	 */
	public function unregisterPatterns(): void
	{
		foreach (self::CONDITIONAL_PATTERNS as $block => $patterns) {
			if (! $this->block_types->is_registered($block)) {
				array_map('unregister_block_pattern', $patterns);
			}
		}
	}
}
