<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Stylesheet;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Handles registering/enqueueing block stylesheets.
 */
final class StylesheetService implements Bootable
{
	/**
	 * Handle prefix used for styles.
	 */
	private const HANDLE_PREFIX = 'x3p0-ideas-block';

	public function __construct(private readonly StylesheetDiscovery $discovery)
	{}

	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_action('init', $this->enqueue(...), 999999);
	}

	/**
	 * Enqueues block-specific styles so that they only load when the block
	 * is in use.
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
	 * Enqueues an individual block stylesheet.
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
