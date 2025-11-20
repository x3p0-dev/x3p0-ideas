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

namespace X3P0\Ideas\Block\Library\Core;

use WP_HTML_Tag_Processor;
use X3P0\Ideas\Block\Support\ColorScheme;
use X3P0\Ideas\Framework\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Filter, Hookable};

/**
 * Filters settings and rendered output for the `core/button` block.
 */
class Button implements Bootable
{
	use Hookable;

	/**
	 * Sets up the object state.
	 */
	public function __construct(protected ColorScheme $color_scheme)
	{}

	/**
	 * Adds Interactivity API support to the Button block. This is needed
	 * for the light/dark toggle and other use cases where we might use the
	 * `<button>` element instead of an `<a>` element.
	 */
	#[Filter('block_type_metadata_settings', 'last')]
	public function settings(array $settings): array
	{
		if ('core/button' === $settings['name']) {
			$settings['supports']['interactivity'] = true;
		}

		return $settings;
	}

	/**
	 * Filters the Button block on render and runs any class methods based
	 * on various attributes that may be set.
	 */
	#[Filter('render_block_core/button')]
	public function render(string $content, array $block): string
	{
		if (
			isset($block['attrs']['className'])
			&& str_contains($block['attrs']['className'], 'toggle-color-scheme')
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
		// Color scheme toggle.
		$processor = new WP_HTML_Tag_Processor($content);

		if (
			! $processor->next_tag([ 'class_name' => 'toggle-color-scheme'])
			|| ! $processor->next_tag('button')
		) {
			return $processor->get_updated_html();
		}

		// If the color scheme can't be toggled, don't render the button.
		if (! $this->color_scheme->isSwitchable()) {
			return '';
		}

		// Add interactivity directives to the `<button>`.
		$attr = [
			'data-wp-interactive'           => ColorScheme::STORE,
			'data-wp-on--click'             => 'actions.toggle',
			'data-wp-init'                  => 'callbacks.init',
			'data-wp-watch'                 => 'callbacks.updateScheme',
			'data-wp-bind--aria-pressed'    => 'state.isDark',
			'data-wp-class--is-dark-scheme' => 'state.isDark'
		];

		foreach ($attr as $name => $value) {
			$processor->set_attribute($name, $value);
		}

		// Set the initial interactivity state and enqueue assets.
		$this->color_scheme->interactivityState();
		$this->color_scheme->enqueueAssets();

		return $processor->get_updated_html();
	}
}
