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
		'core/archives'           => Modifiers\Archives::class,
		'core/avatar'             => Modifiers\Avatar::class,
		'core/button'             => Modifiers\Button::class,
		'core/calendar'           => Modifiers\Calendar::class,
		'core/categories'         => Modifiers\Categories::class,
		'core/comment-content'    => Modifiers\CommentContent::class,
		'core/comments'           => Modifiers\Comments::class,
		'core/cover'              => Modifiers\Cover::class,
		'core/file'               => Modifiers\File::class,
		'core/group'              => Modifiers\Group::class,
		'core/heading'            => Modifiers\Heading::class,
		'core/navigation-submenu' => Modifiers\NavigationSubmenu::class,
		'core/post-template'      => Modifiers\PostTemplate::class,
		'core/query'              => Modifiers\Query::class,
		'core/query-pagination'   => Modifiers\QueryPagination::class,
		'core/tag-cloud'          => Modifiers\TagCloud::class
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
