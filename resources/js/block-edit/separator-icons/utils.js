/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { updateClass }         from '../../common/utils-classname';
import { ICONS, STYLE_PREFIX } from './constants';

// WordPress dependencies.
import TokenList        from '@wordpress/token-list';
import { applyFilters } from '@wordpress/hooks';

/**
 * @description Wraps the icons in a filter hook and returns them.
 *
 * @returns {array}
 */
export const getIcons = () => Array.from( applyFilters(
	'x3p0.ideas.blockEdit.separatorIcons',
	new Set( ICONS )
) );

/**
 * @description Gets an icon slug/value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getIconFromClassName = ( className ) => {
	const list = new TokenList( className );

	const style = getIcons().find( ( option ) =>
		list.contains( STYLE_PREFIX + option.value )
	);

	return undefined !== style ? style.value : '';
};

/**
 * @description Removes the previous icon class and adds a new one.
 *
 * @param {string} className
 * @param {string} newIcon
 * @param {string} oldIcon
 * @returns {string}
 */
export const updateIconClass = ( className, newIcon, oldIcon ) => updateClass(
	className,
	newIcon,
	oldIcon,
	STYLE_PREFIX
);
