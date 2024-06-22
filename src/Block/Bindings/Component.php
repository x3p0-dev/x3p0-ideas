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
	 * Stores the instance of the core block bindings
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected WP_Block_Bindings_Registry $bindings;

	/**
	 * An array of `BlockBindings` classes to register the bindings sources.
	 *
	 * @since 1.0.0
	 * @var   BlockBindingSource[]
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected array $sources = [];

	/**
	 * Sets up the initial object state.
	 *
	 * @since 1.0.0
	 * @param BlockBindingSource[]  $sources
	 * @todo  Promote params to properties with PHP 8.0+ requirement.
	 */
	public function __construct(
		WP_Block_Bindings_Registry $bindings,
		array $sources
	) {
		$this->bindings = $bindings;
		$this->sources  = $sources;
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
	 * Register custom block bindings sources.
	 *
	 * @hook  init
	 * @since 1.0.0
	 */
	public function register(): void
	{
		foreach ($this->sources as $binding_source) {
			if (! is_subclass_of($binding_source, BlockBindingSource::class)) {
				continue;
			}

			$source = new $binding_source();

			$this->bindings->register(
				$source->name(),
				$source->options()
			);
		}
	}
}
