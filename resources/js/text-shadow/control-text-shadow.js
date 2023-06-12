// Internal dependencies.
import { SHADOWS } from './constants';

import {
	getShadowFromClassName,
	updateShadowClass
} from './utils';

// WordPress dependencies.
import { __ }                  from '@wordpress/i18n';
import { CustomSelectControl } from '@wordpress/components';
import { useMemo }             from '@wordpress/element';

// Define a default option for the select control.
const DEFAULT_OPTION = {
	key:  'default',
	name:  __( 'Default', 'x3p0-ideas' ),
	value: ''
};

// Creates a shadow control for a block.
export const TextShadowControl = ( {
	attributes: { className },
	setAttributes
} ) => {
	// Get the shadow and only update it when `className` changes.
	const shadow = useMemo(
		() => getShadowFromClassName( className ),
		[ className ]
	);

	const options = [
		DEFAULT_OPTION,
		...SHADOWS.map( ( shadow ) => {
			return {
				key:   shadow.value,
				name:  shadow.label,
				value: shadow.value
			};
		} )
	];

	return  (
		<div className="x3p0-text-shadow-control">
			<CustomSelectControl
				label={ __( 'Text Shadow', 'x3p0-ideas' ) }
				options={ options }
				value={ options.find(
					( option ) => option.value === shadow
				) }
				onChange={ ( { selectedItem } ) => setAttributes( {
					className: updateShadowClass(
						className,
						shadow,
						selectedItem.value
					)
				} ) }
				size="__unstable-large"
				__nextHasNoMarginBottom
			/>
		</div>
	);
};
