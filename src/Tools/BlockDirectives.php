<?php
/**
 * A class for checking conditionals inside of block attributes. This allows us
 * to make some blocks dynamic when working with the static nature of blocks.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas\Tools;

class BlockDirectives
{
	/**
	 * List of allowed directives and their callback methods.
	 *
	 * @since 1.0.0
	 */
	private array $directives = [
		'@if'     => 'includeIf',
		'@unless' => 'includeUnless',
		'@user'   => 'includeIfUser'
	];

	/**
	 * A copy of the block array when rendering.
	 *
	 * @since 1.0.0
 	 * @todo  Move this to the constructor with PHP 8-only support.
	 */
	protected array $block;

	/**
	 * Sets up object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct( array $block )
	{
		$this->block = $block;
	}

	/**
	 * Checks if the block content is allowed to be shown based on the what
	 * is returned by the directive method.
	 *
	 * @since 1.0.0
	 */
	public function allowed(): bool
	{
		foreach ( $this->directives as $directive => $method ) {
			if ( isset( $this->block['attrs'][ $directive ] ) ) {
				$value = $this->block['attrs'][ $directive ];

				return is_array( $value )
				       ? $this->$method( array_map( 'wp_strip_all_tags', $value ) )
				       : $this->$method( $value );
			}
		}

		return true;
	}

	/**
	 * Show the block if the condition is met.
	 *
	 * @since 1.0.0
	 * @param string|array $condition
	 */
	protected function includeIf( $condition ): bool
	{
		$callable = is_callable( $condition, false, $callback );
		return $callable ? boolval( $callback() ) : true;
	}

	/**
	 * Show the block unless the condition is met.
	 *
	 * @since 1.0.0
	 * @param string|array $condition
	 */
	protected function includeUnless( $condition ): bool
	{
		$callable = is_callable( $condition, false, $callback );
		return $callable ? ! boolval( $callback() ) : true;
	}

	/**
	 * Show the block if the user matches.
	 *
	 * @since 1.0.0
	 * @param string|int $user
	 */
	protected function includeIfUser( $user ): bool
	{
		if ( ! is_user_logged_in() ) {
			return false;
		}

		$current_user = wp_get_current_user();

		return is_numeric( $user )
		       ? absint( $user ) === $current_user->ID
		       : $user === $current_user->get( 'user_nicename' );
	}
}
