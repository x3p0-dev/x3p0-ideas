/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// WordPress imports.
import { __ } from '@wordpress/i18n';

/**
 * Array of supported blocks for the filter.
 * @type {array}
 */
export const SUPPORTED_BLOCKS = [
	'core/group',
	'core/paragraph'
];

/**
 * Prefix used for the class name.
 * @type {string}
 */
export const VARIATION_PREFIX = 'has-color-var-';

/**
 * Group of available variation options.
 * @type {object}
 */
export const VARIATIONS = {
	'default':   __('Default',   'x3p0-ideas'),
	'neutral':   __('Neutral',   'x3p0-ideas'),
	'primary':   __('Primary',   'x3p0-ideas'),
	'secondary': __('Secondary', 'x3p0-ideas'),
	'tertiary':  __('Tertiary',  'x3p0-ideas')
};

/**
 * Color shades that are paired with each variation (e.g.,
 * `primary-50`, `primary-100`, etc.)
 * @type {array}
 */
export const COLOR_SHADES = [
	'50',
	'100',
	'300',
	'500',
	'700',
	'900',
	'950'
];
