/**
 * Container Buttons variation for light/dark toggle.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

registerBlockVariation('core/buttons', {
	name: 'x3p0/buttons-toggle-color-scheme',
	title: __('Buttons: Light/Dark', 'x3p0-ideas'),
	description: __('Container for light/dark toggle button.', 'x3p0-ideas'),
	keywords: ['buttons', 'toggle', 'light', 'dark'],
	attributes: {
		className: 'buttons-toggle-color-scheme',
		templateLock: 'all'
	},
	innerBlocks: [
		[
			'core/button',
			{
				className: 'toggle-color-scheme',
				tagName: 'button',
				text: `<span class="screen-reader-text">${__('Toggle Color Scheme', 'x3p0-ideas')}<span>`,
				lock: { move: true, remove: true }
			}
		]
	],
	isActive: (blockAttributes, variationAttributes) => {
		const className = blockAttributes.className || '';

		return className.split(' ').includes(variationAttributes.className);
	}
});
