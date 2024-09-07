<?php

/**
 * A trait for defining attribute-based actions and filters with class methods.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2008-2024 Justin Tadlock
 * @license   https://gnu.org/licenses/old-licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://github.com/x3p0-dev/x3p0-ideas
 */

declare(strict_types=1);

namespace X3P0\Ideas\Tools\Hooks;

trait Hookable
{
	/**
	 * Registers all class members with attributes that have the `Hook`
	 * contract as actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookMembers(): void
	{
		$this->hookMethods();
		$this->hookProperties();
		$this->hookConstants();
	}

	/**
	 * Registers constants with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookConstants(): void
	{
		HookResolver::registerConstants($this);
	}

	/**
	 * Registers methods with attributes that have the `Hook` contract as
	 * actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookMethods(): void
	{
		HookResolver::registerMethods($this);
	}

	/**
	 * Registers properties with attributes that have the `Hook` contract as
	 * anonymous actions or filters.
	 *
	 * @since 1.0.0
	 */
	protected function hookProperties(): void
	{
		HookResolver::registerProperties($this);
	}
}
