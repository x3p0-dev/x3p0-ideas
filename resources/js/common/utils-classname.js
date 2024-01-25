/**
 * Common utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// WordPress dependencies.
import TokenList from '@wordpress/token-list';

/**
 * Removes the previous style class and adds the new one.
 *
 * @param {string} className
 * @param {string} newClass
 * @param {string} oldClass
 * @param {string} prefix
 * @param {string} suffix
 * @returns string
 *
 * @example
 * const className = 'prefix-bar-suffix';
 * const newClass = updateClass(className, 'foo', 'bar', 'prefix-', '-suffix');
 * // returns: 'prefix-foo-suffix
 */
export const updateClass = (
	className,
	newClass = '',
	oldClass = '',
	prefix = '',
	suffix = ''
) => {
	const list = new TokenList(className);

	if (oldClass) {
		list.remove(prefix + oldClass + suffix);
	}

	if (newClass) {
		list.add(prefix + newClass + suffix);
	}

	return list.value;
};
