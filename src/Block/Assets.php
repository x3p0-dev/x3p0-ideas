<?php

/**
 * The Assets class handles block-specific assets, such as stylesheets.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Hookable};

class Assets implements Bootable
{
	use Hookable;

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
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/functions/wp_enqueue_block_style/
	 */
	#[Action('init', 'last')]
	public function enqueueStyles(): void
	{
		$directory = new RecursiveDirectoryIterator(
			get_parent_theme_file_path('public/css/blocks'),
			RecursiveDirectoryIterator::SKIP_DOTS
		);

		$files = new RecursiveIteratorIterator(
			$directory,
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($files as $file) {
			if (
				! $file->isDir()
				&& 'css' === $file->getExtension()
				&& ! is_null($file->getPathInfo())
			) {
				$this->enqueueStyle(
					$file->getPathInfo()->getBasename(),
					$file->getBasename('.css')
				);
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
}
