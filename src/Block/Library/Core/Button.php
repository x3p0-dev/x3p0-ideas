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
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\ColorScheme;
use X3P0\Ideas\Tools\Hooks\{Action, Filter, Hookable};

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
	 * Registers user meta for the color scheme toggle.
	 */
	#[Action('init')]
	public function registerMeta(): void
	{
		register_meta('user', ColorScheme::NAME, [
			'show_in_rest' => true,
			'type'         => 'string',
			'single'       => true,
		]);
	}

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

		// Set the initial interactivity state.
		wp_interactivity_state(
			ColorScheme::NAME,
			$this->color_scheme->getState()
		);

		// Add interactivity directives to the `<button>`.
		$attr = [
			'data-wp-interactive'           => ColorScheme::NAME,
			'data-wp-on--click'             => 'actions.toggle',
			'data-wp-init'                  => 'callbacks.init',
			'data-wp-watch'                 => 'callbacks.updateScheme',
			'data-wp-bind--aria-pressed'    => 'state.isDark',
			'data-wp-class--is-dark-scheme' => 'state.isDark'
		];

		foreach ($attr as $name => $value) {
			$processor->set_attribute($name, $value);
		}

		// Enqueue the API fetch script if the user is logged in. This
		// is used for storing user metadata.
		if (is_user_logged_in()) {
			wp_enqueue_script('wp-api-fetch');
		}

		// Enqueue script module view.
		wp_enqueue_script_module(ColorScheme::NAME);

		return $processor->get_updated_html();
	}

	/**
	 * Enqueue scripts/styles for the front end.
	 */
	#[Action('wp_enqueue_scripts')]
	public function enqueueAssets(): void
	{
		$script = include get_parent_theme_file_path('public/js/views/color-scheme.asset.php');

		// Registers the light/dark toggle view script module. This is
		// later enqueued when the Button block variation is in use.
		wp_register_script_module(
			ColorScheme::NAME,
			get_parent_theme_file_uri('public/js/views/color-scheme.js'),
			$script['dependencies'],
			$script['version']
		);
	}
}
