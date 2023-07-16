/**
 * Group block settings filter.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

/**
 * Adds support for axial block spacing. This is only needed for
 * the `row` variation, but there's not good way to contextually add it only in
 * that instance that I know of.
 *
 * @link   https://github.com/WordPress/gutenberg/issues/47084
 * @param {Object} settings
 * @param {string} name
 */
export default ( settings, name ) => {
	return name === 'core/group' ? Object.assign( {}, settings, {
		supports: Object.assign( settings.supports ?? {}, {
			spacing: Object.assign( settings.supports.spacing ?? {}, {
				blockGap: [ 'horizontal', 'vertical' ]
			} )
		} )
	} ) : settings;
};
