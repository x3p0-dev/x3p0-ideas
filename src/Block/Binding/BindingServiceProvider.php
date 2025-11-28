<?php

/**
 * Block bindings source service provider.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Binding;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Framework\Core\ServiceProvider;

final class BindingServiceProvider extends ServiceProvider implements Bootable
{
	/**
	 * Array of block binding source classnames.
	 */
	private const SOURCES = [
		Sources\Comment::class,
		Sources\General::class,
		Sources\Media::class,
		Sources\Post::class,
		Sources\Site::class,
		Sources\Superpower::class,
		Sources\Theme::class
	];

	/**
	 * @inheritDoc
	 */
	public function register(): void
	{
		$this->container->singleton(
			BindingSourceRegistrar::class,
			fn() => new BindingSourceRegistrar(
				$this->container->get(WP_Block_Bindings_Registry::class),
				self::SOURCES
			)
		);
	}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		$this->container->get(BindingAttributeSupport::class)->boot();
		$this->container->get(BindingSourceRegistrar::class)->boot();
	}
}
