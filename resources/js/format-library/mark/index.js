/**
 * Creates the mark RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { markIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ }                    from '@wordpress/i18n';
import { toggleFormat }          from '@wordpress/rich-text';

/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/mark';

/**
 * @description RichText format type definition.
 * @type {object}
 */
export const markFormat = {
	name,
	title: __( 'Mark', 'x3p0-ideas' ),
	tagName: 'mark',
	className: null,
	edit: ( { isActive, onChange, value } ) => (
		<RichTextToolbarButton
			icon={ markIcon }
			title={ __( 'Mark', 'x3p0-ideas' ) }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat( value, { type: name } )
			) }
		/>
	)
};
