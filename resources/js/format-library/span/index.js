/**
 * Creates the span RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { tuneIcon } from '../../common/utils-icon';

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
 * Name of the format.
 * @type {string}
 */
const name = 'x3p0/span';

/**
 * RichText format type definition.
 * @type {object}
 */
const spanFormat = {
	name,
	title:     __('Custom', 'x3p0-ideas'),
	tagName:   'span',
	className: 'x3p0-span',
	edit:      Edit
};

/**
 * RichText format type definition.
 * @type {object}
 */
export default spanFormat;

/**
 * Creates the format type edit component.
 */
function Edit({ isActive, onChange, value, contentRef })
{
	const [ isPopoverVisible, setIsPopoverVisible ] = useState(false);

	const togglePopover = () => setIsPopoverVisible((state) => ! state);

	return (
		<>
			<RichTextToolbarButton
				icon={ tuneIcon }
				title={ __('Custom', 'x3p0-ideas') }
				isActive={ isActive }
				onClick={ () =>
					isActive
					? onChange(removeFormat(value, name))
					: togglePopover()
				}
			/>
			{ isPopoverVisible && (
				<SpanClassPopover
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
 * Creates the popover component.
 */
function SpanClassPopover({ value, contentRef, onChange, onClose })
{
	const popoverAnchor = useAnchor({
		editableContentElement: contentRef.current,
		settings: spanFormat,
	});

	const [ className, setClassName ] = useState('');

	const classTextControl = (
		<TextControl
			label={ __('Add CSS class(es)', 'x3p0-ideas') }
			value={ className }
			onChange={ (val) => setClassName(val) }
			help={
				__('Apply one or more custom CSS classes to the element.', 'x3p0-ideas')
			}
		/>
	);

	const popoverForm = (
		<form
			className="x3p0-format-span-popover__form"
			onSubmit={ (event) => {
				event.preventDefault();
				onChange(applyFormat(value, {
					type: name,
					attributes: {
						class: className.replace(/[^A-Za-z0-9_-]/g, '')
					}
				}));
				onClose();
			} }
		>
			{ classTextControl }
		</form>
	);

	return (
		<Popover
			className="x3p0-format-span-popover"
			anchor={ popoverAnchor }
			placement="top"
			onClose={ onClose }
			variant="toolbar"
		>
			{ popoverForm }
		</Popover>
	);
};
