/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress imports.
import { __ } from '@wordpress/i18n';

/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
export const SUPPORTED_BLOCKS = [
	'core/group',
	'core/paragraph'
];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
export const VARIATION_PREFIX = 'has-color-var-';

/**
 * @description Group of available variation options.
 * @type {object}
 */
export const VARIATIONS = {
	'default':   __( 'Default',  'x3p0-ideas'  ),
	'neutral':   __( 'Neutral',  'x3p0-ideas'  ),
	'primary':   __( 'Primary',  'x3p0-ideas'  ),
	'secondary': __( 'Secondary', 'x3p0-ideas' ),
	'tertiary':  __( 'Tertiary',  'x3p0-ideas' ),
	'positive':  __( 'Positive', 'x3p0-ideas'  ),
	'negative':  __( 'Negative', 'x3p0-ideas'  )
};

/**
 * @description Color shades that are paired with each variation (e.g.,
 * `primary-base`, `primary-subtle`, etc.)
 * @type {array}
 */
export const COLOR_SHADES = [
	'base',
	'subtle',
	'muted',
	'contrast',
	'emphasis'
];
