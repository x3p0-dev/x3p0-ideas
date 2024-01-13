/**
 * Gradient background component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { useGradients } from './hooks';
import { getGradientFromClassName, updateGradientClass } from './utils';

import {
	gradientAttribute,
	gradientSlug
} from '../../common/utils-gradient';

// WordPress dependencies.
import { __ } from '@wordpress/i18n';

import {
	getGradientValueBySlug,
	__experimentalColorGradientSettingsDropdown as ColorGradientSettingsDropdown
} from '@wordpress/block-editor';

/**
 * @description Creates a custom gradient picker.
 * @example
 * <GradientControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
export default ( { attributes: { className }, setAttributes, clientId } ) => {

	// Get flattened gradients array and gradient options.
	const { gradients, gradientOptions } = useGradients();

	// Get the current gradient.
	const currentGradient = getGradientFromClassName( className, gradients );

	// Returns the current gradient value by slug or null.
	const getGradientValue = () =>
		currentGradient
		? getGradientValueBySlug( gradients, currentGradient )
		: null;

	// Returns a gradient slug by its value.
	const getGradientSlugByValue = ( value ) => gradientSlug(
		gradientAttribute( value, gradients )
	);

	// Define the gradient picker settings.
	const settings = {
		label: __( 'Gradient Outline', 'x3p0-ideas' ),
		gradientValue: getGradientValue(),
		onGradientChange: ( value ) => setAttributes( {
			className: updateGradientClass(
				className,
				getGradientSlugByValue( value ),
				currentGradient
			)
		} ),
		isShownByDefault: true,
		disableCustomColors: true,
		disableCustomGradients: true,
		hasColorsOrGradients: false,
		gradients: gradientOptions
	};

	return (
		<ColorGradientSettingsDropdown
			settings={ [ settings ] }
			panelId={ clientId }
			__experimentalIsRenderedInSidebar={ true }
			__experimentalHasMultipleOrigins={ true }
		/>
	);
};
