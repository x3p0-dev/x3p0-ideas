/**
 * Creates the big RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { textIncreaseIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ }                    from '@wordpress/i18n';
import { toggleFormat }          from '@wordpress/rich-text';

/**
 * Name of the format.
 * @type {string}
 */
const name = 'x3p0/big';

/**
 * RichText format type definition.
 * @type {object}
 */
export default {
	name,
	title: __('Big', 'x3p0-ideas'),
	tagName: 'span',
	className: 'has-larger-text',
	edit: ({ isActive, onChange, value }) => (
		<RichTextToolbarButton
			icon={ textIncreaseIcon }
			title={ __('Big', 'x3p0-ideas') }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat(value, { type: name })
			) }
		/>
	)
};
