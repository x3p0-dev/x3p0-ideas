// Internal imports.
import { ColorVariationControl } from './control-color-variation';
import { SUPPORTED_BLOCKS } from './constants';

// WordPress imports.
import { BlockControls } from '@wordpress/block-editor';

export const withColorVariation = ( BlockEdit ) => ( props ) => {

	return SUPPORTED_BLOCKS.includes( props.name ) ? (
		<>
			<BlockEdit { ...props } />
			<BlockControls group="other">
				<ColorVariationControl
					attributes={ props.attributes }
					setAttributes={ props.setAttributes }
				/>
			</BlockControls>
		</>
	) : (
		<BlockEdit { ...props } />
	);
};
