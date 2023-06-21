/**
 * Separator icon component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import {
	getIcons,
	getIconFromClassName,
	updateIconClass
} from './utils';

// WordPress dependencies.
import { __ } from '@wordpress/i18n';
import { starFilled } from '@wordpress/icons';

import {
	BaseControl,
	Button,
	Dropdown,
	ToolbarButton,
	__experimentalGrid as Grid
} from '@wordpress/components';

/**
 * @description Creates a separator icon control.
 * @example
 * <SeparatorIconControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
export default ( { attributes: { className }, setAttributes } ) => {
	// Get the icons.
	const icons = getIcons();

	// Get the current icon.
	const currentIcon = getIconFromClassName( className );

	// Update the icon class and gradient.
	const onIconButtonClick = ( icon ) => setAttributes( {
		className: updateIconClass(
			className,
			currentIcon === icon.value ? '' : icon.value,
			currentIcon
		),
		gradient: currentIcon === icon.value || ! icon?.gradient
			? undefined
			: icon?.gradient
	} );

	// Builds a menu item for an icon.
	const iconButton = ( icon, index ) => (
		<Button
			key={ index }
			isPressed={ currentIcon === icon.value }
			className="x3p0-sep-icons-picker__button"
			onClick={ () => onIconButtonClick( icon ) }
		>
			{ icon.label ?? icon.value }
		</Button>
	);

	// Builds an icon picker in a 6-column grid.
	const iconPicker = (
		<BaseControl
			className="x3p0-sep-icons-picker"
			label={ __( 'Icons', 'x3p0-ideas' ) }
		>
			<div className="x3p0-sep-icons-picker__description">
				{ __( 'Pick an icon to super-charge your separator. Need more icons?', 'x3p0-ideas' ) + ' ' }
				<a href="#" target="_blank">{ __( 'Learn how to add your own →', 'x3p0-ideas' ) }</a>
			</div>
			<Grid className="x3p0-sep-icons-picker__grid" columns="6">
				{ icons.map( ( icon, index ) =>
					iconButton( icon, index )
				) }
			</Grid>
		</BaseControl>
	);

	// Returns the dropdown menu item.
	return (
		<Dropdown
			className="x3p0-sep-icons-dropdown"
			contentClassName="x3p0-sep-icons-popover"
			popoverProps={ {
				headerTitle: __( 'Separator Icons', 'x3p0-ideas' ),
				variant: 'toolbar'
			} }
			renderToggle={ ( { isOpen, onToggle } ) => (
				<ToolbarButton
					className="x3p0-sep-icons-dropdown__button"
					icon={ starFilled }
					label={ __( 'Separator Icon', 'x3p0-ideas' ) }
					onClick={ onToggle }
					aria-expanded={ isOpen }
					isPressed={ !! currentIcon }
				/>
			) }
			renderContent={ () => iconPicker }
		/>
	);
};
