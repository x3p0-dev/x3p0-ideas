/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
export const SUPPORTED_BLOCKS = [
	'core/post-featured-image',
	'core/image',
	'core/avatar'
];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
export const GRADIENT_PREFIX = 'gradient-';

/**
 * @description Supported gradients. We must manually add supported gradients
 * until we can register inline styles for the iframed editor. When that ability
 * is available, we should be able to add the custom style rules in the `<head>`
 * in both the editor and front-end. This would also allow support for any named
 * gradient but not custom ones.
 * @see https://github.com/WordPress/gutenberg/issues/18571
 *
 * @type {array}
 */
export const SUPPORTED_GRADIENTS = [
	// Core gradients.
	'vivid-cyan-blue-to-vivid-purple',
	'light-green-cyan-to-vivid-green-cyan',
	'luminous-vivid-amber-to-luminous-vivid-orange',
	'luminous-vivid-orange-to-vivid-red',
	'very-light-gray-to-cyan-bluish-gray',
	'cool-to-warm-spectrum',
	'blush-light-purple',
	'blush-bordeaux',
	'luminous-dusk',
	'pale-ocean',
	'electric-grass',
	'midnight',
	// Custom gradients.
	'emerald',
	'eternal-constance',
	'fabled-sunset',
	'magic-lake',
	'mohave',
	'near-moon',
	'oahu',
	'powerpuff',
	'rocket-power',
	'seashore',
	'shy-rainbow',
	'sky-sea',
	'solid-stone',
	'superman',
	'true-sunset',
	'violet-jaguar',
	'white-rainbow',
	'winter-neva'
];
