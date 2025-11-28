<?php

/**
 * Block style variation registrar.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Style;

use WP_Block_Styles_Registry;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Registers/unregisters block style variations.
 */
final class StyleRegistrar implements Bootable
{
	/**
	 * Core block styles to unregister that are not possible to unregister
	 * via `unregister_block_style()` due to being registered via JS.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const UNREGISTER_STYLES = [
		'core/button'       => [ 'fill', 'outline' ],
		'core/quote'        => [ 'plain' ],
		'core/separator'    => [ 'dots', 'wide' ],
		'core/social-links' => [ 'pill-shape' ],
		'core/tag-cloud'    => [ 'outline' ]
	];

	/**
	 * Sets up the object state.
	 */
	public function __construct(protected WP_Block_Styles_Registry $styles)
	{}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->register(...));
		add_filter('block_type_metadata', $this->unregisterCoreStyles(...));
	}

	/**
	 * Register custom block styles.
	 */
	private function register(): void
	{
		// Register Primary button separately because we need to set it
		// as the default. Basically, this is essentially changing the
		// user-facing label. The variation actually uses the default
		// Button block styles.
		$this->styles->register('core/button', [
			'name'       => 'button-filled',
			'label'      => __('Filled', 'x3p0-ideas'),
			'is_default' => true
		]);

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
	 * Because Core block styles are registered via JavaScript, you cannot
	 * unregister them via `unregister_block_style()`. You can unregister
	 * using JavaScript or by filtering the block type's metadata, which
	 * we're doing here.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/25330
	 */
	private function unregisterCoreStyles(array $metadata): array
	{
		if (
			! isset(self::UNREGISTER_STYLES[$metadata['name']])
			|| ! isset($metadata['styles'])
		) {
			return $metadata;
		}

		$remove = self::UNREGISTER_STYLES[$metadata['name']];

		$metadata['styles'] = array_values(array_filter(
			$metadata['styles'],
			fn($style) => ! in_array($style['name'], $remove, true)
		));

		return $metadata;
	}

	/**
	 * Returns an array of custom block style variations to register.
	 */
	private function getCustomStyles(): array
	{
		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		return [
			'core/archives' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas'),
				'list-spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/categories' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas'),
				'list-spread'     => __('Spread',     'x3p0-ideas')
			],
			'core/columns' => [
				'columns-reverse-stack' => __('Reverse Mobile Stack', 'x3p0-ideas')
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
			'core/details' => [
				'details-plain' => __('Plain', 'x3p0-ideas')
			],
			'core/file' => [
				'icon' => __('Icon',  'x3p0-ideas')
			],
			'core/footnotes' => [
				'list-pull' => __('Pull', 'x3p0-ideas')
			],
			'core/gallery' => [
				'gallery-classic' => __('Classic', 'x3p0-ideas')
			],
			'core/home-link' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/image' => [
				'icon' => __('Caption Icon', 'x3p0-ideas'),
			],
			'core/list' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas')
			],
			'core/list-item' => [
				'list-item-positive' => __('Positive', 'x3p0-ideas'),
				'list-item-negative' => __('Negative', 'x3p0-ideas')
			],
			'core/loginout' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/page-list' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas')
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
			'core/post-date' => [
				'icon' => __('Icon', 'x3p0-ideas')
			],
			'core/post-template' => [
				'flex' => __('Flexible', 'x3p0-ideas')
			],
			'core/post-terms' => [
				'icon' => __('Icon', 'x3p0-ideas')
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
			'core/social-links' => [
				'monotone' => __('Monotone', 'x3p0-ideas')
			],
			'core/table-of-contents' => [
				'list-pull' => __('Pull', 'x3p0-ideas')
			],
			'core/tag-cloud' => [
				'emoji' => __('Emoji', 'x3p0-ideas'),
				'flat'  => __('Flat', 'x3p0-ideas'),
				'icon'  => __('Icon', 'x3p0-ideas')
			],
			'x3p0/authors' => [
				'list-horizontal' => __('Horizontal', 'x3p0-ideas'),
				'list-pull'       => __('Pull',       'x3p0-ideas'),
				'list-spread'     => __('Spread',     'x3p0-ideas')
			]
		];
		// phpcs:enable
	}
}
