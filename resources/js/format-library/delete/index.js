/**
 * Creates the delete RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { delIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { registerFormatType, toggleFormat } from '@wordpress/rich-text';

const name = 'x3p0/del';

registerFormatType(name, {
	title: __('Delete', 'x3p0-ideas'),
	tagName: 'del',
	className: null,
	edit: ({ isActive, onChange, value }) => (
		<RichTextToolbarButton
			icon={ delIcon }
			title={ __('Delete', 'x3p0-ideas') }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat(value, { type: name })
			) }
		/>
	)
});
