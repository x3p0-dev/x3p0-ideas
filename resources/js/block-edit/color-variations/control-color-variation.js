/**
 * Color variation picker component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { VARIATIONS }         from './constants';
import { useVariationColors } from './hooks';

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
	const indicators = ( variation ) => Object.values( variationColors[ variation ] ).map(
		( shade, index ) =>
		( <Flex key={ index }>
			<ColorIndicator colorValue={ shade }/>
		</Flex> )
	);

	// Builds a menu item for a variation.
	const variationMenuItem = ( variation, index ) => {
		const colorIndicators = indicators( variation );

		const value = 'default' === variation ? '' : variation;

		return (
			<MenuItem
				key={ index }
				role="menuitemradio"
				className="x3p0-color-var-picker__button"
				isSelected={ currentVariation === value }
				isPressed={ currentVariation === value }
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
						key={ `x3p0-color-var-indicator-${ index }` }
						offset={ -8 }
						isLayered={ false }
					>
						{ colorIndicators }
					</ZStack>
					<FlexItem key={ `x3p0-color-var-name-${ index }` }>
						{ VARIATIONS[ variation ] }
					</FlexItem>
				</HStack>
			</MenuItem>
		);
	};

	// Color variations menu group.
	const variationPicker =  (
		<MenuGroup
			className="x3p0-color-var-picker"
			label={ __( 'Select a color variation', 'x3p0-ideas' ) }
		>
			{ Object.keys( variationColors ).map(
				( variation, index ) =>
				variationMenuItem( variation, `primary-${ index }` )
			) }
		</MenuGroup>
	);

	return (
		<Dropdown
			className="x3p0-color-var-dropdown"
			contentClassName="x3p0-color-var-popover"
			popoverProps={ { placement: 'bottom-start' } }
			renderToggle={ ( { isOpen, onToggle } ) => (
				<ToolbarButton
					className="x3p0-color-var-dropdown__button"
					icon={ icon }
					label={ __( 'Color Variation', 'x3p0-ideas' ) }
					onClick={ onToggle }
					aria-expanded={ isOpen }
					isPressed={ !! currentVariation }
				/>
			) }
			renderContent={ () => variationPicker }
		/>
	);
};
