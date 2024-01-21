<?php

/**
 * Helper functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas\Tests;

/**
 * Bootstraps the tests.
 *
 * @since 1.0.0
 */
function bootstrap(): void
{
	// Only run tests when in development mode.
	if (! wp_is_development_mode('theme')) {
		return;
	}

	// Test global style variation set via `composer.json`.
	(new GlobalStyleVariation((string) config('variation')))->boot();
}

/**
 * Returns the Composer `extra.x3p0` config array or a specific key.
 *
 * @since  1.0.0
 * @param  string|array
 * @return mixed
 * @todo   Use union type param and return with PHP 8.0+ requirement.
 */
function config(string $key = '', $default = '')
{
	$config = [];

	// Get the `composer.json` file so that we can read its data.
	$filename = get_parent_theme_file_path('composer.json');

	// If the file is readable, attempt to pull theme-specific data from
	// the `extra` property in `composer.json`.
	if (is_readable($filename)) {
		$json = wp_json_file_decode($filename, [ 'associative' => true ]);

		if ($json && isset($json['extra']['x3p0'])) {
			$config = $json['extra']['x3p0'];
		}
	}

	// If the key is set, return its data or the default;
	if ('' !== $key ) {
		return $config[$key] ?? $default;
	}

	return $config;
}
