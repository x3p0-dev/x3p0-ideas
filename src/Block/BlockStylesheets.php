<?php

/**
 * Block stylesheets service.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block;

use CallbackFilterIterator;
use FilesystemIterator;
use Iterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles registering/enqueueing block stylesheets.
 */
final class BlockStylesheets implements Bootable
{
	/**
	 * Handle prefix used for styles.
	 */
	protected const HANDLE_PREFIX = 'x3p0-ideas-block';

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->enqueue(...), 999999);
	}

	/**
	 * Enqueues block-specific styles so that they only load when the block
	 * is in use. Block styles stored under `/assets/css/blocks` are
	 * automatically enqueued. Each file should be named
	 * `{$block_namespace}/{$block_slug}.css`.
	 */
	private function enqueue(): void
	{
		foreach ($this->getCssFiles() as $file) {
			$this->enqueueStyleFromFile($file);
		}
	}

	/**
	 * Returns an iterable list of block CSS files.
	 *
	 * @return Iterator<SplFileInfo>
	 */
	private function getCssFiles(): Iterator
	{
		$iterator = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator(
				get_parent_theme_file_path('public/css/blocks'),
				FilesystemIterator::SKIP_DOTS
			)
		);

		return new CallbackFilterIterator(
			$iterator,
			fn($file) => $file->isFile() && $file->getExtension() === 'css'
		);
	}

	/**
	 * Enqueues an individual block stylesheet based on a given block
	 * namespace and slug.
	 */
	private function enqueueStyleFromFile(SplFileInfo $file): void
	{
		$namespace = $file->getPathInfo()->getBasename();
		$slug      = $file->getBasename('.css');
		$path      = "public/css/blocks/{$namespace}/{$slug}";

		// Bail if the asset file doesn't exist.
		if (! file_exists(get_parent_theme_file_path("{$path}.asset.php"))) {
			return;
		}

		// Get the asset file.
		$asset = include get_parent_theme_file_path("{$path}.asset.php");

		// Register the block style.
		wp_enqueue_block_style("{$namespace}/{$slug}", [
			'handle' => self::HANDLE_PREFIX . "-{$namespace}-{$slug}",
			'src'    => get_parent_theme_file_uri("{$path}.css"),
			'path'   => get_parent_theme_file_path("{$path}.css"),
			'deps'   => $asset['dependencies'],
			'ver'    => $asset['version']
		]);
	}
}
