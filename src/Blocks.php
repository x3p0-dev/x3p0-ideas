<?php

/**
 * Block-related filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use FilesystemIterator;
use WP_Block;
use WP_Block_Type_Registry;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\{BlockRules, HookAnnotation};
use X3P0\Ideas\Views\Engine;

class Blocks implements Bootable
{
	use HookAnnotation;

	/**
	 * Stores the supported block namespaces that we use for block stylesheets.
	 *
	 * @since 1.0.0
	 * @todo  Type hint with PHP 8.3+ requirement.
	 */
	protected const NAMESPACES = [
		'core'
	];

	/**
	 * Stores the instance of the block type registry.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected WP_Block_Type_Registry $types;

	/**
	 * Instance of block rules, which is used to determine whether to show
	 * a block.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected BlockRules $rules;

	/**
	 * Instance of the view engine.
	 *
	 * @since 1.0.0
	 * @todo  Promote via the constructor with PHP 8.0+ requirement.
	 */
	protected Engine $views;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 * @todo  Promote to properties with PHP 8.0+ requirement.
	 */
	public function __construct(
		WP_Block_Type_Registry $types,
		BlockRules $rules,
		Engine $views
	) {
		$this->types = $types;
		$this->rules = $rules;
		$this->views = $views;
	}

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
	 * Enqueues block-specific styles so that they only load when the block
	 * is in use. Block styles stored under `/assets/css/blocks` are
	 * automatically enqueued. Each file should be named
	 * `{$block_namespace}/{$block_slug}.css`.
	 *
	 * @hook  init  last
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/
	 */
	public function enqueueStyles(): void
	{
		// Get the block namespace paths.
		$paths = array_map(
			fn($namespace) => get_parent_theme_file_path("public/css/blocks/{$namespace}"),
			self::NAMESPACES
		);

		// Loop through each of the block namespace paths, get their
		// stylesheets, and enqueue them.
		foreach ($paths as $path) {
			$files = new FilesystemIterator($path);

			foreach ($files as $file) {
				if (! $file->isDir() && 'css' === $file->getExtension()) {
					$this->enqueueStyle(
						basename($path),
						$file->getBasename('.css')
					);
				}
			}
		}
	}

	/**
	 * Enqueues an individual block stylesheet based on a given block
	 * namespace and slug.
	 *
	 * @since 1.0.0
	 */
	private function enqueueStyle(string $namespace, string $slug): void
	{
		// Build a relative path and URL string.
		$relative = "public/css/blocks/{$namespace}/{$slug}";

		// Bail if the block is not registered or if the asset file
		// doesn't exist.
		if (
			! $this->types->is_registered("{$namespace}/{$slug}")
			|| ! file_exists(get_parent_theme_file_path("{$relative}.asset.php"))
		) {
			return;
		}

		// Get the asset file.
		$asset = include get_parent_theme_file_path("{$relative}.asset.php");

		// Register the block style.
		wp_enqueue_block_style("{$namespace}/{$slug}", [
			'handle' => "x3p0-ideas-block-{$namespace}-{$slug}",
			'src'    => get_parent_theme_file_uri("{$relative}.css"),
			'path'   => get_parent_theme_file_path("{$relative}.css"),
			'deps'   => $asset['dependencies'],
			'ver'    => $asset['version']
		]);
	}

	/**
	 * Disables the enhanced pagination feature for the Query Loop block.
	 * There is currently no `theme.json`-supported method of disabling it,
	 * so the only method is to filter the block data itself before render.
	 * @link  https://github.com/WordPress/gutenberg/issues/57623
	 *
	 * @hook  render_block_data
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/render_block_data/
	 */
	public function renderCoreQueryData(array $parsed_block): array
	{
		if ('core/query' === $parsed_block['blockName']) {
			$parsed_block['attrs']['enhancedPagination'] = false;
		}

		return $parsed_block;
	}

	/**
	 * Filters block content, determining if it should be shown according to
	 * any rules passed in via attributes.
	 *
	 * @hook  render_block  last
	 * @since 1.0.0
	 */
	public function renderBlockByRule(
		string $block_content,
		array $block
	): string {
		return $this->rules->isPublic($block) ? $block_content : '';
	}

	/**
	 * Really hacky method to replace the arrows in the calendar to match
	 * the theme's arrows.
	 *
	 * @hook  render_block
	 * @since 1.0.0
	 */
	public function renderCoreCalendar(
		string $block_content,
		array $block
	): string {
		if ('core/calendar' !== $block['blockName']) {
			return $block_content;
		}

		return str_replace(
			[ '&raquo;', '&laquo;' ],
			[ '&rarr;',  '&larr;'  ],
			$block_content
		);
	}

	/**
	 * Filters the post content block when viewing single attachment views
	 * and returns block-based media content.
	 *
	 * @hook  render_block
	 * @since 1.0.0
	 */
	public function renderCorePostContent(
		string $block_content,
		array $block,
		WP_Block $instance
	): string {
		// Bail early if there's no post ID or not specifically viewing
		// the attachment page for this specific post.
		if (
			'core/post-content' !== $block['blockName']
			|| empty($instance->context['postId'])
			|| ! is_attachment($instance->context['postId'])
		) {
			return $block_content;
		}

		// Assign needed data.
		$post_id = absint($instance->context['postId']);
		$data    = [ 'post_id' => $post_id ];

		// Get the media and meta view names.
		$media = $this->attachmentViewNames('media', $post_id);
		$meta  = $this->attachmentViewNames('meta', $post_id);

		// Renders the media + block content + meta.
		return $this->views->renderIf($media, $data)
			. $block_content
			. $this->views->renderIf($meta, $data);
	}

	/**
	 * Returns the rendered attachment partial.
	 *
	 * @since 1.0.0
	 */
	private function attachmentViewNames(string $name, int $post_id): array
	{
		foreach ([ 'image', 'video', 'audio', 'pdf' ] as $type) {
			if (wp_attachment_is($type, $post_id)) {
				return [
					"attachment.{$name}-{$type}",
					"attachment.{$name}"
				];
			}
		}

		return [ "attachment-{$name}" ];
	}
}
