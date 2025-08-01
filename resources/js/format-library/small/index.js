/**
 * Creates the small RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { textDecreaseIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { registerFormatType, toggleFormat } from '@wordpress/rich-text';

const name = 'x3p0/small';

registerFormatType(name, {
	title: __('Small', 'x3p0-ideas'),
	tagName: 'small',
	className: null,
	edit: ({ isActive, onChange, value }) => (
		<RichTextToolbarButton
			icon={ textDecreaseIcon }
			title={ __('Small', 'x3p0-ideas') }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat(value, { type: name })
			) }
		/>
	)
});
