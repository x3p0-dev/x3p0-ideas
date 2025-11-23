<?php

/**
 * File Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use WP_Block;
use WP_Block_Type_Registry;
use WP_HTML_Tag_Processor;

/**
 * Filters settings and rendered output for the `core/file` block.
 */
class File extends RendersBlock
{
	protected const BLOCK_TYPE = 'core/file';

	public function __construct(protected WP_Block_Type_Registry $block_types)
	{}

	/**
	 * Filters the File block content.
	 */
	public function render(string $content, array $block, WP_Block $instance): string
	{
		return ! empty($block['attrs']['metadata']['bindings'])
			? $this->renderBindings($content, $block, $instance)
			: $content;
	}

	/**
	 * Filters the File block content to swap text and attribute values with
	 * bound data registered via the Block Bindings API.
	 */
	public function renderBindings(
		string   $content,
		array    $block,
		WP_Block $instance
	): string
	{
		$block_type = $this->block_types->get_registered($instance->name);
		$bindings = $block['attrs']['metadata']['bindings'];
		$sources = [];

		$processor = new WP_HTML_Tag_Processor($content);

		while ($processor->next_tag()) {
			$tag = $processor->get_tag();

			// Process bindings specific to the `<object>`.
			if ('OBJECT' === $tag && isset($bindings['href'])) {
				$sources['href'] = get_block_bindings_source(
					$bindings['href']['source']
				);

				$processor->set_attribute(
					'data',
					$sources['href']->get_value(
						$bindings['href']['args'] ?? [],
						$instance,
						'href'
					)
				);
			}

			// Process bindings specific to the non-button link.
			if ('A' === $tag && ! $processor->get_attribute('download')) {

				// Set the file link `href` value.
				if (isset($bindings['textLinkHref'])) {
					$sources['textLinkHref'] = get_block_bindings_source(
						$bindings['textLinkHref']['source']
					);

					$processor->set_attribute(
						'href',
						$sources['textLinkHref']->get_value(
							$bindings['textLinkHref']['args'] ?? [],
							$instance,
							'textLinkHref'
						)
					);
				}

				// Set the file link text.
				if (isset($bindings['fileName'])) {
					while ($processor->next_token()) {
						if ('#text' !== $processor->get_token_type()) {
							continue;
						}

						$sources['fileName'] = get_block_bindings_source(
							$bindings['fileName']['source']
						);

						$processor->set_modifiable_text(
							$sources['fileName']->get_value(
								$bindings['fileName']['args'] ?? [],
								$instance,
								'fileName'
							)
						);

						break;
					}
				}
			}

			// Process bindings specific to the button link.
			if ('A' === $tag && $processor->get_attribute('download')) {

				// Set the button link `href` attribute.
				if (isset($bindings['href'])) {
					$sources['href'] = get_block_bindings_source(
						$bindings['href']['source']
					);

					$processor->set_attribute(
						'href',
						$sources['href']->get_value(
							$bindings['href']['args'] ?? [],
							$instance,
							'href'
						)
					);
				}

				// Set the button link text.
				if (isset($bindings['downloadButtonText'])) {
					while ($processor->next_token()) {
						if ('#text' !== $processor->get_token_type()) {
							continue;
						}

						$sources['downloadButtonText'] = get_block_bindings_source(
							$bindings['downloadButtonText']['source']
						);

						$processor->set_modifiable_text(
							$sources['downloadButtonText']->get_value(
								$bindings['downloadButtonText']['args'] ?? [],
								$instance,
								'downloadButtonText'
							)
						);

						break;
					}
				}
			}
		}

		if ([] !== $sources) {
			foreach ($sources as $source) {
				$block_type->uses_context = array_merge(
					$block_type->uses_context,
					$source->uses_context
				);
			}

			$instance->refresh_context_dependents();
		}

		return $processor->get_updated_html();
	}
}
