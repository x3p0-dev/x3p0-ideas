<?php

/**
 * Post Excerpt block render service.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use WP_Block;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Filters rendered output for the `core/post-excerpt` block.
 */
final class RenderPostExcerpt implements Bootable
{
	private const ALLOWED_HTML = [
		'a'       => ['href' => true, 'title' => true, 'class' => true],
		'abbr'    => ['title' => true],
		'acronym' => ['title' => true],
		'bold'    => ['class' => true],
		'code'    => ['class' => true],
		'em'      => ['class' => true],
		'i'       => ['class' => true],
		'mark'    => ['class' => true],
		'small'   => ['class' => true],
		'span'    => ['class' => true],
		'strong'  => ['class' => true]
	];

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('pre_render_block', $this->beforeRender(...), 10, 3);
		add_filter('render_block_core/post-excerpt', $this->afterRender(...), -999999);
	}

	/**
	 * Adds filter to preserve HTML in manual excerpts before rendering.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/49449
	 */
	private function beforeRender(
		?string $pre_render,
		array $block,
		?WP_Block $parent_block
	): ?string {
		if (
			'core/post-excerpt' === $block['blockName']
			&& is_null($pre_render)
			&& !is_null($parent_block)
			&& isset($parent_block->context['postId'])
			&& has_excerpt($parent_block->context['postId'])
		) {
			add_filter('wp_trim_words', [$this, 'preserveHtml'], 10, 4);
		}

		return $pre_render;
	}

	/**
	 * Removes the wp_trim_words filter after rendering.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/49449
	 */
	private function afterRender(string $content): string
	{
		remove_filter('wp_trim_words', [$this, 'preserveHtml'], 10);
		return $content;
	}

	/**
	 * Preserves HTML tags in manual excerpts.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/49449
	 */
	public function preserveHtml(
		string $text,
		int $num_words,
		string $more,
		string $original_text
	): string {
		return wp_kses($original_text, self::ALLOWED_HTML);
	}
}
