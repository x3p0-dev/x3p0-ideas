// Internal dependencies.
import {
	MARKERS,
	OL_MARKERS,
	UL_MARKERS,
	MARKER_PREFIX
} from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

// Gets a marker if it is included in a class.
export const getMarkerFromClassName = ( className ) => {
	let marker = '';

	if ( className ) {
		MARKERS.forEach( ( value ) => {
			if (
				value.value &&
				className.includes( MARKER_PREFIX + value.value )
			) {
				marker = value.value;
			}
		} );
	}

	return marker;
};

// Removes the previous marker class and adds the new one.
export const updateMarkerClass = ( className, activeMarker, marker ) => {
	const list = new TokenList( className );

	if ( activeMarker ) {
		list.remove( MARKER_PREFIX + activeMarker );
	}

	if ( marker ) {
		list.add( MARKER_PREFIX + marker );
	}

	return list.value;
};

// Checks if the marker is for ordered lists.
export const isOrderedMarker = ( slug ) => {
	return OL_MARKERS.find( element => element.value === slug );
};

// Checks if the marker is for unordered lists.
export const isUnorderedMarker = ( slug ) => {
	return UL_MARKERS.find( element => element.value === slug );
};
