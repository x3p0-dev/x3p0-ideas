/**
 * Creates the overline RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { overlineIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { registerFormatType, toggleFormat } from '@wordpress/rich-text';

registerFormatType('x3p0/overline', {
	title: __('Overline', 'x3p0-ideas'),
	tagName: 'span',
	className: 'has-overline',
	edit: ({ isActive, onChange, value }) => (
		<RichTextToolbarButton
			icon={ overlineIcon }
			title={ __('Overline', 'x3p0-ideas') }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat(value, { type: name })
			) }
		/>
	)
});
