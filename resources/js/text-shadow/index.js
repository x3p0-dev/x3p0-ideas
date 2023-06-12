// Internal dependencies.
import { SUPPORTED_BLOCKS } from './constants';
import { TextShadowControl } from './control-text-shadow';

// WordPress dependencies.
import { InspectorControls } from '@wordpress/block-editor';

// Adds the text shadow control to any supported block.
export const withTextShadow = ( BlockEdit ) => ( props ) => {

	return SUPPORTED_BLOCKS.includes( props.name ) ? (
		<>
			<BlockEdit { ...props } />
			<InspectorControls group="typography">
				<TextShadowControl
					attributes={ props.attributes }
					setAttributes={ props.setAttributes }
				/>
			</InspectorControls>
		</>
	) : (
		<BlockEdit { ...props } />
	);
};
