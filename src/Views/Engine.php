<?php

/**
 * The view engine is designed to make using the `View` class easy and stands as
 * a wrapper for quickly getting or rendering a view.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas\Views;

class Engine
{
	/**
	 * Returns a new view.
	 *
	 * @since 1.0.0
	 */
	public function view(string $name, array $data = []): View
	{
		return new View($name, $data);
	}

	/**
	 * Returns the first found view or `false`.
	 *
	 * @since  1.0.0
	 * @param  array|string  $views
	 * @return View|false
	 * @todo   Type hint params and return with PHP 8.0+ requirement.
	 */
	public function any($views, array $data = [])
	{
		foreach ((array) $views as $view) {
			if ($this->exists($view)) {
				return $this->view($view, $data);
			}
		}

		return false;
	}

	/**
	 * Renders a view only if it exists.
	 *
	 * @since  1.0.0
	 * @param  array|string  $views
	 * @todo   Type hint params with PHP 8.0+ requirement.
	 */
	public function renderIf($views, array $data = []): string
	{
		$view = $this->any((array) $views, $data);

		return $view ? $view->render() : '';
	}

	/**
	 * Renders a view when `$when` is `true`.
	 *
	 * @since  1.0.0
	 * @param  mixed         $when
	 * @param  array|string  $views
	 * @todo   Type hint params with PHP 8.0+ requirement.
	 */
	public function renderWhen($when, $views, array $data = []): string
	{
		return $when ? $this->renderIf($views, $data) : '';
	}

	/**
	 * Renders a view unless `$unless` is `true`.
	 *
	 * @since  1.0.0
	 * @param  mixed         $unless
	 * @param  array|string  $views
	 * @todo   Type hint params with PHP 8.0+ requirement.
	 */
	public function renderUnless($unless, $views, array $data = []): string
	{
		return ! $unless ? $this->renderIf($views, $data) : '';
	}

	/**
	 * Checks if a view exists.
	 *
	 * @since 1.0.0
	 */
	public function exists(string $name): bool
	{
		$basename   = str_replace('.', '/', $name);
		$stylesheet = get_stylesheet_directory() . "/views/{$basename}.php";
		$template   = get_template_directory() . "/views/{$basename}.php";

		if (! is_child_theme()) {
			return file_exists($template);
		}

		return file_exists($stylesheet) ?: file_exists($template);
	}
}
