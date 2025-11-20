<?php

/**
 * Pattern registrar.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Pattern;

use WP_Block_Patterns_Registry;
use WP_Block_Type_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Support\Hooks\{Action, Hookable};

/**
 * Handles registering and unregistering block patterns. It's recommended to
 * register patterns by placing individual files in the `/patterns` folder.
 */
class PatternRegistrar implements Bootable
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
		private readonly WP_Block_Patterns_Registry $patterns,
		private readonly WP_Block_Type_Registry $blocks
	) {}

	/**
	 * Removes theme support for core patterns.
	 */
	#[Action('after_setup_theme')]
	public function themeSupport(): void
	{
		remove_theme_support('core-block-patterns');
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
