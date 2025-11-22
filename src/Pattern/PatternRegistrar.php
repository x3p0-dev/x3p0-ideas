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

/**
 * Handles registering and unregistering block patterns. It's recommended to
 * register patterns by placing individual files in the `/patterns` folder.
 */
final class PatternRegistrar implements Bootable
{
	/**
	 * Patterns that should be conditionally removed if the block is not
	 * registered for the installation.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const CONDITIONAL_PATTERNS = [
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
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('after_setup_theme', $this->themeSupport(...));
		add_action('init', $this->unregister(...), 999999);
	}

	/**
	 * Removes theme support for core patterns.
	 */
	private function themeSupport(): void
	{
		remove_theme_support('core-block-patterns');
	}

	/**
	 * Unregister block patterns, specifically those that use block types
	 * that are not in use on the site.
	 */
	private function unregister(): void
	{
		foreach (self::CONDITIONAL_PATTERNS as $block => $patterns) {
			if ($this->blocks->is_registered($block)) {
				continue;
			}

			foreach ($patterns as $pattern) {
				$this->patterns->unregister($pattern);
			}
		}
	}
}
