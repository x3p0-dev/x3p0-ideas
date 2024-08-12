<?php

/**
 * The Editor class handles actions and filters that are needed for running
 * when the block editor is in use. This is primarily needed for enqueueing
 * scripts and styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas;

use WP_Block_Editor_Context;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Editor implements Bootable
{
	use HookAnnotation;

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
	 * Add editor stylesheets.
	 *
	 * @hook  after_setup_theme
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/
	 */
	public function addEditorStyles(): void
	{
		add_editor_style([
			get_parent_theme_file_uri('public/css/screen.css')
		]);
	}

	/**
	 * Loads editor assets.
	 *
	 * @hook  enqueue_block_editor_assets
	 * @since 1.0.0
	 */
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
	 *
	 * @hook  block_editor_settings_all last
	 * @since 1.0.0
	 */
	public function registerSettings(
		array $settings,
		WP_Block_Editor_Context $context
	): array {
		// Load all theme fonts on the Site Editor screen.
		if ('core/edit-site' === $context->name) {
			$settings['styles'][] = [
				'css' => $this->getFontCss()
			];
		}

		$settings['imageDefaultSize']   = 'x3p0-wide';
		$settings['fontLibraryEnabled'] = false;

		// Ensures default spacing sizes are disabled.
		// @link https://github.com/WordPress/gutenberg/pull/62199
		$settings['__experimentalFeatures']['spacing']['defaultSpacingSizes'] = false;

		return $settings;
	}

	/**
	 * Quick and hacky method of loading all fonts.
	 *
	 * @since  1.0.0
	 * @todo   Create a more functional method of loading these.
	 */
	private function getFontCss(): string
	{
		$path = get_parent_theme_file_uri();
		return "
		@font-face{font-family:Jost;font-style:normal;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/jost/jost.woff2') format('woff2');font-feature-settings:'tnum', 'ss01' 1;font-stretch:normal;}
		@font-face{font-family:Jost;font-style:italic;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/jost/jost-italic.woff2') format('woff2');font-feature-settings:'tnum', 'ss01' 1;font-stretch:normal;}
		@font-face{font-family:'Roboto Flex';font-style:normal;font-weight:100 1000;font-display:fallback;src:url('{$path}/public/fonts/roboto/roboto-flex.woff2') format('woff2');font-stretch:25% 151%;}
		@font-face{font-family:'Roboto Slab';font-style:normal;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/roboto/roboto-slab.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Playfair;font-style:normal;font-weight:200 700;font-display:fallback;src:url('{$path}/public/fonts/playfair/playfair.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Playfair;font-style:italic;font-weight:200 700;font-display:fallback;src:url('{$path}/public/fonts/playfair/playfair-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Dancing Script';font-style:normal;font-weight:400 700;font-display:fallback;src:url('{$path}/public/fonts/dancing-script/dancing-script.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Cabin;font-style:normal;font-weight:400 700;font-display:fallback;src:url('{$path}/public/fonts/cabin/cabin.woff2') format('woff2');font-stretch:75% 100%;}
		@font-face{font-family:Cabin;font-style:italic;font-weight:400 700;font-display:fallback;src:url('{$path}/public/fonts/cabin/cabin-italic.woff2') format('woff2');font-stretch:75% 100%;}
		@font-face{font-family:'Plus Jakarta Sans';font-style:normal;font-weight:200 800;font-display:fallback;src:url('{$path}/public/fonts/plus-jakarta-sans/plus-jakarta-sans.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Plus Jakarta Sans';font-style:italic;font-weight:200 800;font-display:fallback;src:url('{$path}/public/fonts/plus-jakarta-sans/plus-jakarta-sans-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'JetBrains Mono';font-style:normal;font-weight:100 800;font-display:fallback;src:url('{$path}/public/fonts/jetbrains-mono/jetbrains-mono.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'JetBrains Mono';font-style:italic;font-weight:100 800;font-display:fallback;src:url('{$path}/public/fonts/jetbrains-mono/jetbrains-mono-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Source Serif';font-style:normal;font-weight:200 900;font-display:fallback;src:url('{$path}/public/fonts/source/source-serif.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Source Serif';font-style:italic;font-weight:200 900;font-display:fallback;src:url('{$path}/public/fonts/source/source-serif-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Playfair Display';font-style:normal;font-weight:400 900;font-display:fallback;src:url('{$path}/public/fonts/playfair/playfair-display.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Playfair Display';font-style:italic;font-weight:400 900;font-display:fallback;src:url('{$path}/public/fonts/playfair/playfair-display-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Source Sans';font-style:normal;font-weight:200 900;font-display:fallback;src:url('{$path}/public/fonts/source/source-sans.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Source Sans';font-style:italic;font-weight:200 900;font-display:fallback;src:url('{$path}/public/fonts/source/source-sans-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Satisfy;font-style:normal;font-weight:400;font-display:fallback;src:url('{$path}/public/fonts/satisfy/satisfy.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Montserrat;font-style:normal;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/montserrat/montserrat.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Montserrat;font-style:italic;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/montserrat/montserrat-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Caveat;font-style:normal;font-weight:400 700;font-display:fallback;src:url('{$path}/public/fonts/caveat/caveat.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Raleway;font-style:normal;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/raleway/raleway.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Raleway;font-style:italic;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/raleway/raleway-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Work Sans';font-style:normal;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/work-sans/work-sans.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Work Sans';font-style:italic;font-weight:100 900;font-display:fallback;src:url('{$path}/public/fonts/work-sans/work-sans-italic.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Roboto Serif';font-style:normal;font-weight:100 900;font-display:fallback;src:url('{$path}/experimental/fonts/roboto/roboto-serif.woff2') format('woff2');font-stretch:100%;}
		@font-face{font-family:'Roboto Serif';font-style:italic;font-weight:100 900;font-display:fallback;src:url('{$path}/experimental/fonts/roboto/roboto-serif-italic.woff2') format('woff2');font-stretch:100%;}
		@font-face{font-family:Oswald;font-style:normal;font-weight:200 700;font-display:fallback;src:url('{$path}/public/fonts/oswald/oswald.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Permanent Marker';font-style:normal;font-weight:400;font-display:fallback;src:url('{$path}/public/fonts/permanent-marker/permanent-marker.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Send Flowers';font-style:normal;font-weight:400;font-display:fallback;src:url('{$path}/public/fonts/send-flowers/send-flowers.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Quicksand;font-style:normal;font-weight:300 700;font-display:fallback;src:url('{$path}/public/fonts/quicksand/quicksand.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Elsie Swash Caps';font-style:normal;font-weight:400;font-display:fallback;src:url('{$path}/public/fonts/elsie/elsie-swash-caps.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:'Elsie Swash Caps';font-style:normal;font-weight:900;font-display:fallback;src:url('{$path}/public/fonts/elsie/elsie-swash-caps-900.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Lora;font-style:normal;font-weight:400 700;font-display:fallback;src:url('{$path}/x3p0-ideas/public/fonts/lora/lora.woff2') format('woff2');font-stretch:normal;}
		@font-face{font-family:Lora;font-style:italic;font-weight:400 700;font-display:fallback;src:url('{$path}/x3p0-ideas/public/fonts/lora/lora.woff2') format('woff2');font-stretch:normal;}
		";
	}
}
