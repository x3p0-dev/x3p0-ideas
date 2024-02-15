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

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Component implements Bootable
{
	use HookAnnotation;

	/**
	 * Stores the instance of the core block bindings
	 *
	 * @since 1.0.0
	 */
	protected WP_Block_Bindings_Registry $bindings;

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
		foreach ($this->sources as $class) {
			$source = new $class();

			$this->bindings->register($source->name(), [
				'label'              => $source->label(),
				'get_value_callback' => [ $source, 'callback' ],
				'uses_context'       => $source->usesContext()
			]);
		}
	}
}
