/**
 * Creates the abbreviation RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { abbreviationIcon } from '../../common/utils-icon';

// WordPress dependencies.
import { RichTextToolbarButton } from '@wordpress/block-editor';
import { useState }              from '@wordpress/element';
import { __ }                    from '@wordpress/i18n';
import { Popover, TextControl }  from '@wordpress/components';

import {
	applyFormat,
	removeFormat,
	useAnchor
} from '@wordpress/rich-text';

/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/abbr';

/**
 * @description RichText format type definition.
 * @type {object}
 */
export const abbreviationFormat = {
	name,
	title:     __( 'Abbreviation', 'x3p0-ideas' ),
	tagName:   'abbr',
	className: null,
	edit:      Edit
};

/**
 * @description Creates the format type edit component.
 */
function Edit( { isActive, onChange, value, contentRef } )
{
	const [ isPopoverVisible, setIsPopoverVisible ] = useState( false );

	const togglePopover = () => setIsPopoverVisible( ( state ) => ! state );

	return (
		<>
			<RichTextToolbarButton
				icon={ abbreviationIcon }
				title={ __( 'Abbreviation', 'x3p0-ideas' ) }
				isActive={ isActive }
				onClick={ () =>
					isActive
					? onChange( removeFormat( value, name ) )
					: togglePopover()
				}
			/>
			{ isPopoverVisible && (
				<AbbrTitlePopover
					value={ value }
					onChange={ onChange }
					onClose={ togglePopover }
					contentRef={ contentRef }
				/>
			) }
		</>
	);
};

/**
 * @description Creates the popover component.
 */
function AbbrTitlePopover( { value, contentRef, onChange, onClose } )
{
	const popoverAnchor = useAnchor( {
		editableContentElement: contentRef.current,
		settings: abbreviationFormat,
	} );

	const [ title, setTitle ] = useState( '' );

	const titleTextControl = (
		<TextControl
			label={ __( 'Add title for abbreviation', 'x3p0-ideas' ) }
			value={ title }
			onChange={ ( val ) => setTitle( val ) }
			help={
				__( 'Expand on the definition for the abbreviation when a full description is not present in the content.', 'x3p0-ideas' )
			}
		/>
	);

	const popoverForm = (
		<form
			className="x3p0-rich-text-format-abbr__popover-form"
			onSubmit={ ( event ) => {
				event.preventDefault();
				onChange( applyFormat( value, {
					type: name,
					attributes: { title },
				} ) );
				onClose();
			} }
		>
			{ titleTextControl }
		</form>
	);

	return (
		<Popover
			className="x3p0-rich-text-format-abbr__popover"
			anchor={ popoverAnchor }
			placement="top"
			onClose={ onClose }
			variant="toolbar"
		>
			{ popoverForm }
		</Popover>
	);
};
