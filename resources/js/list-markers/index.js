// Internal dependencies.
import { SUPPORTED_BLOCKS } from './constants';
import { MarkerDropdownControl } from './control-marker-dropdown';

import {
	BlockControls
} from '@wordpress/block-editor';

export const withListMarker = ( BlockEdit ) => ( props ) => {

	return SUPPORTED_BLOCKS.includes( props.name ) ? (
		<>
			<BlockEdit { ...props } />
			<BlockControls group="other">
				<MarkerDropdownControl
					attributes={ props.attributes }
					setAttributes={ props.setAttributes }
				/>
			</BlockControls>
		</>
	) : (
		<BlockEdit { ...props } />
	);
};
