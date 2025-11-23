<?php

/**
 * Bindings Component class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Binding;

use TypeError;
use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * The Bindings component registers custom binding sources with the WordPress
 * Block Bindings API.
 */
class BindingSourceManager implements Bootable
{
	/**
	 * Sets up the initial object state.
	 */
	public function __construct(
		protected readonly WP_Block_Bindings_Registry $bindingsRegistry,
		protected readonly array $sources
	) {}

	public function boot(): void {
		add_action('init', $this->register(...));
	}

	/**
	 * Register custom block bindings sources.
	 */
	public function register(): void
	{
		foreach ($this->sources as $source) {
			if (is_string($source)) {
				$source = new $source;
			}

			if (! $source instanceof BindingSource) {
				throw new TypeError(esc_html(sprintf(
					// Translators: %s is a PHP class name.
					__('Only %s classes can be registered', 'x3p0-ideas'),
					BindingSource::class
				)));
			}

			$this->bindingsRegistry->register($source->getName(), [
				'label'              => $source->getLabel(),
				'get_value_callback' => $source->callback(...),
				'uses_context'       => $source->getContext()
			]);
		}
	}
}
