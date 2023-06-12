// Internal dependencies.
import { SUPPORTED_GRADIENTS, GRADIENT_PREFIX } from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

// Gets a gradient if it is included in a class.
export const getGradientFromClassName = ( className ) => {
	let gradient = '';

	if ( className ) {
		SUPPORTED_GRADIENTS.forEach( ( value ) => {
			if (
				value &&
				className.includes( GRADIENT_PREFIX + value )
			) {
				gradient = value;
			}
		} );
	}

	return gradient;
};

// Removes the previous gradient class and adds the new one.
export const updateGradientClass = ( className, activeGradient, gradient ) => {
	const list = new TokenList( className );

	if ( activeGradient ) {
		list.remove( GRADIENT_PREFIX + activeGradient );
	}

	if ( gradient && SUPPORTED_GRADIENTS.includes( gradient ) ) {
		list.add( GRADIENT_PREFIX + gradient );
	}

	return list.value;
};
