/**
 * Creates the overline RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { overlineIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ }                    from '@wordpress/i18n';
import { toggleFormat }          from '@wordpress/rich-text';

/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/overline';

/**
 * @description RichText format type definition.
 * @type {object}
 */
export default {
	name,
	title: __( 'Overline', 'x3p0-ideas' ),
	tagName: 'span',
	className: 'has-overline',
	edit: ( { isActive, onChange, value } ) => (
		<RichTextToolbarButton
			icon={ overlineIcon }
			title={ __( 'Overline', 'x3p0-ideas' ) }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat( value, { type: name } )
			) }
		/>
	)
};
