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
		'core/archives'           => Modifier\ArchivesModifier::class,
		'core/avatar'             => Modifier\AvatarModifier::class,
		'core/button'             => Modifier\ButtonModifier::class,
		'core/calendar'           => Modifier\CalendarModifier::class,
		'core/categories'         => Modifier\CategoriesModifier::class,
		'core/comment-content'    => Modifier\CommentContentModifier::class,
		'core/comments'           => Modifier\CommentsModifier::class,
		'core/cover'              => Modifier\CoverModifier::class,
		'core/file'               => Modifier\FileModifier::class,
		'core/group'              => Modifier\GroupModifier::class,
		'core/heading'            => Modifier\HeadingModifier::class,
		'core/navigation-submenu' => Modifier\NavigationSubmenuModifier::class,
		'core/post-template'      => Modifier\PostTemplateModifier::class,
		'core/query'              => Modifier\QueryModifier::class,
		'core/query-pagination'   => Modifier\QueryPaginationModifier::class,
		'core/tag-cloud'          => Modifier\TagCloudModifier::class
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
