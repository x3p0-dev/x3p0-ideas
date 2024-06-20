<?php

/**
 * Block-related filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2023 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use FilesystemIterator;
use WP_Block;
use WP_Block_Type_Registry;
use WP_HTML_Tag_Processor;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\{BlockRules, CodeBlockHighlight, HookAnnotation};
use X3P0\Ideas\Views\Engine;

class Blocks implements Bootable
{
	use HookAnnotation;

	/**
	 * Stores the supported block namespaces that we use for block stylesheets.
	 *
	 * @since 1.0.0
	 * @var   string[]
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
	 * @todo  Promote params to properties with PHP 8.0+ requirement.
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
		// Loop through each of the block namespace paths, get their
		// stylesheets, and enqueue them.
		foreach (self::NAMESPACES as $namespace) {
			$files = new FilesystemIterator(
				get_parent_theme_file_path("public/css/blocks/{$namespace}")
			);

			foreach ($files as $file) {
				if (! $file->isDir() && 'css' === $file->getExtension()) {
					$this->enqueueStyle(
						$namespace,
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

		// Bail if the asset file doesn't exist.
		if (! file_exists(get_parent_theme_file_path("{$relative}.asset.php"))) {
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
	 * Filters the Avatar block args to set custom selectors via the
	 * Selectors API. Originally, Core set the border to the wrapping `<div>`
	 * for around the image. This was fixed by applying the border to the
	 * image itself. But that has the unfortunate side effect of link
	 * outlines not being sharing the same radius. So we fix this in CSS.
	 *
	 * @hook  register_block_type_args  last
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/pull/53007
	 */
	public function setCoreAvatarArgs(array $args, string $name): array
	{
		if ('core/avatar' === $name) {
			$args['selectors']['border'] = '.wp-block-avatar';
		}

		return $args;
	}

	/**
	 * Filters the Navigation Submenu block args to set custom selectors via
	 * the Selectors API. We must do this so that values set in `theme.json`
	 * for `core/navigation-submenu` are applied only to the submenu
	 * container. Without this, the values are set to both the container
	 * and the parent menu item.
	 *
	 * @hook  register_block_type_args  last
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/block-editor/reference-guides/block-api/block-selectors/
	 * @link  https://github.com/WordPress/gutenberg/issues/39392
	 */
	public function setCoreNavigationSubmenuArgs(array $args, string $name): array
	{
		if ('core/navigation-submenu' !== $name) {
			return $args;
		}

		return [ 'selectors' => [
			// Target the submenu and the responsive container.
			'root'       => '.wp-block-navigation-submenu .wp-block-navigation__submenu-container, nav.wp-block-navigation.wp-block-navigation .wp-block-navigation__responsive-container.is-menu-open',
			'color'      => 'nav.wp-block-navigation .wp-block-navigation-submenu .wp-block-navigation__submenu-container, nav.wp-block-navigation.wp-block-navigation .wp-block-navigation__responsive-container.is-menu-open',
			// Only target the submenu.
			'border'     => 'nav.wp-block-navigation .wp-block-navigation-submenu .wp-block-navigation__submenu-container',
			'spacing'    => '.wp-block-navigation-submenu .wp-block-navigation__submenu-container',
			'typography' => '.wp-block-navigation-submenu .wp-block-navigation__submenu-container'
		] ] + $args;
	}

	/**
	 * Adds support for background images to the Heading block so that the
	 * `clip-text` style variation can work.
	 *
	 * @hook  register_block_type_args  last
	 * @since 1.0.0
	 */
	public function setCoreHeadingArgs(array $args, string $name): array
	{
		if ('core/heading' === $name && !isset($args['supports']['background'])) {
			$args['supports']['background'] = [
				'backgroundImage' => true,
				'backgroundSize'  => true
			];
		}

		return $args;
	}

	/**
	 * Adds spacing support to the Post Template block.
	 *
	 * @hook  register_block_type_args  last
	 * @since 1.0.0
	 */
	public function setCorePostTemplateArgs(array $args, string $name): array
	{
		if ('core/post-template' === $name) {
			$args['supports']['spacing']            ??= [];
			$args['supports']['spacing']['padding'] ??= true;
		}

		return $args;
	}

	/**
	 * Adds spacing support to the Query Loop block.
	 *
	 * @hook  register_block_type_args  last
	 * @since 1.0.0
	 */
	public function setCoreQueryArgs(array $args, string $name): array
	{
		if ('core/query' === $name) {
			$args['supports']['spacing']             ??= [];
			$args['supports']['spacing']['blockGap'] ??= true;
			$args['supports']['spacing']['padding']  ??= true;
		}

		return $args;
	}

	/**
	 * Adds support for Paragraphs to the Query Pagination block. This is
	 * specifically needed for binding a pagination label. Also adds spacing
	 * support.
	 *
	 * @hook  register_block_type_args  last
	 * @since 1.0.0
	 */
	public function setCoreQueryPaginationArgs(array $args, string $name): array
	{
		if ('core/query-pagination' === $name) {
			$args['allowed_blocks'][] = 'core/paragraph';

			$args['supports']['spacing']            ??= [];
			$args['supports']['spacing']['margin']  ??= [ 'top', 'bottom' ];
			$args['supports']['spacing']['padding'] ??= true;
		}

		return $args;
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
	public function renderByRule(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		return $this->rules->isPublic($block, $instance) ? $content : '';
	}

	/**
	 * Adds a caption class and replaces nav arrows.
	 *
	 * @hook  render_block_core/calendar
	 * @since 1.0.0
	 */
	public function renderCoreCalendar(string $content): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		// Ensures the table caption has the same class as other the
		// other captions in WordPress. The `.wp-element-caption` class
		// is necessary for styling this via `theme.json`.
		if ($processor->next_tag('caption')) {
			$processor->add_class(wp_theme_get_element_class_name('caption'));
		}

		// Hacky method to replace the arrows until the HTML API allows
		// replacing inner text.
		return str_replace(
			[ '&raquo;', '&laquo;' ],
			[ '&rarr;',  '&larr;'  ],
			$processor->get_updated_html()
		);
	}

	/**
	 * Adds Code block highlight functionality and fixes `<br>` tags.
	 *
	 * @hook  render_block_core/code
	 * @since 1.0.0
	 */
	public function renderCoreCode(string $content, array $block): string
	{
		return (new CodeBlockHighlight($content, $block))->render();
	}

	/**
	 * Adds the `.wp-element-button` class to the login form's submit button.
	 * This is currently missing from core WP.
	 *
	 * @hook  render_block_core/loginout
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/50466
	 */
	public function renderCoreLoginout(string $content, array $block): string
	{
		if (
			empty($block['attrs']['displayLoginAsForm'])
			|| is_user_logged_in()
		) {
			return $content;
		}

		$processor = new WP_HTML_Tag_Processor($content);

		// Specifically look for `<input name="wp-submit"/>` and add the
		// `.wp-element-button` class to it.
		while ($processor->next_tag()) {
			if (
				'INPUT' === $processor->get_tag()
				&& 'wp-submit' === $processor->get_attribute('name')
			) {
				$processor->add_class(wp_theme_get_element_class_name('button'));
				break;
			}
		}

		return $processor->get_updated_html();
	}

	/**
	 * WordPress doesn't add the taxonomy name to the tag cloud wrapper. In
	 * order for taxonomy-based block styles to work, the theme is adding
	 * a `.taxonomy-{taxonomy}` class to the wrapper.
	 *
	 * @hook  render_block_core/tag-cloud
	 * @since 1.0.0
	 */
	public function renderCoreTagCloud(string $content, array $block): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		if ($processor->next_tag('p')) {
			$processor->add_class(sprintf(
				'taxonomy-%s',
				$block['attrs']['taxonomy'] ?? 'post_tag'
			));
		}

		return $processor->get_updated_html();
	}

	/**
	 * Filters the post content block when viewing single attachment views
	 * and returns block-based media content.
	 *
	 * @hook  render_block_core/post-content
	 * @since 1.0.0
	 */
	public function renderCorePostContent(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		// Bail early if there's no post ID or not specifically viewing
		// the attachment page for this specific post.
		if (
			empty($instance->context['postId'])
			|| ! is_attachment($instance->context['postId'])
		) {
			return $content;
		}

		// Assign needed data.
		$post_id = absint($instance->context['postId']);
		$data    = [ 'post_id' => $post_id ];

		// Get the media view names.
		$media = $this->attachmentViewNames(
			'media',
			[ 'video', 'audio', 'pdf' ],
			$post_id
		);

		// Renders the media + block content + meta.
		return $this->views->renderIf($media, $data) . $content;
	}

	/**
	 * Returns the rendered attachment partial.
	 *
	 * @since 1.0.0
	 */
	private function attachmentViewNames(string $name, array $types, int $post_id): array
	{
		foreach ($types as $type) {
			if (wp_attachment_is($type, $post_id)) {
				return [
					"attachment/{$name}-{$type}",
					"attachment/{$name}"
				];
			}
		}

		return [ "attachment-{$name}" ];
	}

	/**
	 * Adds missing wrapping `<li>` to the Loginout block when used in a
	 * navigation menu.
	 *
	 * @hook  block_core_navigation_listable_blocks
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/pull/55551
	 */
	public function setListItemWrapper(array $blocks): array
	{
		return [ 'core/loginout' ] + $blocks;
	}

	/**
	 * Filter on the `widget_archives_args` hook, which is also used in the
	 * Archives block to pass the arguments to the `wp_get_archives()`
	 * function. We're using it here to give a wrapper `<div>` to individual
	 * list items. This provides a bit more design flexibility with custom
	 * block styles.
	 *
	 * @hook  widget_archives_args last
	 * @since 1.0.0
	 */
	public function setWidgetArchivesArgs(array $args): array
	{
		$before = $args['before'] ?? '';
		$after  = $args['after'] ?? '';

		$args['before'] = '<div class="wp-block-archives__content">' . $before;
		$args['after']  = $after . '</div>';

		return $args;
	}
}
