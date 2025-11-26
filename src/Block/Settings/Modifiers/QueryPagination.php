<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifiers;

use X3P0\Ideas\Block\Settings\SettingsModifier;

final class QueryPagination implements SettingsModifier
{
	/**
	 * {@inheritDoc}
	 *
	 * Adds support for Paragraphs to the Query Pagination block. This is
	 * specifically needed for binding a pagination label. Also adds spacing
	 * support.
	 */
	public function modify(array $settings): array
	{
		$settings['allowed_blocks'][] = 'core/paragraph';

		$settings['supports']['spacing']            ??= [];
		$settings['supports']['spacing']['margin']  ??= [ 'top', 'bottom' ];
		$settings['supports']['spacing']['padding'] ??= true;

		return $settings;
	}
}
