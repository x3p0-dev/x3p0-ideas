/**
 * List marker component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import { markerIcon } from '../../common/utils-icon';
import { UL_MARKERS, OL_MARKERS } from './constants';

import {
	getMarkerFromClassName,
	isOrderedMarker,
	isUnorderedMarker,
	updateMarkerClass
} from './utils';

// WordPress dependencies.
import { __ } from '@wordpress/i18n';
import { useEffect, useMemo } from '@wordpress/element';

import {
	Dropdown,
	FlexItem,
	MenuGroup,
	MenuItem,
	ToolbarButton
} from '@wordpress/components';

// Define a default option for the select control.
const DEFAULT_OPTION = {
	value: '',
	label: __( 'Default', 'x3p0-ideas' )
};

/**
 * @description Creates a list marker dropdown control.
 * @example
 * <MarkerDropdownControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * />
 */
export default ( { attributes: { className, ordered }, setAttributes } ) => {
	// Get the marker and only update it when `className` changes.
	const marker = useMemo(
		() => getMarkerFromClassName( className ),
		[ className ]
	);

	// Gets the marker options based on the list element.
	const options = useMemo(
		() => ordered
			? [ DEFAULT_OPTION, ...OL_MARKERS ]
			: [ DEFAULT_OPTION, ...UL_MARKERS ],
		[ ordered ]
	);

	// Resets the marker class if the list element changes.
	useEffect( () => {
		if (
			marker &&
			( ordered && ! isOrderedMarker( marker ) ) ||
			( ! ordered && ! isUnorderedMarker( marker ) )
		) {
			setAttributes( {
				className: updateMarkerClass( className, '', marker )
			} );
		}
	}, [ ordered ] );

	const markerButtonContent = ( option, index ) => {
		const slug = option.value ? option.value : 'default';

		return (
			<FlexItem
				key={ `x3p0-marker-name-${ index }` }
				className="x3p0-list-marker-selector__content"
			>
				<ul className={
					`x3p0-list-marker-selector__list has-marker-${ slug }`
				}>
					<li>{ option.label }</li>
				</ul>
			</FlexItem>
	) };

	const markerButton = ( option, index ) => (
		<MenuItem
			key={ index }
			role="menuitemradio"
			className="x3p0-list-marker-selector__button"
			isSelected={ marker === option.value }
			isPressed={ marker === option.value }
			onClick={ () => setAttributes( {
				className: updateMarkerClass(
					className,
					option.value,
					marker
				)
			} ) }
		>
			{ markerButtonContent( option, index ) }
		</MenuItem>
	);

	const markerControls = (
		<MenuGroup
			className="x3p0-list-marker-selector"
			label={ __( 'Select a list marker', 'x3p0-ideas' ) }
		>
			{ options.map(
				( option, index ) => markerButton( option, index )
			) }
		</MenuGroup>
	);

	return (
		<Dropdown
			className="x3p0-list-marker-dropdown"
			contentClassName="x3p0-list-marker-popover"
			popoverProps={ { placement: 'bottom-start' } }
			renderToggle={ ( { isOpen, onToggle } ) => (
				<ToolbarButton
					className="x3p0-list-marker__button"
					icon={ markerIcon }
					label={ __( 'List Marker', 'x3p0-ideas' ) }
					onClick={ onToggle }
					aria-expanded={ isOpen }
					isPressed={ !! marker }
				/>
			) }
			renderContent={ () => markerControls }
		/>
	);
};
