/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { updateClass } from '../../common/utils-classname';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * @description Gets a text shadow value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const isScreenReaderText = ( className ) => {
	const list = new TokenList( className );

	return list.contains( 'has-screen-reader-text' );
};

/**
 * @description Removes the previous shadow class and adds the new one.
 *
 * @param {string} className
 * @param {string} newClass
 * @param {string} oldClass
 * @returns {string}
 */
export const updateScreenReaderClass = ( className, newClass, oldClass ) => updateClass(
	className,
	newClass,
	oldClass
);
