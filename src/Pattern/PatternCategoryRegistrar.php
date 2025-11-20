<?php

/**
 * Pattern category registrar.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Pattern;

use WP_Block_Pattern_Categories_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Support\Hooks\{Action, Hookable};

/**
 * Registers block pattern categories.
 */
final class PatternCategoryRegistrar implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 */
	public function __construct(
		protected readonly WP_Block_Pattern_Categories_Registry $categories
	) {}

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
}
