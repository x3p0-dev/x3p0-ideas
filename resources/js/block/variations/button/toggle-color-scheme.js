/**
 * Color scheme block variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { darkMode } from '../../../common/utils-icon';

registerBlockVariation('core/button', {
	name: 'x3p0/button-toggle-color-scheme',
	title: __('Toggle: Light/Dark', 'x3p0-ideas'),
	description: __('Toggle button for switching between light and dark mode.', 'x3p0-ideas'),
	icon: darkMode,
	isDefault: true,
	keywords: ['button', 'toggle', 'light', 'dark'],
	attributes: {
		className: 'toggle-color-scheme',
		tagName: 'button',
		text: `<span class="screen-reader-text">${__('Toggle Color Scheme', 'x3p0-ideas')}<span>`
	},
	isActive: (blockAttributes, variationAttributes) => {
		const className = blockAttributes.className || '';
		const tagName = blockAttributes.tagName || '';

		return className.split(' ').includes(variationAttributes.className)
			&& 'button' === tagName;
	}
});
