<?php

/**
 * Embed assets class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Embed;

use X3P0\Ideas\Framework\Contracts\Bootable;

final class EmbedAssets implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('enqueue_embed_scripts', $this->enqueue(...));
	}

	/**
	 * Loads assets needed for the embed.
	 */
	private function enqueue(): void
	{
		$embed_styles = file_get_contents(get_parent_theme_file_path('public/css/embed.css'));
		$style_asset  = include get_parent_theme_file_path('public/css/embed.asset.php');

		// Register empty stylesheet so that our inline styles can
		// piggyback off of it. Use the core `wp-embed-template` style
		// as a dependency so that our styles will load afterward. We
		// cannot add our inline styles directly to it due to the way
		// that its own inline styles are loaded (no way to add ours
		// after it's been enqueued).
		wp_register_style(
			'x3p0-ideas-embed',
			false,
			[ 'wp-embed-template' ],
			$style_asset['version']
		);

		// Add inline styles.
		wp_add_inline_style('x3p0-ideas-embed', wp_get_global_stylesheet());
		wp_add_inline_style('x3p0-ideas-embed', $embed_styles);

		// Enqueue embed style.
		wp_enqueue_style('x3p0-ideas-embed');
	}
}
