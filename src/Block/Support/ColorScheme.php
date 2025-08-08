<?php

/**
 * Color Scheme support class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Support;

use WP_Style_Engine_CSS_Rule;
use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\Hooks\{Action, Hookable};

/**
 * The Color Scheme class is for handling the CSS `color-scheme` defined in
 * `theme.json` and/or style variations via the `settings.custom.color-scheme`
 * property. It is also meant to be used alongside the Interactivity API for
 * implementing buttons/toggles/switches for letting site visitors switch the
 * color scheme, but it is agnostic of the block(s) it is used with.
 */
class ColorScheme implements Bootable
{
	use Hookable;

	/**
	 * Unique name for the store.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const STORE = 'x3p0-ideas/color-scheme';

	/**
	 * Unique name/ID used to reference in scripts, cookies, etc.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const NAME = 'x3p0-ideas-color-scheme';

	/**
	 * Stores the default color scheme.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const DEFAULT_SCHEME = 'normal';

	/**
	 * Stores an array of supported global color schemes that can be defined
	 * via `theme.json`.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const GLOBAL_SCHEMES = [
		'normal',
		'light',
		'light only',
		'only light',
		'dark',
		'only dark',
		'dark only',
		'light dark',
		'dark light'
	];

	/**
	 * Stores an array of supported user color schemes that can be stored
	 * via cookie (or even user meta).
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const USER_SCHEMES = [
		'light',
		'dark'
	];

	/**
	 * Stores an array of supported color schemes that can be toggled.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const SWITCHABLE_SCHEMES = [
		'light dark',
		'dark light'
	];

	/**
	 * Stores an array of supported light color schemes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const LIGHT_SCHEMES = [
		'light',
		'light only',
		'only light'
	];

	/**
	 * Stores an array of supported dark color schemes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	private const DARK_SCHEMES = [
		'dark',
		'dark only',
		'only dark'
	];

	/**
	 * The current color scheme.
	 */
	private string $scheme;

	/**
	 * Registers user meta for storing the color scheme.
	 */
	#[Action('init')]
	public function registerMeta(): void
	{
		$sanitize = fn($value) => in_array($value, self::USER_SCHEMES) ? $value : '';

		register_meta('user', self::NAME, [
			'label'             => __('Color Scheme', 'x3p0-ideas'),
			'description'       => __('Stores the preferred color scheme for the site.', 'x3p0-ideas' ),
			'default'           => '',
			'sanitize_callback' => $sanitize,
			'show_in_rest'      => true,
			'single'            => true,
			'type'              => 'string'
		]);
	}

	/**
	 * Registers assets to enable interactivity, such as button toggles.
	 */
	#[Action('wp_enqueue_scripts')]
	public function registerAssets(): void
	{
		$script = include get_parent_theme_file_path('public/js/views/color-scheme.asset.php');

		wp_register_script_module(
			self::NAME,
			get_parent_theme_file_uri('public/js/views/color-scheme.js'),
			$script['dependencies'],
			$script['version']
		);
	}

	/**
	 * Enqueues the color scheme assets. Blocks that enable an interactive
	 * color scheme toggle must call this on render.
	 */
	public function enqueueAssets(): void
	{
		// Enqueue the API fetch script if the user is logged in. This
		// is used for storing user metadata.
		if (is_user_logged_in()) {
			wp_enqueue_script('wp-api-fetch');
		}

		// Enqueue the script module.
		wp_enqueue_script_module(self::NAME);
	}

	/**
	 * Adds inline CSS in the front end and editor for printing the color
	 * scheme on the root element.
	 */
	#[Action('enqueue_block_assets')]
	public function enqueueBlockAssets(): void
	{
		$css = sprintf(
			':root {color-scheme: %s;}',
			esc_attr($this->getColorScheme())
		);

		wp_register_style(self::NAME, false);
		wp_add_inline_style(self::NAME, $css);
		wp_enqueue_style(self::NAME);
	}

	/**
	 * Sets/Gets the default state from the server for use with the custom
	 * implementations with the Interactivity API.
	 */
	public function interactivityState(): array
	{
		$state = [
			'colorScheme'       => $this->getColorScheme(),
			'isDark'            => null,
			'userID'            => get_current_user_id(),
			'name'              => self::NAME,
			'switchableSchemes' => self::SWITCHABLE_SCHEMES,
			'cookiePath'        => COOKIEPATH,
			'cookieDomain'      => COOKIE_DOMAIN
		];

		// By default, we don't always know whether the color scheme is
		// dark or light. But there are some scenarios where we do. One
		// is where the user has stored their preferred scheme for the
		// site. The other is when the theme has explicitly set a scheme
		// that isn't switchable.
		if ($user_scheme = $this->getUserScheme()) {
			$state['isDark']  = 'dark' === $user_scheme;
		} elseif (in_array($this->getGlobalScheme(), self::DARK_SCHEMES)) {
			$state['isDark'] = true;
		} elseif (in_array($this->getGlobalScheme(), self::LIGHT_SCHEMES)) {
			$state['isDark'] = false;
		}

		return wp_interactivity_state(self::STORE, $state);
	}

	/**
	 * Determines whether the global color scheme supports toggling between
	 * light and dark schemes.
	 */
	public function isSwitchable(): bool
	{
		return in_array($this->getGlobalScheme(), self::SWITCHABLE_SCHEMES);
	}

	/**
	 * Returns the color scheme by first checking the user scheme and then
	 * falling back to the global scheme.
	 */
	private function getColorScheme(): string
	{
		if (! isset($this->scheme)) {
			$user_scheme  = $this->getUserScheme();
			$this->scheme = $user_scheme ?? $this->getGlobalScheme();
		}

		return $this->scheme;
	}

	/**
	 * Returns the global color scheme defined in `theme.json`, the active
	 * stylesheet, or user data (whichever wins out).
	 */
	private function getGlobalScheme(): string
	{
		// Get the color scheme from the global settings. Note that
		// WordPress doesn't automatically kebab-case property names
		// before sending them through this function, so we must check
		// for both `colorScheme` and `color-scheme`.
		$scheme = wp_get_global_settings(['custom', 'colorScheme']);

		if (! is_string($scheme)) {
			$scheme = wp_get_global_settings(['custom', 'color-scheme']);
		}

		return is_string($scheme) && in_array($scheme, self::GLOBAL_SCHEMES)
			? $scheme
			: self::DEFAULT_SCHEME;
	}

	/**
	 * Returns the user's preferred color scheme if it has been saved via
	 * meta or cookie. Otherwise, returns null.
	 */
	private function getUserScheme(): ?string
	{
		if (is_user_logged_in()) {
			$scheme = get_user_meta(get_current_user_id(), self::NAME, true);

			return $scheme && in_array($scheme, self::USER_SCHEMES)
				? $scheme
				: null;
		}

		if (isset($_COOKIE[self::NAME])) {
			$scheme = sanitize_key(wp_unslash($_COOKIE[self::NAME]));

			return in_array($scheme, self::USER_SCHEMES) ? $scheme : null;
		}

		return null;
	}
}
