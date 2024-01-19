<?php

/**
 * The Templates class is responsible for housing any custom code related to
 * block templates.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

namespace X3P0\Ideas;

use X3P0\Ideas\Contracts\Bootable;
use X3P0\Ideas\Tools\HookAnnotation;

class Templates implements Bootable
{
	use HookAnnotation;

	/**
	 * Boots the component, running its actions/filters.
	 *
	 * @since 1.0.0
	 */
	#[\Override]
	public function boot(): void
	{
		$this->hookMethods();
	}

	/**
	 * Customizes the titles of the default template types.
	 *
	 * @hook  default_template_types
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/default_template_types/
	 */
	public function filterTitles(array $types): array
	{
		// Defines custom template titles for the core templates.
		// phpcs:disable Generic.Functions.FunctionCallArgumentSpacing.TooMuchSpaceAfterComma
		$titles = [
			'404'        => _x('Error 404',        'Template name', 'x3p0-ideas'),
			'archive'    => _x('Archive',          'Template name', 'x3p0-ideas'),
			'attachment' => _x('Media Attachment', 'Template name', 'x3p0-ideas'),
			'author'     => _x('Author Archive',   'Template name', 'x3p0-ideas'),
			'category'   => _x('Category Archive', 'Template name', 'x3p0-ideas'),
			'date'       => _x('Date Archive',     'Template name', 'x3p0-ideas'),
			'home'       => _x('Blog',             'Template name', 'x3p0-ideas'),
			'page'       => _x('Page',             'Template name', 'x3p0-ideas'),
			'single'     => _x('Single Entry',     'Template name', 'x3p0-ideas'),
			'singular'   => _x('Singular',         'Template name', 'x3p0-ideas'),
			'tag'        => _x('Tag Archive',      'Template name', 'x3p0-ideas'),
			'taxonomy'   => _x('Term Archive',     'Template name', 'x3p0-ideas'),
		];
		// phpcs:enable

		// Loop through the custom titles and replace the default titles.
		foreach ($titles as $template => $title) {
			if (isset($types[ $template ])) {
				$types[ $template ]['title'] = $title;
			}
		}

		return $types;
	}

	/**
	 * Adds templates that WordPress does not define by default.
	 *
	 * @hook  default_template_types
	 * @since 1.0.0
	 * @link  https://developer.wordpress.org/reference/hooks/default_template_types/
	 */
	public function registerTypes(array $types): array
	{
		$templates = [
			'audio' => [
				'title'       => _x('Audio Attachment', 'Template name', 'x3p0-ideas'),
				'description' => __('Displays when a visitor views the dedicated page that exists for an audio attachment.', 'x3p0-ideas'),
			],
			'image' => [
				'title'       => _x('Image Attachment', 'Template name', 'x3p0-ideas'),
				'description' => __('Displays when a visitor views the dedicated page that exists for an image attachment.', 'x3p0-ideas'),
			],
			'single-post' => [
				'title'       => _x('Single Post', 'Template name', 'x3p0-ideas'),
				'description' => __('Displays single posts on your website unless a custom template has been applied to that post or a more specific template exists.', 'x3p0-ideas'),
			],
			'video' => [
				'title'       => _x('Video Attachment', 'Template name', 'x3p0-ideas'),
				'description' => __('Displays when a visitor views the dedicated page that exists for a video attachment.', 'x3p0-ideas'),
			]
		];

		// Loop through the additional templates and add them. Note that
		// we're first checking if core has registered the template (for
		// forward compatibility).
		foreach ($templates as $template => $options) {
			if (! isset($types[ $template ])) {
				$types[ $template ] = $options;
			}
		}

		return $types;
	}
}
