<?php

/**
 * Button Block class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Render;

use WP_Block;
use WP_HTML_Tag_Processor;
use X3P0\Ideas\ColorScheme\{ColorSchemeConfig, ColorSchemeService};

/**
 * Filters settings and rendered output for the `core/button` block.
 */
final class Button extends RendersBlock
{
	protected const BLOCK_TYPE = 'core/button';

	private const COLOR_SCHEME_CLASS = 'toggle-color-scheme';

	/**
	 * Sets up the object state.
	 */
	public function __construct(private readonly ColorSchemeService $colorScheme)
	{}

	/**
	 * Filters the Button block on render and runs any class methods based
	 * on various attributes that may be set.
	 */
	protected function render(string $content, array $block, WP_Block $instance): string
	{
		if (
			isset($block['attrs']['className'])
			&& str_contains($block['attrs']['className'], self::COLOR_SCHEME_CLASS)
		) {
			return $this->renderColorSchemeToggle($content);
		}

		return $content;
	}

	/**
	 * Converts a Button block to a light/dark toggle. Currently, it checks
	 * if there is a `toggle-color-scheme` class, and if so, adds custom
	 * attributes to be used with the Interactivity API and enqueues a view
	 * script module.
	 */
	private function renderColorSchemeToggle(string $content): string
	{
		$processor = new WP_HTML_Tag_Processor($content);

		if (
			! $processor->next_tag(['class_name' => self::COLOR_SCHEME_CLASS])
			|| ! $processor->next_tag('button')
		) {
			return $processor->get_updated_html();
		}

		// If the color scheme can't be toggled, don't render the button.
		if (! $this->colorScheme->resolver()->isSwitchable()) {
			return '';
		}

		// Add interactivity directives
		$attr = [
			'data-wp-interactive'           => ColorSchemeConfig::INTERACTIVE_STORE,
			'data-wp-on--click'             => ColorSchemeConfig::INTERACTIVE_ACTION_TOGGLE,
			'data-wp-init'                  => ColorSchemeConfig::INTERACTIVE_CALLBACK_INIT,
			'data-wp-watch'                 => ColorSchemeConfig::INTERACTIVE_CALLBACK_UPDATE,
			'data-wp-bind--aria-pressed'    => ColorSchemeConfig::INTERACTIVE_STATE_IS_DARK,
			'data-wp-class--is-dark-scheme' => ColorSchemeConfig::INTERACTIVE_STATE_IS_DARK
		];

		foreach ($attr as $name => $value) {
			$processor->set_attribute($name, $value);
		}

		// Enable color scheme interactivity (state, scripts, etc.).
		$this->colorScheme->enableInteractivity();

		return $processor->get_updated_html();
	}
}
