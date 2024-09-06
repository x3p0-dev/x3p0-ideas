<?php

/**
 * The Bindings component registers custom binding sources with the WordPress
 * Block Bindings API.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Bindings;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Contracts\{BlockBindingSource, Bootable};
use X3P0\Ideas\Tools\HookAnnotation;

class Component implements Bootable
{
	use HookAnnotation;

	/**
	 * Sets up the initial object state.
	 *
	 * @since 1.0.0
	 * @param BlockBindingSource[]  $sources
	 */
	public function __construct(
		protected WP_Block_Bindings_Registry $bindings,
		protected array $sources
	) {}

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
	 * Register custom block bindings sources.
	 *
	 * @hook  init
	 * @since 1.0.0
	 */
	public function register(): void
	{
		foreach ($this->sources as $source) {
			if (is_subclass_of($source, BlockBindingSource::class)) {
				(new $source())->register($this->bindings);
			}
		}
	}
}
