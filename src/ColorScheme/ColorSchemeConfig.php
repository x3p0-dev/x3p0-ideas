<?php

declare(strict_types=1);

namespace X3P0\Ideas\ColorScheme;

/**
 * Immutable configuration for color schemes.
 */
final class ColorSchemeConfig
{
	/**
	 * Unique name for the store.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const INTERACTIVE_STORE = 'x3p0-ideas/color-scheme';

	/**
	 * Toggle action for the interactive script module.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const INTERACTIVE_ACTION_TOGGLE = 'actions.toggle';

	/**
	 * Init callback for the interactive script module.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const INTERACTIVE_CALLBACK_INIT = 'callbacks.init';

	/**
	 * Update callback for the interactive script module.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const INTERACTIVE_CALLBACK_UPDATE = 'callbacks.updateScheme';

	/**
	 * Dark state for the interactive script module.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const INTERACTIVE_STATE_IS_DARK = 'state.isDark';

	/**
	 * Unique name/ID used to reference in scripts, cookies, etc.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const NAME = 'x3p0-ideas-color-scheme';

	/**
	 * Stores the default color scheme.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const DEFAULT_SCHEME = 'normal';

	/**
	 * Stores an array of supported global color schemes that can be defined
	 * via `theme.json`.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const GLOBAL_SCHEMES = [
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
	public const USER_SCHEMES = [
		'light',
		'dark'
	];

	/**
	 * Stores an array of supported color schemes that can be toggled.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const SWITCHABLE_SCHEMES = [
		'light dark',
		'dark light'
	];

	/**
	 * Stores an array of supported light color schemes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const LIGHT_SCHEMES = [
		'light',
		'light only',
		'only light'
	];

	/**
	 * Stores an array of supported dark color schemes.
	 *
	 * @todo Type hint with PHP 8.3+ requirement.
	 */
	public const DARK_SCHEMES = [
		'dark',
		'dark only',
		'only dark'
	];

	public static function isValidGlobalScheme(string $scheme): bool
	{
		return in_array($scheme, self::GLOBAL_SCHEMES, true);
	}

	public static function isValidUserScheme(string $scheme): bool
	{
		return in_array($scheme, self::USER_SCHEMES, true);
	}

	public static function isSwitchable(string $scheme): bool
	{
		return in_array($scheme, self::SWITCHABLE_SCHEMES, true);
	}

	public static function isDark(string $scheme): bool
	{
		return in_array($scheme, self::DARK_SCHEMES, true);
	}

	public static function isLight(string $scheme): bool
	{
		return in_array($scheme, self::LIGHT_SCHEMES, true);
	}
}
