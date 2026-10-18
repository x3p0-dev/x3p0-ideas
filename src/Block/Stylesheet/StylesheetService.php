<?php

/**
 * Stylesheet service.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Stylesheet;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles registering and enqueueing block stylesheets.
 *
 * This service automatically discovers and enqueues block-specific stylesheets
 * using WordPress's block style API. Stylesheets are only loaded when their
 * associated blocks are actually used on a page, improving performance.
 */
final class StylesheetService implements Bootable
{
	/**
	 * Handle prefix used for registering block styles.
	 */
	private const HANDLE_PREFIX = 'x3p0-ideas-block';

	/**
	 * Sets up the stylesheet service.
	 */
	public function __construct(private readonly StylesheetIterator $discovery)
	{}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->enqueue(...), 999999);
	}

	/**
	 * Enqueues block-specific styles for conditional loading.
	 *
	 * Iterates through discovered stylesheets and enqueues those that have
	 * accompanying asset files. This ensures styles are only loaded when
	 * their associated blocks are present on a page.
	 */
	private function enqueue(): void
	{
		foreach ($this->discovery as $stylesheet) {
			if ($stylesheet->hasAssetFile()) {
				$this->enqueueStylesheet($stylesheet);
			}
		}
	}

	/**
	 * Enqueues an individual block stylesheet with WordPress.
	 *
	 * Registers the stylesheet using WordPress's block style API, which
	 * handles conditional loading. The style handle is generated from the
	 * block's namespace and slug, and dependencies/version are read from
	 * the stylesheet's asset file.
	 */
	private function enqueueStylesheet(Stylesheet $stylesheet): void
	{
		$namespace = $stylesheet->getNamespace();
		$slug      = $stylesheet->getSlug();
		$asset     = $stylesheet->getAssetData();

		wp_enqueue_block_style($stylesheet->getBlockName(), [
			'handle' => self::HANDLE_PREFIX . "-{$namespace}-{$slug}",
			'src'    => $stylesheet->getFileUrl(),
			'path'   => $stylesheet->getFilePath(),
			'deps'   => $asset['dependencies'],
			'ver'    => $asset['version']
		]);
	}
}
