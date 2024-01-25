/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { VARIATIONS } from './constants';

/**
 * Returns the color variation based on the color-related block attributes.
 *
 * @param {Object} attributes
 * @returns {Object}
 */
export const getVariationFromAttributes = (attributes) => {
	let variation = '';

	Object.keys(VARIATIONS).forEach((type) => {
		if (
			attributes.textColor === `${type}-900`
			&& attributes.backgroundColor === `${type}-50`
			&& attributes.borderColor === `${type}-100`
			&& ! attributes?.gradient
		) {
			variation = type;
			return;
		}
	});

	return variation;
}

/**
 * Returns the updated color attributes based on the variation.
 *
 * @param {string} variation
 * @returns {Object}
 */
export const updateAttributes = (variation) => {

	if ('default' === variation) {
		return {
			borderColor: false,
			backgroundColor: false,
			textColor: false,
			gradient: false
		};
	}

	return {
		borderColor: `${variation}-100`,
		backgroundColor: `${variation}-50`,
		textColor: `${variation}-900`,
		gradient: false
	};
}
