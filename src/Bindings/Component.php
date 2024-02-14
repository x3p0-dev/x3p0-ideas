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

namespace X3P0\Ideas\Bindings;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Component implements Bootable
{
	use HookAnnotation;

	/**
	 * Stores an array of `Binding` classes to register the bindings sources.
	 *
	 * @since 1.0.0
	 */
	protected array $sources = [];

	/**
	 * Sets up the initial object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(array $sources)
	{
		$this->sources = $sources;
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
		foreach ($this->sources as $source) {
			$binding_source = new $source();

			register_block_bindings_source($binding_source->name(), [
				'label'              => $binding_source->label(),
				'get_value_callback' => [ $binding_source, 'callback' ]
			]);
		}
	}
}
