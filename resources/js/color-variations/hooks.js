import { VARIATIONS, COLOR_SHADES } from "./constants";

import { useSetting } from '@wordpress/block-editor';

export const useVariationColors = () => {
	// Gets the variations as registered in `theme.json`.
	const palette = useSetting( 'color.palette' );

	let colors = {};

	Object.keys( VARIATIONS ).forEach( ( type ) => {
		colors[ type ] = {};

		COLOR_SHADES.forEach( ( shade ) => {
			const name = 'default' === type
				? shade
				: `${ type }-${ shade }`;

			const result = palette.find(
				( { slug } ) => slug == name
			);

			if ( result ) {
				colors[ type ][ shade ] = result.color;
			}
		} );
	} );

	return colors;
};
