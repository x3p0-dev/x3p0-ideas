// Internal dependencies.
import { SUPPORTED_BLOCKS } from './constants';
import { GradientControl } from './control-gradient';

// WordPress dependencies.
import { InspectorControls } from '@wordpress/block-editor';

export const withGradientBackground = ( BlockEdit ) => ( props ) => {

	return SUPPORTED_BLOCKS.includes( props.name ) ? (
		<>
			<BlockEdit { ...props } />
			<InspectorControls group="color">
				<GradientControl
					attributes={ props.attributes }
					setAttributes={ props.setAttributes }
					clientId={ props.clientId }
				/>
			</InspectorControls>
		</>
	) : (
		<BlockEdit { ...props } />
	);
};
