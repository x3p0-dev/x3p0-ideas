/**
 * Filters the `BlockEdit` to add a text shadow control.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import TextShadowControl    from './control-text-shadow';
import { SUPPORTED_BLOCKS } from './constants';

// WordPress dependencies.
import { InspectorControls } from '@wordpress/block-editor';

/**
 * @description Filters the and returns the `BlockEdit` component.
 */
export default ( BlockEdit ) => ( props ) => {
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
