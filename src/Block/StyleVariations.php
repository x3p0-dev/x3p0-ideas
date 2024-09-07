<?php

/**
 * The Style Variations class registers block style variations via PHP.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block_Styles_Registry;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Hookable};

class StyleVariations implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(protected WP_Block_Styles_Registry $styles) {}

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
	 * Register custom block styles.
	 *
	 * @since 1.0.0
	 */
	#[Action('init')]
	public function register(): void
	{
		foreach ($this->getCustomStyles() as $block => $styles) {
			foreach ($styles as $name => $label) {
				$this->styles->register($block, [
					'name'  => $name,
					'label' => $label
				]);
			}
		}
	}

	/**
	 * Returns an array of custom block style variations to register.
	 *
	 * @since 1.0.0
	 */
	private function getCustomStyles(): array
	{
		return [
			'core/archives' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas'),
				'spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/button' => [
				'link' => __('Link', 'x3p0-ideas')
			],
			'core/categories' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas'),
				'spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/code' => [
				'highlight' => __('Highlight', 'x3p0-ideas')
			],
			'core/columns' => [
				'grid-auto'     => __('Grid: Auto',           'x3p0-ideas'),
				'reverse-stack' => __('Reverse Mobile Stack', 'x3p0-ideas'),
			],
			'core/comment-author-name' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/comment-date' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/comment-edit-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/comment-reply-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/cover' => [
				'fade-in' => __('Fade In', 'x3p0-ideas'),
				'stretch' => __('Stretch', 'x3p0-ideas')
			],
			'core/details' => [
				'plain' => __('Plain', 'x3p0-ideas')
			],
			'core/file' => [
				'icon'  => __('Icon',  'x3p0-ideas'),
				'plain' => __('Plain', 'x3p0-ideas')
			],
			'core/footnotes' => [
				'pull' => __('Pull', 'x3p0-ideas')
			],
			'core/gallery' => [
				'classic' => __('Classic', 'x3p0-ideas'),
				'reverse' => __('Reverse', 'x3p0-ideas')
			],
			'core/heading' => [
				'knockout'          => __('Knockout',      'x3p0-ideas'),
				'text-wrap-balance' => __('Wrap: Balance', 'x3p0-ideas')
			],
			'core/home-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/image' => [
				'borderless' => __('Borderless',   'x3p0-ideas'),
				'hand-drawn' => __('Hand-Drawn',   'x3p0-ideas'),
				'icon'       => __('Caption Icon', 'x3p0-ideas'),
				'polaroid'   => __('Polaroid',     'x3p0-ideas'),
				'tape'       => __('Tape',         'x3p0-ideas')
			],
			'core/list' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas')
			],
			'core/list-item' => [
				'cancel-circle' => __('Cancel Circle', 'x3p0-ideas'),
				'check-circle'  => __('Check Circle',  'x3p0-ideas')
			],
			'core/loginout' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/page-list' => [
				'horizontal' => __('Horizontal', 'x3p0-ideas'),
				'pull'       => __('Pull',       'x3p0-ideas')
			],
			'core/paragraph' => [
				'indent'  => __('Indent',  'x3p0-ideas'),
				'lead-in' => __('Lead-in', 'x3p0-ideas'),
				'lede'    => __('Lede',    'x3p0-ideas')
			],
			'core/post-author-name' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-comments-count' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-comments-form' => [
				'icons' => __('Icons', 'x3p0-ideas')
			],
			'core/post-comments-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-featured-image' => [
				'borderless' => __('Borderless', 'x3p0-ideas')
			],
			'core/post-date' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-template' => [
				'flex' => __('Flexible', 'x3p0-ideas')
			],
			'core/post-terms' => [
				'fill'    => __('Fill', 'x3p0-ideas'),
				'icon'    => __('Icon', 'x3p0-ideas'),
				'outline' => __('Outline', 'x3p0-ideas')
			],
			'core/post-time-to-read' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/pullquote' => [
				'mark-top' => __('Mark: Top', 'x3p0-ideas')
			],
			'core/search' => [
				'icon' => __('Icon',  'x3p0-ideas'),
				'sm'   => __('Small', 'x3p0-ideas')
			],
			'core/separator' => [
				'dashed'     => __('Dashed',     'x3p0-ideas'),
				'dotted'     => __('Dotted',     'x3p0-ideas'),
				'double'     => __('Double',     'x3p0-ideas'),
				'hand-drawn' => __('Hand Drawn', 'x3p0-ideas')
			],
			'core/social-links' => [
				'fill'     => __('Fill',     'x3p0-ideas'),
				'monotone' => __('Monotone', 'x3p0-ideas'),
				'outline'  => __('Outline',  'x3p0-ideas')
			],
			'core/site-title' => [
				'normalize' => __('Normalize', 'x3p0-ideas')
			],
			'core/table-of-contents' => [
				'chapters' => __('Chapters', 'x3p0-ideas'),
				'pull'     => __('Pull',     'x3p0-ideas')
			],
			'core/tag-cloud' => [
				'fill' => __('Fill', 'x3p0-ideas'),
				'flat' => __('Flat', 'x3p0-ideas'),
				'icon' => __('Icon', 'x3p0-ideas')
			]
		];
	}
}
