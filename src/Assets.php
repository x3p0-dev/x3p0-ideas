<?php
/**
 * The Assets class is responsible for registering and/or enqueuing the theme's
 * CSS and JavaScript.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use FilesystemIterator;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Assets implements Bootable
{
	use HookAnnotation;

	/**
	 * Stores the supported block namespaces.
	 *
	 * @since 1.0.0
	 */
	protected array $block_namespaces = [
		'core'
	];

	/**
	 * Inline CSS limit.
	 *
	 * @since 1.0.0
	 */
	protected int $inline_css_limit = 50000;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	public function boot(): void
	{
		$this->hookMethods();

		// Disable the emoji script.
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	}

	/**
	 * Custom inline CSS size limit.
	 *
	 * @hook styles_inline_size_limit
	 * @since 1.0.0
	 */
	public function stylesInlineSizeLimit( int $total_inline_limit ): int
	{
		return $this->inline_css_limit > $total_inline_limit
		       ? $this->inline_css_limit
		       : $total_inline_limit;
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
		add_editor_style( [
			get_parent_theme_file_uri( 'public/css/screen.css' )
		] );
	}

	/**
	 * Loads editor assets.
	 *
	 * @hook   enqueue_block_editor_assets
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
	 * @hook  wp_enqueue_scripts
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
	 * `{$block_namespace}/{$block_slug}.css`.
	 *
	 * @hook  init
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/
	 */
	public function enqueueBlockStyles(): void
	{
		// Get the block namespace paths.
		$paths = array_map(
			fn( $namespace ) => get_parent_theme_file_path( "public/css/blocks/{$namespace}" ),
			$this->block_namespaces
		);

		// Loop through each of the block namespace paths, get their
		// stylesheets, and enqueue them.
		foreach ( $paths as $path ) {
			$files = new FilesystemIterator( $path );

			foreach ( $files as $file ) {
				if ( ! $file->isDir() && 'css' === $file->getExtension() ) {
					$this->enqueueBlockStyle(
						basename( $path ),
						$file->getBasename( '.css' )
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
	private function enqueueBlockStyle( string $namespace, string $slug ): void
	{
		// Build a relative path and URL string.
		$relative = "public/css/blocks/{$namespace}/{$slug}";

		// Bail if the asset file doesn't exist.
		if ( ! file_exists( get_parent_theme_file_path( "{$relative}.asset.php" ) ) ) {
			return;
		}

		// Get the asset file.
		$asset = include get_parent_theme_file_path( "{$relative}.asset.php" );

		// Register the block style.
		wp_enqueue_block_style( "{$namespace}/{$slug}", [
			'handle' => "x3p0-ideas-block-{$namespace}-{$slug}",
			'src'    => get_parent_theme_file_uri( "{$relative}.css"  ),
			'path'   => get_parent_theme_file_path( "{$relative}.css" ),
			'deps'   => $asset['dependencies'],
			'ver'    => $asset['version']
		] );
	}
}
