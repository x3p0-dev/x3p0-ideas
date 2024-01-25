/**
 * Registers block variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// WordPress dependencies.
import { __ } from '@wordpress/i18n';
import { grid } from '@wordpress/icons';
import domReady from '@wordpress/dom-ready';
import { getBlockVariations, registerBlockVariation } from '@wordpress/blocks';

// Registers the theme spacer as the default so that---with any luck---users
// will choose the theme spacing sizes over custom sizes. Note that there is
// currently no way to set the default spacer size via `theme.json` nor is there
// a way to disable custom spacing sizes.
registerBlockVariation('core/spacer', {
	name:       'x3p0/theme-spacer',
	title:      __('Spacer', 'x3p0-ideas'),
	isDefault:  true,
	keywords:   [ 'space', 'spacer', 'spacing' ],
	attributes: {
		height: 'var:preset|spacing|plus-3'
	},
	isActive: (blockAttributes) =>
		blockAttributes.height && blockAttributes.height.includes('var:preset|spacing|')
});

// `getBlockVariations()` returns `undefined` unless we wait until the DOM is
// ready. We need this to conditionally register variations.
domReady(() => {
	const variations = getBlockVariations('core/group');

	// Registers a grid variation for the Group block. This exists in the
	// Gutenberg plugin, and we're just plugging it in here until it gets
	// ported to WordPress at some point.
	if (! variations.some(variation => 'group-grid' === variation.name)) {
		registerBlockVariation('core/group', {
			name: 'group-grid',
			title: __('Grid', 'x3p0-ideas'),
			icon: grid,
			description: __('Arrange blocks in a grid.', 'x3p0-ideas'),
			attributes: { layout: { type: 'grid' } },
			scope: [ 'block', 'inserter', 'transform' ],
			isActive: (blockAttributes) =>
				blockAttributes.layout?.type === 'grid',
		});
	}
});
