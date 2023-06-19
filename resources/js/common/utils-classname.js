/**
 * Common utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

// Removes the previous style class and adds the new one.
export const updateClass = ( className, newClass = '', oldClass = '', prefix = '' ) => {
	const list = new TokenList( className );

	if ( oldClass ) {
		list.remove( prefix ? prefix + oldClass : oldClass );
	}

	if ( newClass ) {
		list.add( prefix ? prefix + newClass : newClass );
	}

	return list.value;
};
