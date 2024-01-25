/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { updateClass } from '../../common/utils-classname';
import { GRADIENT_PREFIX, GRADIENT_SUFFIX } from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * Gets a gradient value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getGradientFromClassName = (className, gradients) => {
	const list = new TokenList(className);

	const gradient = gradients.find((option) =>
		list.contains(GRADIENT_PREFIX + option.slug + GRADIENT_SUFFIX)
	);

	return undefined !== gradient ? gradient.slug : '';
};

/**
 * Removes the previous gradient class and adds a new one.
 *
 * @param {string} className
 * @param {string} newGradient
 * @param {string} oldGradient
 * @returns {string}
 */
export const updateGradientClass = (className, newGradient, oldGradient) => updateClass(
	className,
	newGradient,
	oldGradient,
	GRADIENT_PREFIX,
	GRADIENT_SUFFIX
);
