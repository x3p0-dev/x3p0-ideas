
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';
import { toggleFormat } from '@wordpress/rich-text';

const overlineIcon = (
	<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
		<path d="M216.27-772.116v-55.96h527.46v55.96H216.27ZM480.023-136.27q-110.192 0-186.972-76.758-76.781-76.757-76.781-186.949 0-110.192 76.758-186.972 76.757-76.781 186.949-76.781 110.192 0 186.972 76.758 76.781 76.757 76.781 186.949 0 110.192-76.758 186.972-76.757 76.781-186.949 76.781ZM480-203.73q81.635 0 138.953-57.317Q676.27-318.365 676.27-400t-57.317-138.953Q561.635-596.27 480-596.27t-138.953 57.317Q283.73-481.635 283.73-400t57.317 138.953Q398.365-203.73 480-203.73Z"/>
	</svg>
)

export const OverlineRichTextButton = ( { isActive, onChange, value } ) =>
{
	return (
		<RichTextToolbarButton
			icon={ overlineIcon }
			title={ __( 'Overline', 'x3p0-ideas' ) }
			isActive={ isActive }
			onClick={ () => onChange(
				toggleFormat( value, {
					type: 'x3p0/overline'
				} )
			) }
		/>
	);
};
