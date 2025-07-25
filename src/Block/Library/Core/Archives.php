<?php

/**
 * The Archives class handles filters related to the `core/archives` block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class Archives implements Bootable
{
	use Hookable;

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
	 * Adds color support to the Archives block.
	 *
	 * @since 1.0.0
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/archives' === $settings['name']) {
			$settings['supports']['color']              ??= [];
			$settings['supports']['color']['gradients'] ??= true;
			$settings['supports']['color']['link']      ??= true;
		}

		return $settings;
	}

	/**
	 * Filter on the `widget_archives_args` hook, which is also used in the
	 * Archives block to pass the arguments to the `wp_get_archives()`
	 * function. We're using it here to give a wrapper `<div>` to individual
	 * list items. This provides a bit more design flexibility with custom
	 * block styles.
	 *
	 * @since 1.0.0
	 */
	#[Filter('widget_archives_args', 'last')]
	public function setWidgetArchivesArgs(array $args): array
	{
		$before = $args['before'] ?? '';
		$after  = $args['after'] ?? '';

		$args['before'] = '<div class="wp-block-archives__content">' . $before;
		$args['after']  = $after . '</div>';

		return $args;
	}
}
