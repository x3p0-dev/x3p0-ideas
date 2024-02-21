/**
 * Grid variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { __ } from '@wordpress/i18n';
import { grid } from '@wordpress/icons';

// Registers a grid variation for the Group block. This exists in the Gutenberg
// plugin, and we're just plugging it in here until it gets ported to WordPress
// at some point.
export default {
	block: 'core/group',
	variation: {
		name: 'group-grid',
		title: __('Grid', 'x3p0-ideas'),
		icon: grid,
		description: __('Arrange blocks in a grid.', 'x3p0-ideas'),
		scope: [ 'block', 'inserter', 'transform' ],
		attributes: {
			layout: {
				type: 'grid'
			}
		},
		isActive: (blockAttributes) =>
			blockAttributes.layout?.type === 'grid',
	}
};
