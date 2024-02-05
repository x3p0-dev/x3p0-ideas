/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { updateClass } from '../../common/utils-classname';
import { LANGUAGES, LANGUAGE_PREFIX } from "./constants";

// WordPress dependencies.
import TokenList        from '@wordpress/token-list';
import { applyFilters } from '@wordpress/hooks';
import { __ }           from '@wordpress/i18n';

/**
 * Wraps the languages in a filter hook and returns them.
 *
 * @returns {array}
 */
export const getLanguages = () => applyFilters(
	'x3p0.ideas.blockEdit.codeLanguages',
	LANGUAGES
);

/**
 * Gets a language value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
export const getLanguageFromClassName = (className) => {
	const list = new TokenList(className);

	const language = getLanguages().find((option) =>
		list.contains(LANGUAGE_PREFIX + option.value)
	);

	return undefined !== language ? language.value : '';
};

/**
 * Removes the previous language class and adds the new one.
 *
 * @param {string} className
 * @param {string} newLanguage
 * @param {string} oldLanguage
 * @returns {string}
 */
export const updateLanguageClass = (className, newLanguage, oldLanguage) => updateClass(
	className,
	newLanguage,
	oldLanguage,
	LANGUAGE_PREFIX
);
