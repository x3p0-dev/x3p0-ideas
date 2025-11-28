<?php

/**
 * Color scheme service.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

/**
 * Primary entry point for color scheme functionality.
 *
 * Provides access to color scheme resolution and interactivity features.
 * Use this service to check the current color scheme, determine if switching
 * is available, and enable interactive color scheme switching.
 */
final class ColorSchemeService
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(
		private readonly ColorSchemeResolver $resolver,
		private readonly ColorSchemeInteractivity $interactivity
	) {}

	/**
	 * Returns the resolver for checking switchability, current scheme, etc.
	 */
	public function resolver(): ColorSchemeResolver
	{
		return $this->resolver;
	}

	/**
	 * Enables interactivity for color scheme switching.
	 */
	public function enableInteractivity(): void
	{
		$this->interactivity->enable();
	}
}
