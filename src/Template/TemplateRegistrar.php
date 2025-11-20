<?php

/**
 * Template registrar.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Template;

use X3P0\Ideas\Framework\Contracts\Bootable;

/**
 * Registers templates with WordPress.
 */
final class TemplateRegistrar implements Bootable
{
	/**
	 * @inheritDoc
	 */
	public function boot(): void
	{
		add_filter('default_template_types', $this->register(...));
		add_filter('default_template_types', $this->setTitles(...));
	}

	/**
	 * Adds templates if WordPress hasn't defined them by default.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/default_template_types/
	 */
	private function register(array $types): array
	{
		$types['audio'] ??= [
			'title'       => _x('Media: Audio', 'Template name', 'x3p0-ideas'),
			'description' => __('Displays when a visitor views the dedicated page that exists for an audio attachment.', 'x3p0-ideas'),
		];

		$types['image'] ??= [
			'title'       => _x('Media: Image', 'Template name', 'x3p0-ideas'),
			'description' => __('Displays when a visitor views the dedicated page that exists for an image attachment.', 'x3p0-ideas'),
		];

		$types['pdf'] ??= [
			'title'       => _x('Media: PDF', 'Template name', 'x3p0-ideas'),
			'description' => __('Displays when a visitor views the dedicated page that exists for a PDF attachment.', 'x3p0-ideas'),
		];

		$types['single-portfolio_project'] ??= [
			'title'       => _x('Portfolio Project', 'Template name', 'x3p0-ideas'),
			'description' => __('Displays single projects on your website unless a custom template has been applied to that project or a more specific template exists.', 'x3p0-ideas'),
		];

		$types['single-post'] ??= [
			'title'       => _x('Post', 'Template name', 'x3p0-ideas'),
			'description' => __('Displays single posts on your website unless a custom template has been applied to that post or a more specific template exists.', 'x3p0-ideas'),
		];

		$types['video'] ??= [
			'title'       => _x('Media: Video', 'Template name', 'x3p0-ideas'),
			'description' => __('Displays when a visitor views the dedicated page that exists for a video attachment.', 'x3p0-ideas'),
		];

		return $types;
	}

	/**
	 * Customizes the titles of the default template types.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/default_template_types/
	 */
	private function setTitles(array $types): array
	{
		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		$titles = [
			'404'        => _x('Error 404',        'Template name', 'x3p0-ideas'),
			'archive'    => _x('Archive',          'Template name', 'x3p0-ideas'),
			'attachment' => _x('Media',            'Template name', 'x3p0-ideas'),
			'author'     => _x('Author Archive',   'Template name', 'x3p0-ideas'),
			'category'   => _x('Category Archive', 'Template name', 'x3p0-ideas'),
			'date'       => _x('Date Archive',     'Template name', 'x3p0-ideas'),
			'home'       => _x('Blog',             'Template name', 'x3p0-ideas'),
			'page'       => _x('Page',             'Template name', 'x3p0-ideas'),
			'single'     => _x('Single',           'Template name', 'x3p0-ideas'),
			'singular'   => _x('Singular',         'Template name', 'x3p0-ideas'),
			'tag'        => _x('Tag Archive',      'Template name', 'x3p0-ideas'),
			'taxonomy'   => _x('Term Archive',     'Template name', 'x3p0-ideas'),
		];
		// phpcs:enable

		// Loop through the custom titles and replace the default titles.
		foreach ($titles as $template => $title) {
			if (isset($types[$template])) {
				$types[$template]['title'] = $title;
			}
		}

		return $types;
	}
}
