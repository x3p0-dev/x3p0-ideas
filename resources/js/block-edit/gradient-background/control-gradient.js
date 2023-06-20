/**
 * Gradient background component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
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
	// We're only getting theme and core gradients until it's possible to
	// inline CSS in the editor. Otherwise, there's no way to dynamically
	// add the CSS rules needed for unknowns.
	// @see https://github.com/WordPress/gutenberg/issues/18571
	const {
		gradients,
		theme: themeGradients,
		default: defaultGradients
	} = useGradients();

	// Get the current gradient.
	const currentGradient = getGradientFromClassName( className );

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
		gradients: [
			{
				name: __( 'Theme', 'x3p0-ideas' ),
				gradients: themeGradients || []
			},
			{
				name: __( 'Default', 'x3p0-ideas' ),
				gradients: defaultGradients || []
			}
		]
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
