<?php

/**
 * The Variations class is used for registering block variations via PHP.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Type;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Variations implements Bootable
{
	use HookAnnotation;

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
	 * Register custom block variations.
	 *
	 * @hook  get_block_type_variations
	 * @since 1.0.0
	 */
	public function register(array $variations, WP_Block_Type $block): array
	{
		if ('core/spacer' === $block->name) {
			$variations[] = $this->spacer();
		}

		return $variations;
	}

	/**
	 * Registers the theme spacer as the default so that (with any luck)
	 * users will choose the theme spacing sizes over custom sizes. Note
	 * that there is currently no way to set the default spacer size via
	 * `theme.json` nor is there a way to disable custom spacing sizes.
	 *
	 * @since 1.0.0
	 */
	private function spacer(): array
	{
		return [
			'name'       => 'x3p0/theme-spacer',
			'title'      => __('Spacer', 'x3p0-ideas'),
			'isDefault'  => true,
			'keywords'   => [ 'space', 'spacer', 'spacing' ],
			'isActive'   => [ 'height' ],
			'attributes' => [
				'height' => 'var:preset|spacing|plus-8'
			]
		];
	}
}
