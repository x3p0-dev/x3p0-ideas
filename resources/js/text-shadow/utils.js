// Internal dependencies.
import { SHADOWS, SHADOW_PREFIX } from "./constants";

// WordPress dependencies.
import { __ }    from '@wordpress/i18n';
import TokenList from '@wordpress/token-list';

// Gets a text shadow if it is included in a class.
export const getShadowFromClassName = ( className ) => {
	let shadow = '';

	if ( className ) {
		SHADOWS.forEach( ( option ) => {
			if (
				option.value &&
				className.includes( SHADOW_PREFIX + option.value )
			) {
				shadow = option.value;
			}
		} );
	}

	return shadow;
};

// Removes the previous shadow class and adds the new one.
export const updateShadowClass = ( className, activeShadow, shadow ) => {
	const list = new TokenList( className );

	if ( activeShadow ) {
		list.remove( SHADOW_PREFIX + activeShadow );
	}

	if ( shadow ) {
		list.add( SHADOW_PREFIX + shadow );
	}

	return list.value;
};
