/**
 * Filters the `BlockEdit` to add a separator icon picker.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal imports.
import { SeparatorIconsControl } from './control-icons';
import { SUPPORTED_BLOCKS } from './constants';

// WordPress imports.
import { BlockControls } from '@wordpress/block-editor';

/**
 * @description Filters the and returns the `BlockEdit` component.
 */
export const withSeparatorIcons = ( BlockEdit ) => ( props ) => {

	return SUPPORTED_BLOCKS.includes( props.name ) ? (
		<>
			<BlockEdit { ...props } />
			<BlockControls group="other">
				<SeparatorIconsControl
					attributes={ props.attributes }
					setAttributes={ props.setAttributes }
				/>
			</BlockControls>
		</>
	) : (
		<BlockEdit { ...props } />
	);
};
