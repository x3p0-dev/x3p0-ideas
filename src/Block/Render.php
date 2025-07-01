<?php

/**
 * The Render class handles filters on block rendering.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use WP_Block;
use WP_HTML_Tag_Processor;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};
use X3P0\Ideas\Views\Engine;

class Render implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 *
	 * @since 1.0.0
	 */
	public function __construct(
		protected Rules $rules,
		protected Engine $views
	) {}

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
	public function preRenderCorePostExcerpt(
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
	 * Disables the enhanced pagination feature for the Query Loop block.
	 * There is currently no `theme.json`-supported method of disabling it,
	 * so the only method is to filter the block data itself before render.
	 * @link  https://github.com/WordPress/gutenberg/issues/57623
	 *
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/render_block_data/
	 */
	#[Filter('render_block_data')]
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
	 * @since 1.0.0
	 */
	#[Filter('render_block', 'last')]
	public function renderByRule(
		string $content,
		array $block,
		WP_Block $instance
	): string {
		return $this->rules->isPublic($block, $instance) ? $content : '';
	}

	/**
	 * Filters the Button block on render. Currently, it checks if there is
	 * a `toggle-color-scheme` class, and if so, adds custom attributes to
	 * be used with the Interactivity API and enqueues a view script module.
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block_core/button')]
	public function renderCoreButton(string $content, array $block): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		if (
			$processor->next_tag([ 'class_name' => 'toggle-color-scheme'])
			&& $processor->next_tag('button')
		) {
			// Get color scheme cookie and sanitize.
			$scheme = isset($_COOKIE['color-scheme'])
				? sanitize_text_field(wp_unslash($_COOKIE['color-scheme']))
				: 'light dark';

			// Set the initial interactivity state.
			wp_interactivity_state('toggle-color-scheme', [
				'colorScheme' => $scheme
			]);

			// Add attributes for Interactivity API.
			$processor->set_attribute('data-wp-interactive', 'toggle-color-scheme');
			$processor->set_attribute('data-wp-bind--aria-pressed', 'state.darkMode');
			$processor->set_attribute('data-wp-on--click', 'actions.toggleMode');
			$processor->set_attribute('data-wp-watch', 'callbacks.updateColorScheme');
			$processor->set_attribute('data-wp-init', 'callbacks.initToggle');

			// Enqueue script module view.
			wp_enqueue_script_module('x3p0-ideas-toggle-color-scheme');
		}

		return $processor->get_updated_html();
	}

	/**
	 * Adds a caption class and replaces nav arrows.
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block_core/calendar')]
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
	 * Adds poster support for the Cover block by using the attachment's
	 * featured image if it exists.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/18962
	 */
	#[Filter('render_block_core/cover')]
	public function renderCoreCover(string $content, array $block): string
	{
		if (
			! isset($block['attrs']['backgroundType'])
			|| 'video' !== $block['attrs']['backgroundType']
			|| ! isset($block['attrs']['id'])
			|| ! $poster = get_the_post_thumbnail_url($block['attrs']['id'], 'full')
		) {
			return $content;
		}

		$processor = new WP_HTML_Tag_Processor($content);

		if (
			$processor->next_tag('video')
			&& is_null($processor->get_attribute('poster'))
		) {
			$processor->set_attribute('poster', $poster);
		}

		return $processor->get_updated_html();
	}

	/**
	 * Adds the `.wp-element-button` class to the login form's submit button.
	 * This is currently missing from core WP.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/50466
	 */
	#[Filter('render_block_core/loginout')]
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
	 * Removes the filter on `wp_trim_words` if it was added on the earlier
	 * `pre_render_block` hook.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/49449
	 * @see   Render::preRenderCorePostExcerpt()
	 */
	#[Filter('render_block_core/post-excerpt', 'first')]
	public function renderCorePostExcerpt(string $content): string
	{
		if ($priority = has_filter('wp_trim_words', [$this, 'formatManualExcerpt'])) {
			remove_filter('wp_trim_words', [$this, 'formatManualExcerpt'], $priority);
		}

		return $content;
	}

	/**
	 * WordPress doesn't add the taxonomy name to the tag cloud wrapper. In
	 * order for taxonomy-based block styles to work, the theme is adding
	 * a `.taxonomy-{taxonomy}` class to the wrapper.
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block_core/tag-cloud')]
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
	 * This filter first disables the Comments template part when there are
	 * no comments and commenting is disabled. Then, it adds a contextual
	 * class to the wrapping template part markup with the slug name (e.g.,
	 * `.wp-block-template-part-{slug}`).
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block_core/template-part')]
	public function renderCoreTemplatePart(string $content, array $block): string
	{
		if (
			isset($block['attrs']['slug'])
			&& 'comments' === $block['attrs']['slug']
			&& ! comments_open()
			&& 0 === absint(get_comments_number())
		) {
			return '';
		}

		$processor = new WP_HTML_Tag_Processor($content);

		if ($processor->next_tag(['class_name' => 'wp-block-template-part'])) {
			$processor->add_class(sprintf(
				'wp-block-template-part-%s',
				$block['attrs']['slug'] ?? 'unknown'
			));
		}

		return $processor->get_updated_html();
	}

	/**
	 * Filters the post content block when viewing single attachment views
	 * and returns block-based media content.
	 *
	 * @since 1.0.0
	 */
	#[Filter('render_block_core/post-content')]
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
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/pull/55551
	 */
	#[Filter('block_core_navigation_listable_blocks')]
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
	 * @since 1.0.0
	 */
	#[Filter('widget_archives_args', 'last')]
	public function setWidgetArchivesArgs(array $args): array
	{
		$before = $args['before'] ?? '';
		$after  = $args['after'] ?? '';

		$args['before'] = '<div class="wp-block-archives__content">' . $before;
		$args['after']  = $after . '</div>';

		return $args;
	}

	/**
	 * Filters `wp_trim_words` to allow the original text but removes
	 * unwanted tags. This is meant to be used only when the user has
	 * written a custom excerpt.
	 *
	 * @since 1.0.0
	 * @link  https://github.com/WordPress/gutenberg/issues/49449
	 * @see   Render::preRenderCorePostExcerpt()
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
