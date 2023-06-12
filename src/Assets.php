<?php
/**
 * The Assets class is responsible for registering and/or enqueuing the theme's
 * CSS and JavaScript.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @link      https://justintadlock.com
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;

class Assets implements Bootable
{
	/**
         * Boots the component, running its actions/filters.
         *
         * @since 1.0.0
         */
	public function boot(): void
	{
		// Load editor scripts and styles.
		add_action( 'after_setup_theme',           [ $this, 'addEditorStyles'     ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'enqueueEditorAssets' ] );

                // Load front-end scripts and styles.
                add_action( 'wp_enqueue_scripts', [ $this, 'enqueueAssets'] );

		// Load block styles.
                add_action( 'init', [ $this, 'enqueueBlockStyles' ] );

		// Disable the emoji script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	}

        /**
	 * Add editor stylesheets.
	 *
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/add_editor_style/
	 */
        public function addEditorStyles(): void
	{
		add_editor_style( [
			get_parent_theme_file_uri( 'public/css/screen.css' )
		] );
	}

        /**
	 * Loads editor assets.
	 *
	 * @since 1.0.0
	 */
        public function enqueueEditorAssets(): void
	{
		$script_asset = include get_parent_theme_file_path( 'public/js/editor.asset.php'  );
		$style_asset  = include get_parent_theme_file_path( 'public/css/editor.asset.php' );

		wp_enqueue_script(
			'x3p0-ideas-editor',
			get_parent_theme_file_uri( 'public/js/editor.js' ),
			$script_asset['dependencies'],
			$script_asset['version'],
			true
		);

		wp_enqueue_style(
			'x3p0-ideas-editor',
			get_parent_theme_file_uri( 'public/css/editor.css' ),
			$style_asset['dependencies'],
			$style_asset['version']
		);
	}

        /**
	 * Enqueue scripts/styles for the front end.
	 *
	 * @since 1.0.0
	 */
        public function enqueueAssets(): void
	{
		$asset = include get_parent_theme_file_path( 'public/css/screen.asset.php' );

		// Loads the primary stylesheet.
		wp_enqueue_style(
			'x3p0-ideas-style',
			get_parent_theme_file_uri( 'public/css/screen.css' ),
			$asset['dependencies'],
			$asset['version']
		);
	}

	/**
         * Enqueues block-specific styles so that they only load when the block
         * is in use. Block styles are stored under `/assets/css/blocks` are
	 * automatically enqueued. Each file should be named
	 * `{$block_namespace}-{$block_slug}.css`.
         *
         * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/
         */
        public function enqueueBlockStyles(): void
	{
		// Gets all the block stylesheets.
		$files = glob( get_parent_theme_file_path( 'public/css/blocks/*.css' ) );

		foreach ( $files as $file ) {

			// Gets the filename without the path or extension.
			$name = str_replace( [
				get_parent_theme_file_path( 'public/css/blocks/' ),
				'.css'
			], '', $file );

			// Sanitize the name to make sure it contains only
			// characters allowed in a block type name.
			$name = preg_replace( '/[^a-z0-9-]/', '', strtolower( $name ) );

			// Get the position of the first hyphen.
			$pos = strpos( $name, '-' );

			// Bail if there is no hyphen.
			if ( false === $pos ) {
				continue;
			}

			// Converts the filename to its associated block name by
			// replacing the first `-` with a `/`. Filenames must
			// use `{namespace}-{slug}` for this to work.
			$block = substr_replace( $name, '/', $pos, 1 );

			// Get the asset file.
			$asset = include get_parent_theme_file_path( "public/css/blocks/{$name}.asset.php" );

			// Register the block style.
			wp_enqueue_block_style( $block, [
				'handle' => "x3p0-ideas-block-{$name}",
				'src'    => get_parent_theme_file_uri( "public/css/blocks/{$name}.css"  ),
				'path'   => get_parent_theme_file_path( "public/css/blocks/{$name}.css" ),
				'deps'   => $asset['dependencies'],
				'ver'    => $asset['version']
			] );
		}
	}
}
