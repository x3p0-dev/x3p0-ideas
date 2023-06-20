/**
 * Color variation picker component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { useVariationColors } from './hooks';

import {
	COLOR_SHADES,
	VARIATIONS
} from './constants';

import {
	getVariationFromClassName,
	updateVariationClass
} from './utils';

// WordPress dependencies.
import { __ } from '@wordpress/i18n';
import { color as icon } from '@wordpress/icons';

import {
	ColorIndicator,
	Dropdown,
	Flex,
	FlexItem,
	MenuGroup,
	MenuItem,
	ToolbarButton,
	__experimentalDivider as Divider,
	__experimentalHStack as HStack,
	__experimentalZStack as ZStack
} from '@wordpress/components';

/**
 * @description Dropdown menu item for a color variation selector.
 * @example
 * <ColorVariationControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * />
 */
export default ( { attributes: { className }, setAttributes } ) => {
	// Get the variation colors.
	const variationColors = useVariationColors();

	// Get the current variation.
	const currentVariation = getVariationFromClassName( className );

	// Filter out shades that are not set for the variation. Then, map the
	// resulting array of colors to the color indicator components.
	const variationColorIndicators = ( variation ) => {
		return COLOR_SHADES.filter( ( shade ) =>
			variationColors[ variation ][ shade ]
			? true
			: false
		).map( ( shade, index ) => (
			<Flex key={ index }>
				<ColorIndicator colorValue={
					variationColors[ variation ][ shade ]
				}/>
			</Flex>
		) );
	};

	// Builds a menu item for a variation.
	const variationMenuItem = ( variation, index ) => {
		const colorIndicators = variationColorIndicators( variation );

		const value = 'default' === variation ? '' : variation;

		return (
			<MenuItem
				key={ index }
				role="menuitemradio"
				isSelected={ currentVariation === value }
				isPressed={ currentVariation === value }
				className={ `x3p0-color-variations-button-${ variation }` }
				onClick={ () => setAttributes( {
					className: updateVariationClass(
						className,
						value,
						currentVariation
					)
				} ) }
			>
				<HStack>
					<ZStack
						key={ `x3p0-color-indicators-${ index }` }
						offset={ -8 }
						isLayered={ false }
					>
						{ colorIndicators }
					</ZStack>
					<FlexItem key={ `x3p0-color-name-${ index }` }>
						{ VARIATIONS[ variation ] }
					</FlexItem>
				</HStack>
			</MenuItem>
		);
	};

	// Create array of variation controls.
	const variationControls = Object.keys( VARIATIONS ).map(
		( variation, index ) =>
		variationMenuItem( variation, `primary-${ index }` )
	);

	return (
		<Dropdown
			className="x3p0-color-variations-dropdown"
			contentClassName="x3p0-color-variations-dropdown-content"
			popoverProps={ { placement: 'bottom-start' } }
			renderToggle={ ( { isOpen, onToggle } ) => (
				<ToolbarButton
					icon={ icon }
					label={ __( 'Color Variation', 'x3p0-ideas' ) }
					onClick={ onToggle }
					aria-expanded={ isOpen }
					isPressed={ !! currentVariation }
				/>
			) }
			renderContent={ () => (
				<MenuGroup
					className="x3p0-color-variations-menu-group"
					label={ __( 'Select a color variation', 'x3p0-ideas' ) }
				>
					{ variationControls }
				</MenuGroup>
			) }
		/>
	);
};
