<?php

/**
 * Config class.
 *
 * Pulls data from `extra.x3p0` in the `composer.json` file for configuring dev
 * mode. Set options via command line with `composer config extra.x3p0.{$key}`.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

class Config
{
	/**
	 * Stores an array of configuration options defined in `extra.x3p0` in
	 * the `composer.json` file.
	 *
	 * @since 1.0.0
	 */
	protected array $config = [];

	/**
	 * Set up the object's initial state.
	 *
	 * @since 1.0.0
	 */
	public function __construct()
	{
		// Get the `composer.json` file so that we can read its data.
		$filename = get_parent_theme_file_path('composer.json');

		// If the file is readable, attempt to pull theme-specific data
		// from the `extra` property in `composer.json`.
		if (is_readable($filename)) {
			$json = wp_json_file_decode(
				$filename,
				[ 'associative' => true ]
			);

			if ($json && isset($json['extra']['x3p0'])) {
				$this->config = $json['extra']['x3p0'];
			}
		}
	}

	/**
	 * Checks if the config key is set.
	 *
	 * @since 1.0.0
	 */
	public function has(string $key): bool
	{
		return isset($this->config[$key]);
	}

	/**
	 * Returns the given configuration option's data by key.
	 *
	 * @since 1.0.0
	 */
	public function get(string $key): mixed
	{
		return $this->has($key) ? $this->config[$key] : null;
	}
}
