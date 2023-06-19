<?php
/**
 * Block-related filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Blocks implements Bootable
{
	use HookAnnotation;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Filters block content.
	 *
	 * @hook  render_block
	 * @since 1.0.0
	 */
	public function renderBlock( string $block_content, array $block ): string
	{
		if ( 'core/calendar' === $block['blockName'] ) {
			return $this->coreCalendar( $block_content );
		}

		return $block_content;
	}

	/**
	 * Really hacky method to replace the arrows in the calendar to match
	 * the theme's arrows.
	 *
	 * @since 1.0.0
	 */
	private function coreCalendar( string $block_content ): string
	{
		return str_replace(
			[ '&raquo;', '&laquo;' ],
			[ '&rarr;',  '&larr;'  ],
			$block_content
		);
	}
}
