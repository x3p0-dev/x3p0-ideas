/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { updateClass } from '../../common/utils-classname';
import { SUPPORTED_GRADIENTS, GRADIENT_PREFIX } from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * @description Gets a gradient value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getGradientFromClassName = ( className ) => {
	const list = new TokenList( className );

	const gradient = SUPPORTED_GRADIENTS.find( ( option ) =>
		list.contains( GRADIENT_PREFIX + option )
	);

	return undefined !== gradient ? gradient : '';
};

/**
 * @description Removes the previous gradient class and adds a new one.
 *
 * @param {string} className
 * @param {string} newGradient
 * @param {string} oldGradient
 * @returns {string}
 */
export const updateGradientClass = ( className, newGradient, oldGradient ) => updateClass(
	className,
	SUPPORTED_GRADIENTS.includes( newGradient ) ? newGradient : '',
	oldGradient,
	GRADIENT_PREFIX
);
