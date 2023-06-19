/**
 * Registers block variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.
import { __ } from '@wordpress/i18n';
import { registerBlockVariation } from '@wordpress/blocks';

// Registers the theme spacer as the default so that---with any luck---users
// will choose the theme spacing sizes over custom sizes. Note that there is
// currently no way to set the default spacer size via `theme.json` nor is there
// a way to disable custom spacing sizes.
registerBlockVariation( 'core/spacer', {
	name: 'x3p0/theme-spacer',
	title: __( 'Spacer (Theme)', 'x3p0-ideas' ),
	isDefault: true,
	keywords: [ 'space', 'spacer', 'spacing' ],
	attributes: {
		height: 'var:preset|spacing|plus-3'
	},
	isActive: ( blockAttributes ) =>
		blockAttributes.height.includes( 'var:preset|spacing|' )
} );

