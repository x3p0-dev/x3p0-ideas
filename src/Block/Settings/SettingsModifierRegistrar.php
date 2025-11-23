<?php

/**
 * Settings modifier registration class.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2009-2025, Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-3.0.html GPL-3.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-breadcrumbs
 */

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings;

final class SettingsModifierRegistrar
{
	private const MODIFIERS = [
		'core/archives'           => Modifier\Archives::class,
		'core/avatar'             => Modifier\Avatar::class,
		'core/button'             => Modifier\Button::class,
		'core/calendar'           => Modifier\Calendar::class,
		'core/categories'         => Modifier\Categories::class,
		'core/comment-content'    => Modifier\CommentContent::class,
		'core/comments'           => Modifier\Comments::class,
		'core/cover'              => Modifier\Cover::class,
		'core/file'               => Modifier\File::class,
		'core/group'              => Modifier\Group::class,
		'core/heading'            => Modifier\Heading::class,
		'core/navigation-submenu' => Modifier\NavigationSubmenu::class,
		'core/post-template'      => Modifier\PostTemplate::class,
		'core/query'              => Modifier\Query::class,
		'core/query-pagination'   => Modifier\QueryPagination::class,
		'core/tag-cloud'          => Modifier\TagCloud::class
	];

	/**
	 * Registers default modifiers with the registry.
	 */
	public static function register(SettingsModifierRegistry $registry): void
	{
		foreach (self::MODIFIERS as $key => $modifierClass) {
			if (! $registry->isRegistered($key)) {
				$registry->register($key, $modifierClass);
			}
		}
	}
}
