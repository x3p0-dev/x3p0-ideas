
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { lineSolid } from '@wordpress/icons';
import { toggleFormat } from '@wordpress/rich-text';

// https://fonts.google.com/icons?icon.query=highlight&selected=Material+Symbols+Outlined:format_ink_highlighter:FILL@0;wght@300;GRAD@-25;opsz@24
const markIcon = (
	<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
		<path d="M84.846-6.961v-111.921h790.308v111.92H84.846Zm467.038-450L449.499-559.346 301.192-410.038q-3.654 3.461-3.654 8.462 0 5 3.654 8.462l85.152 84.653q3.462 3.461 8.463 3.461 5 0 8.462-3.461l148.615-148.5Zm-62.347-142.115 102.077 102.269 187.731-187.615q3.462-3.462 3.462-8.751t-3.462-8.943l-84.999-84.999q-3.654-3.462-8.943-3.462-5.288 0-8.75 3.462L489.537-599.076Zm-59.691-20.076 181.537 181.536-168.077 168.192q-20.577 20.577-49.153 20.577-28.577 0-49.154-20.577l-4.962-4.962-37.423 36.578h-145.69l109.961-110.653-4.192-4.385q-20.577-20.384-20.789-49.173-.211-28.788 20.366-49.365l167.576-167.768Zm0 0 209.077-208.885q19.884-20.077 48-19.673 28.115.404 47.692 20.481l84.652 85.152q20.077 20.577 20.077 48.596 0 28.019-20.077 48.096L611.383-437.616 429.846-619.152Z"/>
	</svg>
);

export const MarkRichTextButton = ( { isActive, onChange, value } ) =>
{
	return (
		<RichTextToolbarButton
			icon={ markIcon }
			title={ __( 'Mark', 'x3p0-ideas' ) }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat( value, {
					type: 'x3p0/mark'
				} )
			) }
		/>
	);
};
