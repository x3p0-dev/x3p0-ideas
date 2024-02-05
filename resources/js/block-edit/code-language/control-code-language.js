/**
 * Text language component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import {
	getLanguages,
	getLanguageFromClassName,
	updateLanguageClass
} from './utils';

// WordPress dependencies.
import { __ }                  from '@wordpress/i18n';
import { CustomSelectControl } from '@wordpress/components';
import { useMemo }             from '@wordpress/element';

/**
 * A default option for `<CustomSelectControl/>`.
 * @type {object}
 */
const DEFAULT_OPTION = {
	key:  'default',
	name:  __('Default', 'x3p0-ideas'),
	value: ''
};

/**
 * Creates a language selector control.
 * @example
 * <GradientControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
export default ({ attributes: { className }, setAttributes }) => {
	// Get the language and only update it when `className` changes.
	const language = useMemo(
		() => getLanguageFromClassName(className),
		[ className ]
	);

	const options = [
		DEFAULT_OPTION,
		...getLanguages().map((language) => ({
			key:   language.value,
			name:  language.label,
			value: language.value
		}))
	];

	return  (
		<div className="x3p0-code-language">
			<CustomSelectControl
				label={ __('Code Language', 'x3p0-ideas') }
				options={ options }
				value={ options.find(
					(option) => option.value === language
				) }
				onChange={ ({ selectedItem }) => setAttributes({
					className: updateLanguageClass(
						className,
						selectedItem.value,
						language
					)
				}) }
				size="__unstable-large"
				__nextHasNoMarginBottom
				__nextUnconstrainedWidth
			/>
		</div>
	);
};
