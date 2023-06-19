/**
 * List marker component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
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
export const MarkerDropdownControl = ( {
	attributes: {
		className,
		ordered
	},
	setAttributes
} ) => {
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

	const markerControls = options.map( ( option, index ) => {
		const value = option.value ?? 'default';

		const item = (
			<FlexItem
				key={ `x3p0-marker-name-${ index }` }
				className="x3p0-marker-name"
			>
				<ul className='x3p0-list-marker-list'>
					<li className={ `x3p0-marker-${ value }` }>
						{ option.label }
					</li>
				</ul>
			</FlexItem>
		);

		return (
			<MenuItem
				key={ index }
				role="menuitemradio"
				isSelected={ marker === value }
				isPressed={ marker === value }
				className={ `x3p0-color-markers-button-${ value }` }
				onClick={ () => setAttributes( {
					className: updateMarkerClass(
						className,
						option.value,
						marker
					)
				} ) }
			>
				{ item }
			</MenuItem>
		)
	} );

	return (
		<Dropdown
			className="x3p0-list-markers-dropdown"
			contentClassName="x3p0-list-markers-dropdown-content"
			popoverProps={ { placement: 'bottom-start' } }
			renderToggle={ ( { isOpen, onToggle } ) => (
				<ToolbarButton
					icon={ markerIcon }
					label={ __( 'List Marker', 'x3p0-ideas' ) }
					onClick={ onToggle }
					aria-expanded={ isOpen }
					isPressed={ !! marker }
				/>
			) }
			renderContent={ () => (
				<MenuGroup
					className="x3p0-list-markers-menu-group"
					label={ __( 'Select a list marker', 'x3p0-ideas' ) }
				>
					{ markerControls }
				</MenuGroup>
			) }
		/>
	);
};
