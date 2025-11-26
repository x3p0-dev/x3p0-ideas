<?php

declare(strict_types=1);

namespace X3P0\Ideas\Block\Settings\Modifier;

final class ButtonModifier extends Modifier
{
	/**
	 * {@inheritDoc}
	 *
	 * Adds Interactivity API support to the Button block. This is needed
	 * for the light/dark toggle and other use cases where we might use the
	 * `<button>` element instead of an `<a>` element.
	 */
	public function modify(array $settings): array
	{
		$settings['supports']['interactivity'] = true;

		return $settings;
	}
}
