// Internal dependencies.
import { VARIATIONS, VARIATION_PREFIX } from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

// Gets a variation if it is included in a class.
export const getVariationFromClassName = ( className ) => {
	let variation = '';

	if ( className ) {
		Object.keys( VARIATIONS ).forEach( ( value ) => {
			if (
				value &&
				className.includes( VARIATION_PREFIX + value )
			) {
				variation = value;
			}
		} );
	}

	return variation;
};

// Removes the previous variation class and adds the new one.
export const updateVariationClass = ( className, activeVariation, variation ) => {
	const list = new TokenList( className );

	if ( 'default' === variation ) {
		variation = '';
	}

	if ( activeVariation ) {
		list.remove( VARIATION_PREFIX + activeVariation );
	}

	if ( variation ) {
		list.add( VARIATION_PREFIX + variation );
	}

	return list.value;
};
