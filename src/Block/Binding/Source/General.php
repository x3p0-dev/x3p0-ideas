<?php

/**
 * General binding class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Binding\Source;

use WP_Block;
use X3P0\Ideas\Block\Binding\BindingSource;

/**
 * Handles registering the `x3p0/general` block bindings source and rendering its
 * output based on the given arguments.
 */
final class General implements BindingSource
{
	public function getName(): string
	{
		return 'x3p0/general';
	}

	public function getLabel(): string
	{
		return __('General', 'x3p0-ideas');
	}

	public function getContext(): array
	{
		return [];
	}

	/**
	 * Returns site data based on the bound attribute.
	 */
	public function callback(array $args, WP_Block $block, string $name): ?string
	{
		return match ($args['key'] ?? null) {
			'queryDescription' => $this->renderQueryDescription(),
			'queryTitle'       => $this->renderQueryTitle(),
			default            => null
		};
	}

	/**
	 * Renders the query description.
	 */
	private function renderQueryDescription(): string
	{
		return esc_html(get_the_archive_description());
	}

	/**
	 * Renders the query title. Note that the `core/query-title` block only
	 * supports Archives and Search Results.
	 */
	private function renderQueryTitle(): string
	{
		return esc_html(get_the_archive_title());
	}
}
