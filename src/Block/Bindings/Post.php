<?php

/**
 * Post binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Bindings;

use WP_Block;
use WP_Block_Bindings_Registry;
use X3P0\Ideas\Contracts\BlockBindingSource;

class Post implements BlockBindingSource
{
	/**
	 * Map of keys to their associated methods.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	private const KEY_METHODS = [
		'readingTime' => 'boundReadingTime'
	];

	/**
	 * Stores the post ID.
	 *
	 * @since 1.0.0
	 */
	private int $post_id = 0;

	/**
	 * Registers the block binding source.
	 *
	 * @since 1.0.0
	 */
	public function register(WP_Block_Bindings_Registry $bindings): void
	{
		$bindings->register('x3p0/post', [
			'label'              => __('Post Data', 'x3p0-ideas'),
			'get_value_callback' => [ $this, 'callback' ],
			'uses_context'       => [ 'postId' ]
		]);
	}

	/**
	 * Returns media data based on the bound attribute.
	 *
	 * @since  1.0.0
	 * @return string|null
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	public function callback(array $args, WP_Block $block, string $name)
	{
		$this->post_id = $block->context['postId'] ?? get_the_ID();

		if (isset($args['key']) && isset(self::KEY_METHODS[ $args['key'] ])) {
			$method = self::KEY_METHODS[ $args['key'] ];

			return $this->$method($args, $block);
		}

		return null;
	}

	/**
	 * Returns a post's reading time.
	 *
	 * @since  1.0.0
	 * @return string|null
	 * @todo   Add union return type with PHP 8.0+ requirement.
	 */
	private function boundReadingTime()
	{
		if (! $str = get_the_content(null, false, $this->post_id)) {
			return null;
		}

		// Allow the words per minute to be set, but default to 200.
		$words_per_min = isset($args['wordsPerMinute'])
			? absint($args['wordsPerMinute'])
			: 200;

		// Strip tags and get the word count from the content.
		$count = str_word_count(strip_tags($str));

		// Get the ceiling for minutes.
		$time_mins  = intval(ceil($count / $words_per_min));
		$time_hours = 0;

		// If more than 60 mins, calculate hours and get leftover mins.
		if (60 <= $time_mins) {
			$time_hours = intval(floor($time_mins / 60));
			$time_mins  = intval($time_mins % 60);
		}

		// Set up text for hours.
		$text_hours = sprintf(
			_n('%d Hour', '%d Hours', $time_hours, 'x3p0-ideas'),
			number_format_i18n($time_hours)
		);

		// Set up text for minutes.
		$text_mins = sprintf(
			_n('%d Minute', '%d Minutes', $time_mins, 'x3p0-ideas'),
			number_format_i18n($time_mins)
		);

		// If there are no hours, just return the minutes.
		// If there are no minutes, just return the hours.
		if (0 >= $time_hours) {
			return $text_mins;
		} elseif (0 >= $time_mins) {
			return $text_hours;
		}

		// Merge hours + minutes text.
		return sprintf('%s, %s', $text_hours, $text_mins);
	}
}
