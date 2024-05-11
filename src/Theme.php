<?php

/**
 * The Theme class is a simple container used to store and reference the various
 * theme components. It doesn't support automatic dependency injection (manual
 * only) because it would be overkill for this project.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Bindings_Registry;
use WP_Block_Patterns_Registry;
use WP_Block_Pattern_Categories_Registry;
use WP_Block_Styles_Registry;
use WP_Block_Type_Registry;

use X3P0\Ideas\Bindings;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\BlockRules;
use X3P0\Ideas\Views\Engine;

class Theme implements Bootable
{
	/**
	 * Stored definitions of single instances.
	 *
	 * @since 1.0.0
	 * @var   mixed[]
	 */
	private array $instances = [];

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct()
	{
		$this->registerDefaultBindings();
	}

	/**
	 * Boots the component by calling bootable bindings.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		array_walk(
			$this->instances,
			fn($binding) => $binding instanceof Bootable && $binding->boot()
		);
	}

	/**
	 * Registers the default bindings we need to run the theme.
	 *
	 * @since 1.0.0
	 */
	private function registerDefaultBindings(): void
	{
		$this->instance('bindings', new Bindings\Component(
			WP_Block_Bindings_Registry::get_instance(),
			[
				Bindings\Media::class,
				Bindings\Post::class,
				Bindings\Site::class,
				Bindings\Theme::class
			]
		));

		$this->instance('blocks', new Blocks(
			WP_Block_Type_Registry::get_instance(),
			new BlockRules(),
			new Engine()
		));

		$this->instance('patterns', new Patterns(
			WP_Block_Patterns_Registry::get_instance(),
			WP_Block_Pattern_Categories_Registry::get_instance(),
			WP_Block_Type_Registry::get_instance()
		));

		$this->instance('styles', new Styles(
			WP_Block_Styles_Registry::get_instance()
		));

		$this->instance('editor',     new Editor());
		$this->instance('embeds',     new Embeds());
		$this->instance('frontend',   new Frontend());
		$this->instance('media',      new Media());
		$this->instance('parts',      new Parts());
		$this->instance('templates',  new Templates());
		$this->instance('variations', new Variations());
	}

	/**
	 * Registers a single instance of a binding. Note that this is marked as
	 * a `private` method for now since this class is meant to be used
	 * internally only.
	 *
	 * @since 1.0.0
	 * @param mixed $instance
 	 * @todo  Add `mixed` param type declaration with PHP 8-only support.
	 */
	private function instance(string $abstract, $instance): void
	{
		$this->instances[ $abstract ] = $instance;
	}

	/**
	 * Returns a binding or `null`.
	 *
	 * @since  1.0.0
	 * @return mixed
	 * @todo   Add `mixed` return type declaration with PHP 8-only support.
	 */
	public function get(string $abstract)
	{
		return $this->has($abstract) ? $this->instances[ $abstract ] : null;
	}

	/**
	 * Checks if a binding exists.
	 *
	 * @since 1.0.0
	 */
	public function has(string $abstract): bool
	{
		return isset($this->instances[ $abstract ]);
	}
}
