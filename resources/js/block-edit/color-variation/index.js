/**
 * Filters the `BlockEdit` to add a color variation picker.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal imports.
import ColorVariationControl from './control-color-variation';
import { SUPPORTED_BLOCKS } from './constants';

// WordPress imports.
import { BlockControls } from '@wordpress/block-editor';

/**
 * Filters and returns the `BlockEdit` component.
 *
 * @since 1.0.0
 */
export default (BlockEdit) => (props) => {
	return SUPPORTED_BLOCKS.includes(props.name) ? (
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
