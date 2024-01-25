/**
 * Filters the `BlockEdit` to add a gradient background control.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import GradientControl      from './control-gradient';
import { SUPPORTED_BLOCKS } from './constants';

// WordPress dependencies.
import { InspectorControls } from '@wordpress/block-editor';

/**
 * Filters and returns the `BlockEdit` component.
 *
 * @since 1.0.0
 */
export default (BlockEdit) => (props) => {
	return SUPPORTED_BLOCKS.includes(props.name) ? (
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
