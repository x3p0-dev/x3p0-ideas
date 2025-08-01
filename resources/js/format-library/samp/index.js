/**
 * Creates a RichText format type for the HTML `<samp>` tag.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { computerIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { registerFormatType, toggleFormat } from '@wordpress/rich-text';

const name = 'x3p0/samp';

registerFormatType(name, {
	title: __('Sample Outputer', 'x3p0-ideas'),
	tagName: 'samp',
	className: null,
	edit: ({ isActive, onChange, value }) => (
		<RichTextToolbarButton
			icon={ computerIcon }
			title={ __('Sample Output', 'x3p0-ideas') }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat(value, { type: name })
			) }
		/>
	)
});
