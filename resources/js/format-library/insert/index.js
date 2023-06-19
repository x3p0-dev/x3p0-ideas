/**
 * Creates the insert RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { insertIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ }                    from '@wordpress/i18n';
import { toggleFormat }          from '@wordpress/rich-text';

/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/ins';

/**
 * @description RichText format type definition.
 * @type {object}
 */
export const insertFormat = {
	name,
	title: __( 'Insert', 'x3p0-ideas' ),
	tagName: 'ins',
	className: null,
	edit: ( { isActive, onChange, value } ) => (
		<RichTextToolbarButton
			icon={ insertIcon }
			title={ __( 'Insert', 'x3p0-ideas' ) }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat( value, { type: name } )
			) }
		/>
	)
};
