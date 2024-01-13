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
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
export const SUPPORTED_BLOCKS = [
	'core/heading',
	'core/paragraph'
];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
export const SHADOW_PREFIX = 'has-text-shadow-';

/**
 * @description Array of icon options. Ideally, we'd be able to pull these from
 * `theme.json`, but the `settings.custom` options is best suited to CSS custom
 * properties and not text strings (for the labels).
 * @type {array}
 */
export const SHADOWS = [
	{ value: 'none', label: __( 'None',   'x3p0-ideas' ) },
	{ value: 'sm',   label: __( 'Small',  'x3p0-ideas' ) },
	{ value: 'md',   label: __( 'Medium', 'x3p0-ideas' ) },
	{ value: 'lg',   label: __( 'Large',  'x3p0-ideas' ) }
];
