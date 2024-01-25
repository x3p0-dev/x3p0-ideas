/**
 * Text shadow component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import {
	getShadows,
	getShadowFromClassName,
	updateShadowClass
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
 * Creates a text shadow selector control.
 * @example
 * <GradientControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
export default ({ attributes: { className }, setAttributes }) => {
	// Get the shadow and only update it when `className` changes.
	const shadow = useMemo(
		() => getShadowFromClassName(className),
		[ className ]
	);

	const options = [
		DEFAULT_OPTION,
		...getShadows().map((shadow) => ({
			key:   shadow.value,
			name:  shadow.label,
			value: shadow.value
		}))
	];

	return  (
		<div className="x3p0-text-shadow">
			<CustomSelectControl
				label={ __('Text Shadow', 'x3p0-ideas') }
				options={ options }
				value={ options.find(
					(option) => option.value === shadow
				) }
				onChange={ ({ selectedItem }) => setAttributes({
					className: updateShadowClass(
						className,
						selectedItem.value,
						shadow
					)
				}) }
				size="__unstable-large"
				__nextHasNoMarginBottom
				__nextUnconstrainedWidth
			/>
		</div>
	);
};
