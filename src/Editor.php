<?php

/**
 * Editor class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Support\Hooks\{Action, Filter, Hookable};

/**
 * The Editor class handles actions and filters that are needed for running
 * when the block editor is in use. This is primarily needed for enqueueing
 * scripts and styles.
 */
class Editor implements Bootable
{
	use Hookable;

	/**
	 * Add editor stylesheets.
	 *
	 * @link https://developer.wordpress.org/reference/functions/add_editor_style/
	 */
	#[Action('after_setup_theme')]
	public function addEditorStyles(): void
	{
		add_editor_style([
			get_parent_theme_file_uri('public/css/screen.css')
		]);
	}

	/**
	 * Loads editor assets.
	 */
	#[Action('enqueue_block_editor_assets')]
	public function enqueueAssets(): void
	{
		$script_asset = include get_parent_theme_file_path('public/js/editor.asset.php');
		$style_asset  = include get_parent_theme_file_path('public/css/editor.asset.php');

		wp_enqueue_script(
			'x3p0-ideas-editor',
			get_parent_theme_file_uri('public/js/editor.js'),
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		wp_enqueue_style(
			'x3p0-ideas-editor',
			get_parent_theme_file_uri('public/css/editor.css'),
			$style_asset['dependencies'],
			$style_asset['version']
		);

		// Set translations for editor scripts.
		// @link https://developer.wordpress.org/reference/functions/wp_set_script_translations/
		wp_set_script_translations('x3p0-ideas-editor', 'x3p0-ideas');
	}

	/**
	 * Customizes the block editor settings.
	 */
	#[Filter('block_editor_settings_all', 'last')]
	public function registerSettings(array $settings): array
	{
		$settings['imageDefaultSize']   = 'x3p0-wide';
		$settings['fontLibraryEnabled'] = false;

		return $settings;
	}
}
