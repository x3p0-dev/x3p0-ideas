<?php

/**
 * Color Scheme tool.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools;

/**
 * The Color Scheme class is for handling the CSS `color-scheme` defined in
 * `theme.json` and/or style variations via the `settings.custom.color-scheme`
 * property. It is also meant to be used alongside the Interactivity API for
 * implementing buttons/toggles/switches for letting site visitors switch the
 * color scheme, but it is agnostic of the final implementation, only providing
 * the necessary interactive states needed from the server by default.
 */
class ColorScheme
{
	/**
	 * Unique name/ID used to reference in scripts, cookies, etc.
	 */
	public const NAME = 'x3p0-ideas-color-scheme';

	/**
	 * Stores the default color scheme.
	 */
	private const DEFAULT_SCHEME = 'normal';

	/**
	 * Stores an array of supported global color schemes that can be defined
	 * via `theme.json`.
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
	 */
	private const USER_SCHEMES = [
		'light',
		'dark'
	];

	/**
	 * Stores an array of supported color schemes that can be toggled.
	 */
	private const SWITCHABLE_SCHEMES = [
		'light dark',
		'dark light'
	];

	/**
	 * Stores an array of supported light color schemes.
	 */
	private const LIGHT_SCHEMES = [
		'light',
		'light only',
		'only light'
	];

	/**
	 * Stores an array of supported dark color schemes.
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
	 * Returns the default state from the server for use with the custom
	 * implementations with the Interactivity API.
	 */
	public function getState(): array
	{
		$state = [
			'colorScheme' => $this->getColorScheme(),
			'isDark'      => null,
			'userID'      => get_current_user_id()
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

		return $state;
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
