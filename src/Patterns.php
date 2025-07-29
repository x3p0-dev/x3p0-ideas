<?php

/**
 * Patterns class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Patterns_Registry;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Type_Registry;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Hookable};

/**
 * The Block Patterns class is responsible for registering block pattern
 * categories and block patterns. However, it's recommended to register patterns
 * by placing individual files in the `/patterns` folder.
 */
class Patterns implements Bootable
{
	use Hookable;

	/**
	 * Patterns that should be conditionally removed if the block is not
	 * registered for the installation.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	protected const CONDITIONAL_PATTERNS = [
		'core/table-of-contents' => [ 'x3p0-ideas/card-table-of-contents' ],
		'x3p0/breadcrumbs'       => [ 'x3p0-ideas/breadcrumbs' ]
	];

	/**
	 * Sets up the object state.
	 */
	public function __construct(
		protected WP_Block_Patterns_Registry $patterns,
		protected WP_Block_Pattern_Categories_Registry $categories,
		protected WP_Block_Type_Registry $blocks
	) {}

	/**
	 * Boots the component, running its actions/filters.
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Removes theme support for core patterns.
	 */
	#[Action('after_setup_theme')]
	public function themeSupport(): void
	{
		remove_theme_support('core-block-patterns');
	}

	/**
	 * Register block pattern categories. Note that this theme registers
	 * patterns by adding them as individual pattern files in the `/patterns`
	 * folder.
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
	 */
	#[Action('init', 'first')]
	public function registerCategories(): void
	{
		$this->categories->register('x3p0-card', [
			'label'       => __('Cards', 'x3p0-ideas'),
			'description' => __('A variety of card-based designs.', 'x3p0-ideas')
		]);

		$this->categories->register('x3p0-grid', [
			'label'       => __('Grids', 'x3p0-ideas'),
			'description' => __('A variety of designs that group items in a grid layout.', 'x3p0-ideas')
		]);

		$this->categories->register('x3p0-hero', [
			'label'       => __('Heroes', 'x3p0-ideas'),
			'description' => __('Large, full-width sections that make a statement.', 'x3p0-ideas')
		]);

		$this->categories->register('x3p0-layout', [
			'label'       => __('Layout', 'x3p0-ideas'),
			'description' => __('Basic building blocks for arranging custom layouts.', 'x3p0-ideas')
		]);
	}

	/**
	 * Unregister block patterns, specifically those that use block types
	 * that are not in use on the site.
	 *
	 * @link https://developer.wordpress.org/reference/functions/unregister_block_pattern/
	 */
	#[Action('init', 'last')]
	public function unregisterPatterns(): void
	{
		foreach (self::CONDITIONAL_PATTERNS as $block => $patterns) {
			if (! $this->blocks->is_registered($block)) {
				array_walk(
					$patterns,
					fn($pattern) => $this->patterns->unregister($pattern)
				);
			}
		}
	}
}
