/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { updateClass }            from '../../common/utils-classname';
import { SHADOWS, SHADOW_PREFIX } from "./constants";

// WordPress dependencies.
import TokenList        from '@wordpress/token-list';
import { applyFilters } from '@wordpress/hooks';
import { __ }           from '@wordpress/i18n';

/**
 * @description Wraps the shadows in a filter hook and returns them.
 *
 * @returns {array}
 */
export const getShadows = () => applyFilters(
	'x3p0.ideas.blockEdit.textShadows',
	SHADOWS
);

/**
 * @description Gets a text shadow value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getShadowFromClassName = ( className ) => {
	const list = new TokenList( className );

	const shadow = getShadows().find( ( option ) =>
		list.contains( SHADOW_PREFIX + option.value )
	);

	return undefined !== shadow ? shadow.value : '';
};

/**
 * @description Removes the previous shadow class and adds the new one.
 *
 * @param {string} className
 * @param {string} newShadow
 * @param {string} oldShadow
 * @returns {string}
 */
export const updateShadowClass = ( className, newShadow, oldShadow ) => updateClass(
	className,
	newShadow,
	oldShadow,
	SHADOW_PREFIX
);
