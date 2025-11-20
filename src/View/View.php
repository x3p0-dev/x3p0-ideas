<?php

/**
 * Views class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\View;

use Stringable;

/**
 * Views essentially allow you to create dynamic block patterns and render them
 * when needed. They are meant to be used on the front end when you need to have
 * access to dynamic data, such as WordPress template and conditional tags. In a
 * block theme, this generally means using them alongside a filter when
 * rendering a block.
 */
class View implements Stringable
{
	/**
	 * The template filename.
	 */
	protected ?string $template = null;

	/**
	 * Sets up the view properties.
	 */
	public function __construct(protected string $name, protected array $data = [])
	{
		$this->name = str_replace('/', '.', $this->name);
	}

	/**
	 * Returns the located template.
	 */
	protected function template(): string
	{
		if (is_null($this->template)) {
			$filename       = str_replace('.', '/', $this->name);
			$this->template = get_theme_file_path("views/{$filename}.php");
		}

		return $this->template;
	}

	/**
	 * Returns the view.
	 */
	public function render(): string
	{
		if (! $this->template()) {
			return '';
		}

		// Make `$data` array available to the template.
		$data = $this->data;

		// Capture the output of the template.
		ob_start();
		include $this->template();
		$content = ob_get_clean();

		$html = '';

		// Parse and render the blocks.
		foreach (parse_blocks($content) as $block) {
			$html .= render_block($block);
		}

		return $html;
	}

	/**
	 * When attempting to use the object as a string, return the template
	 * output.
	 */
	public function __toString(): string
	{
		return $this->render();
	}
}
