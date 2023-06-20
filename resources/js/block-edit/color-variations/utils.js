/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { updateClass } from '../../common/utils-classname';
import { VARIATIONS, VARIATION_PREFIX } from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * @description Gets a variation value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getVariationFromClassName = ( className ) => {
	const list = new TokenList( className );

	const variation = Object.keys( VARIATIONS ).find( ( option ) =>
		list.contains( VARIATION_PREFIX + option )
	);

	return undefined !== variation ? variation : '';
};

/**
 * @description Removes the previous variation class and adds the new one.
 *
 * @param {string} className
 * @param {string} newVar
 * @param {string} oldVar
 * @returns {string}
 */
export const updateVariationClass = ( className, newVar, oldVar ) => updateClass(
	className,
	'default' === newVar ? '' : newVar,
	oldVar,
	VARIATION_PREFIX
);
