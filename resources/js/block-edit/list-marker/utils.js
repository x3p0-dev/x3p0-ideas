/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { updateClass } from '../../common/utils-classname';

import {
	MARKERS,
	OL_MARKERS,
	UL_MARKERS,
	MARKER_PREFIX
} from './constants';

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * Gets a marker value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getMarkerFromClassName = (className) => {
	const list = new TokenList(className);

	const marker = MARKERS.find((option) =>
		list.contains(MARKER_PREFIX + option.value)
	);

	return undefined !== marker ? marker.value : '';
};

/**
 * Removes the previous marker class and adds the new one.
 *
 * @param {string} className
 * @param {string} newMarker
 * @param {string} oldMarker
 * @returns {string}
 */
export const updateMarkerClass = (className, newMarker, oldMarker) => updateClass(
	className,
	newMarker,
	oldMarker,
	MARKER_PREFIX
);

/**
 * Determines if the marker is for ordered lists.
 *
 * @param {string} slug
 * @returns {boolean}
 */
export const isOrderedMarker = (slug) => OL_MARKERS.find(
	marker => marker.value === slug
);

/**
 * Determines if the marker is for unordered lists.
 *
 * @param {string} slug
 * @returns {boolean}
 */
export const isUnorderedMarker = (slug) => UL_MARKERS.find(
	marker => marker.value === slug
);
