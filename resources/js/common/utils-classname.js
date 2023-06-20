/**
 * Common utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * @description Removes the previous style class and adds the new one.
 *
 * @param {string} className
 * @param {string} newClass
 * @param {string} oldClass
 * @param {string} prefix
 * @returns string
 *
 * @example
 * const className = 'has-style-bar';
 * const newClass = updateClass( className, 'foo', 'bar', 'has-style-' );
 * // returns: 'has-style-foo'
 */
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
