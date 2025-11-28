<?php

/**
 * Post Content block render filter.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render\Filters;

use WP_Block;
use WP_HTML_Tag_Processor;
use X3P0\Ideas\Block\Render\RenderFilter;
use X3P0\Ideas\View\ViewEngine;

/**
 * Filters rendered output for the `core/post-content` block.
 */
final class PostContent extends RenderFilter
{
	protected const BLOCK_TYPE = 'core/post-content';

	/**
	 * Sets up the object state.
	 */
	public function __construct(private readonly ViewEngine $viewEngine)
	{}

	/**
	 * Filters the post content block for handling password form fixes and
	 * attachment views.
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
	{
		if (empty($instance->context['postId'])) {
			return $content;
		}

		// Filter the password form if password required.
		if (post_password_required($instance->context['postId'])) {
			return $this->renderPasswordForm($content);
		}

		// Render the attachment view if is attachment page.
		if (is_attachment($instance->context['postId'])) {
			return $this->renderAttachmentView($content, $instance);
		}

		return $content;
	}

	/**
	 * Filters the post content block when it is password protected to add
	 * the `.wp-element-button` class to the submit button for the form.
	 * This ensures that it correctly uses the `theme.json` styling.
	 *
	 * @link https://github.com/WordPress/gutenberg/issues/70433
	 */
	private function renderPasswordForm(string $content): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		// Specifically look for `<input name="Submit"/>` and add the
		// `.wp-element-button` class to it.
		while ($processor->next_tag()) {
			if (
				'INPUT' === $processor->get_tag()
				&& 'Submit' === $processor->get_attribute('name')
			) {
				$processor->add_class(wp_theme_get_element_class_name('button'));
				break;
			}
		}

		return $processor->get_updated_html();
	}

	/**
	 * Filters the post content block when viewing single attachment views
	 * and returns block-based media content.
	 */
	private function renderAttachmentView(string $content, WP_Block $instance): string
	{
		// Assign needed data.
		$post_id = absint($instance->context['postId']);
		$data    = [ 'post_id' => $post_id ];

		// Bindable attributes hook prefix.
		$prefix = 'block_bindings_supported_attributes_core';

		// Bail if the hook has already fired. This is how we check that
		// a user is running WordPress 6.9+ and no longer needs this.
		if (
			wp_attachment_is('video', $post_id) && did_filter("{$prefix}/video")
			|| wp_attachment_is('audio', $post_id) && did_filter("{$prefix}/audio")
			|| did_filter("{$prefix}/file")
		) {
			return $content;
		}

		// Get the media view names.
		$media = $this->attachmentViewNames(
			'media',
			[ 'video', 'audio', 'pdf' ],
			$post_id
		);

		// Renders the media + block content + meta.
		return $this->viewEngine->renderIf($media, $data) . $content;
	}

	/**
	 * Returns the rendered attachment partial.
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
}
