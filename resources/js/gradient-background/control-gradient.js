// Internal dependencies.
import { useGradients } from './hooks';
import { getGradientFromClassName, updateGradientClass } from './utils';

import {
	gradientAttribute,
	gradientSlug
} from '../common/utils-gradient';

// WordPress dependencies.
import { __ } from '@wordpress/i18n';

import {
	getGradientValueBySlug,
	__experimentalColorGradientSettingsDropdown as ColorGradientSettingsDropdown
} from '@wordpress/block-editor';

// Creates a shadow control for a block.
export const GradientControl = ( {
	attributes: { className },
	setAttributes,
	clientId
} ) => {

	const {
		gradients,
		theme: themeGradients,
		default: defaultGradients
	} = useGradients();

	// Get the current gradient.
	const currentGradient = getGradientFromClassName( className );

	// Returns the current gradient value by slug or null.
	const getGradientValue = () => currentGradient
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
				currentGradient,
				getGradientSlugByValue( value )
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
