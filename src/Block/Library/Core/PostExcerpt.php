<?php

/**
 * The PostExcerpt class handles filters related to the `core/post-excerpt` block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Library\Core;

use WP_Block;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

class PostExcerpt implements Bootable
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
	 * Before rendering the Post Excerpt block, add a custom filter to
	 * `wp_trim_words` so that we can handle the output of custom excerpts.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/49449
	 */
	#[Filter('pre_render_block')]
	public function preRender(
		?string $pre_render,
		array $block,
		?WP_Block $parent_block
	): ?string {
		if (
			'core/post-excerpt' === $block['blockName']
			&& is_null($pre_render)
			&& ! is_null($parent_block)
			&& isset($parent_block->context['postId'])
			&& has_excerpt($parent_block->context['postId'])
		) {
			add_filter('wp_trim_words', [$this, 'formatManualExcerpt'], 10, 4);
		}

		return $pre_render;
	}

	/**
	 * Removes the filter on `wp_trim_words` if it was added on the earlier
	 * `pre_render_block` hook.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/49449
	 * @see   PostExcerpt::preRender()
	 */
	#[Filter('render_block_core/post-excerpt', 'first')]
	public function render(string $content): string
	{
		if ($priority = has_filter('wp_trim_words', [$this, 'formatManualExcerpt'])) {
			remove_filter('wp_trim_words', [$this, 'formatManualExcerpt'], $priority);
		}

		return $content;
	}

	/**
	 * Filters `wp_trim_words` to allow the original text but removes
	 * unwanted tags. This is meant to be used only when the user has
	 * written a custom excerpt.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/49449
	 * @see   PostExcerpt::preRender()
	 */
	public function formatManualExcerpt(
		string $text,
		int $num_words,
		string $more,
		string $original_text
	): string {
		return wp_kses($original_text, [
			'a'       => [ 'href' => true, 'title' => true, 'class' => true ],
			'abbr'    => [ 'title' => true ],
			'acronym' => [ 'title' => true ],
			'bold'    => [ 'class' => true ],
			'code'    => [ 'class' => true ],
			'em'      => [ 'class' => true ],
			'i'       => [ 'class' => true ],
			'mark'    => [ 'class' => true ],
			'small'   => [ 'class' => true ],
			'span'    => [ 'class' => true ],
			'strong'  => [ 'class' => true ]
		]);
	}
}
