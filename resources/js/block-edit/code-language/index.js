/**
 * Filters the `BlockEdit` to add a text shadow control.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import CodeLanguageControl from './control-code-language';
import { SUPPORTED_BLOCKS } from './constants';

// WordPress dependencies.
import { InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

/**
 * Filters and returns the `BlockEdit` component.
 *
 * @since 1.0.0
 */
export default (BlockEdit) => (props) => {
	return SUPPORTED_BLOCKS.includes(props.name) ? (
		<>
			<BlockEdit { ...props } />
			<InspectorControls group="settings">
				<PanelBody title={ __('Code Settings', 'x3p0-ideas') }>
					<CodeLanguageControl
						attributes={ props.attributes }
						setAttributes={ props.setAttributes }
					/>
				</PanelBody>
			</InspectorControls>
		</>
	) : (
		<BlockEdit { ...props } />
	);
};
