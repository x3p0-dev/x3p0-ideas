<?php

/**
 * Dev mode setup class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Dev;

use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Sets up development mode features.
 */
class Setup implements Bootable
{
	/**
	 * Set up the object's initial state.
	 */
	public function __construct()
	{
		$this->setVarDumper();
	}

	/**
	 * Boots the component, running its actions/filters.
	 */
	#[\Override]
	public function boot(): void
	{
		// Don't inline stylesheets while in dev mode.
		add_filter('styles_inline_size_limit', '__return_zero', PHP_INT_MAX);
	}

	/**
	 * Sets up custom styles for the Symfony var dumper.
	 */
	private function setVarDumper(): void
	{
		if ('cli' === PHP_SAPI) {
			return;
		}

		VarDumper::setHandler(function ($var) {
			$dumper = new HtmlDumper();

			$dumper->setTheme('light');

			$dumper->setStyles([
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
			]);

			$dumper->dump((new VarCloner())->cloneVar($var));
		});
	}
}
