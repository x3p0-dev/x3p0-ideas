/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.
import { __ } from '@wordpress/i18n';

/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
export const SUPPORTED_BLOCKS = [
	'core/list'
];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
export const MARKER_PREFIX = 'has-marker-';

/**
 * @description Unordered list options.
 * @type {array}
 */
export const UL_MARKERS = [
	{ value: 'arrow',  label:   __( 'Arrow',  'x3p0-ideas' ) },
	{ value: 'dash',   label:   __( 'Dash',   'x3p0-ideas' ) },
	{ value: 'disc',   label:   __( 'Disc',   'x3p0-ideas' ) },
	{ value: 'circle', label:   __( 'Circle', 'x3p0-ideas' ) },
	{ value: 'square', label:   __( 'Square', 'x3p0-ideas' ) },
	{ value: 'none',   label:   __( 'None',   'x3p0-ideas' ) }
];

/**
 * @description Ordered list options.
 * @type {array}
 */
export const OL_MARKERS = [
	{ value: 'decimal',      label: __( 'Decimal',                 'x3p0-ideas' ) },
	{ value: 'leading-zero', label: __( 'Leading Zero',            'x3p0-ideas' ) },
	{ value: 'upper-alpha',  label: __( 'Alphabetical: Uppercase', 'x3p0-ideas' ) },
	{ value: 'lower-alpha',  label: __( 'Alphabetical: Lowercase', 'x3p0-ideas' ) },
	{ value: 'upper-roman',  label: __( 'Roman: Uppercase',        'x3p0-ideas' ) },
	{ value: 'lower-roman',  label: __( 'Roman: Lowercase',        'x3p0-ideas' ) }
];

/**
 * @description Combined array of list options.
 * @type {array}
 */
export const MARKERS = [
	...UL_MARKERS,
	...OL_MARKERS
];
