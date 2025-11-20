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

namespace X3P0\Ideas\Block\Bindings;

use WP_Block_Bindings_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Support\Hooks\{Action, Filter, Hookable};

/**
 * The Bindings component registers custom binding sources with the WordPress
 * Block Bindings API.
 */
class Component implements Bootable
{
	use Hookable;

	/**
	 * Defines blocks and their supported bindable attributes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const SUPPORTED_ATTRIBUTES = [
		'core/audio' => ['src'],
		'core/video' => ['src'],
		'core/file'  => [
			'downloadButtonText',
			'fileName',
			'href',
			'textLinkHref'
		]
	];

	/**
	 * Sets up the initial object state.
	 */
	public function __construct(
		protected WP_Block_Bindings_Registry $bindings,
		protected array $sources
	) {}

	/**
	 * Register custom block bindings sources.
	 */
	#[Action('init')]
	public function register(): void
	{
		foreach ($this->sources as $source) {
			if (is_subclass_of($source, BlockBindingSource::class)) {
				(new $source())->register($this->bindings);
			}
		}
	}

	/**
	 * Adds supported attributes for the Audio and Video blocks.
	 */
	#[Filter('block_bindings_supported_attributes_core/audio')]
	#[Filter('block_bindings_supported_attributes_core/file')]
	#[Filter('block_bindings_supported_attributes_core/video')]
	public function addSupportedAttributes(array $attrs): array
	{
		$block = str_replace('block_bindings_supported_attributes_', '', current_filter());

		return isset(self::SUPPORTED_ATTRIBUTES[$block])
			? array_merge($attrs, self::SUPPORTED_ATTRIBUTES[$block])
			: $attrs;
	}
}
