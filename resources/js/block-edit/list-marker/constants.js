/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// WordPress dependencies.
import { __ } from '@wordpress/i18n';

/**
 * Array of supported blocks for the filter.
 * @type {array}
 */
export const SUPPORTED_BLOCKS = [
	'core/archives',
	'core/categories',
	'core/list',
	'core/page-list'
];

/**
 * Prefix used for the class name.
 * @type {string}
 */
export const MARKER_PREFIX = 'has-marker-';

/**
 * Unordered list options.
 * @type {array}
 */
export const UL_MARKERS = [
	{ value: 'disc',   label:   __('Disc',   'x3p0-ideas') },
	{ value: 'circle', label:   __('Circle', 'x3p0-ideas') },
	{ value: 'square', label:   __('Square', 'x3p0-ideas') },
	{ value: 'none',   label:   __('None',   'x3p0-ideas') }
];

/**
 * Ordered list options.
 * @type {array}
 */
export const OL_MARKERS = [
	{ value: 'decimal',      label: __('Decimal',                 'x3p0-ideas') },
	{ value: 'leading-zero', label: __('Leading Zero',            'x3p0-ideas') },
	{ value: 'upper-alpha',  label: __('Alphabetical: Uppercase', 'x3p0-ideas') },
	{ value: 'lower-alpha',  label: __('Alphabetical: Lowercase', 'x3p0-ideas') },
	{ value: 'upper-roman',  label: __('Roman: Uppercase',        'x3p0-ideas') },
	{ value: 'lower-roman',  label: __('Roman: Lowercase',        'x3p0-ideas') },
	{ value: 'none',         label: __('None',                    'x3p0-ideas') }
];

/**
 * Combined array of list options.
 * @type {array}
 */
export const MARKERS = [
	...UL_MARKERS,
	...OL_MARKERS
];
