
import { DelRichTextButton }      from './toolbar-button-del';
import { InsRichTextButton }      from './toolbar-button-ins';
import { MarkRichTextButton }     from './toolbar-button-mark';
import { OverlineRichTextButton } from './toolbar-button-overline';

import { __ } from '@wordpress/i18n';
import { registerFormatType } from '@wordpress/rich-text';

registerFormatType( 'x3p0/del', {
	title: __( 'Delete', 'x3p0-ideas' ),
	tagName: 'del',
	className: null,
	edit: DelRichTextButton
} );

registerFormatType( 'x3p0/ins', {
	title: __( 'Insert', 'x3p0-ideas' ),
	tagName: 'ins',
	className: null,
	edit: InsRichTextButton
} );

registerFormatType( 'x3p0/mark', {
	title: __( 'Mark', 'x3p0-ideas' ),
	tagName: 'mark',
	className: null,
	edit: MarkRichTextButton
} );

registerFormatType( 'x3p0/overline', {
	title: __( 'Overline', 'x3p0-ideas' ),
	tagName: 'span',
	className: 'has-overline',
	edit: OverlineRichTextButton
} );
