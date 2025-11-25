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

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * The Bindings component registers custom binding sources with the WordPress
 * Block Bindings API.
 */
final class BindingAttributeSupport implements Bootable
{
	private const HOOK_PREFIX = 'block_bindings_supported_attributes';

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

	public function boot(): void {
		foreach (array_keys(self::SUPPORTED_ATTRIBUTES) as $blockName) {
			add_filter(
				self::HOOK_PREFIX . "_{$blockName}",
				$this->addSupportedAttributes(...)
			);
		}
	}

	/**
	 * Adds supported attributes for the Audio and Video blocks.
	 */
	public function addSupportedAttributes(array $attrs): array
	{
		$block = str_replace(self::HOOK_PREFIX . '_', '', current_filter());

		return isset(self::SUPPORTED_ATTRIBUTES[$block])
			? array_merge($attrs, self::SUPPORTED_ATTRIBUTES[$block])
			: $attrs;
	}
}
