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

use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\{HtmlDumper, CliDumper};

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

	// Let developers disable testing.
	if ( false === apply_filters('x3p0/ideas/tests', true)) {
		return;
	}

	// Set the Symfony var dumper, giving it a nicer color scheme. Use
	// `dump()` instead of `var_dump()` or `dd()` to dump and die.
	setVarDumper();

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

function setVarDumper(): void
{
	VarDumper::setHandler( function( $var ) {
		$cloner      = new VarCloner();
		$html_dumper = new HtmlDumper();

		$html_dumper->setTheme( 'light' );

		$html_dumper->setStyles( [
			'default' => '
				box-sizing: border-box;
				position: relative;
				z-index: 99999;
				overflow: auto !important;
				word-break: break-all;
				word-wrap: normal;
				white-space: revert;
				margin: 2rem;
				max-width: 100%;
				padding: 2rem;
				font-family: \"Source Code Pro\", Monaco, Consolas, \"Andale Mono WT\", \"Andale Mono\", \"Lucida Console\", \"Lucida Sans Typewriter\", \"DejaVu Sans Mono\", \"Bitstream Vera Sans Mono\", \"Liberation Mono\", \"Nimbus Mono L\", \"Courier New\", Courier, monospace;
				font-size: 18px;
				line-height: 1.75;
				color: #334155;
				background: #f8fafc;
				border: 1px solid #e2e8f0;
				border-bottom-color: #cbd5e1;
				border-radius: 0;
				box-shadow: none;
			',
			'index'     => 'color: #60a5fa;',
			'key'       => 'color: #16a34a;',
			'meta'      => 'color: #9333ea;',
			'note'      => 'color: #1d4ed8;',
			'num'       => 'color: #60a5fa;',
			'private'   => 'color: #64748b;',
			'protected' => 'color: #475569;',
			'ref'       => 'color: #3b82f6;',
			'str'       => 'color: #16a34a;',
			'toggle'    => 'padding: 0 0.5rem'
		] );

		$dumper = PHP_SAPI === 'cli' ? new CliDumper() : $html_dumper;

		$dumper->dump( $cloner->cloneVar( $var ) );
	} );
}
