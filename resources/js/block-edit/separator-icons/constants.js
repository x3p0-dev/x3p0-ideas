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
	'core/separator'
];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
export const STYLE_PREFIX = 'has-icon-';

/**
 * @description Array of icon options.
 * @type {array}
 */
export const ICONS = [
	{ value: '❦',  gradient:  '' },
	{ value: '🫠',  gradient:  'mohave' },
	{ value: '🌼',  gradient:  'mohave' },
	{ value: '☀️',  gradient:  'true-sunset' },
	{ value: '🪶',  gradient:  'shy-rainbow' },
	{ value: '🔥',  gradient:  'luminous-vivid-amber-to-luminous-vivid-orange' },
	{ value: '🍃',  gradient:  'emerald' },
	{ value: '☕',  gradient:  'oahu' },
	{ value: '🍻',  gradient:  'happy-memories' },
	{ value: '🪷',  gradient:  'blush-light-purple' },
	{ value: '🎸',  gradient:  'blush-bordeaux' },
	{ value: '✏️',  gradient:  'mohave' },
	{ value: '🚀',  gradient:  'superman' },
	{ value: '☘️',  gradient:  'emerald' },
	{ value: '⭐',  gradient:  'luminous-dusk' },
	{ value: '🌻',  gradient:  'true-sunset' },
	{ value: '⛱️',  gradient:  'powerpuff' }
];
