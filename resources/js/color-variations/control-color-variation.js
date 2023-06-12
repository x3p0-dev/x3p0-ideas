// Internal imports.
import { paintbrushIcon     } from '../common/utils-icon';
import { useVariationColors } from './hooks';

import {
	COLOR_SHADES,
	PRIMARY_VARIATIONS,
	SECONDARY_VARIATIONS,
	VARIATIONS
} from './constants';

import {
	getVariationFromClassName,
	updateVariationClass
} from './utils';

// WordPress imports.
import { __ } from '@wordpress/i18n';

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

export const ColorVariationControl = ( {
	attributes: { className },
	setAttributes
} ) => {
	// Get the variation colors.
	const variationColors = useVariationColors();

	// Get the current variation.
	const currentVariation = getVariationFromClassName( className );

	// Builds the color indicators for an individual variation.
	const variationColorIndicators = ( variation ) => {

		// Filter out shades that are not set for the variation before
		// creating the indicator.
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

		return (
			<MenuItem
				key={ index }
				role="menuitemradio"
				isSelected={ currentVariation === variation }
				isPressed={ currentVariation === variation }
				className={ `x3p0-color-variations-button-${variation}` }
				onClick={ () => setAttributes( {
					className: updateVariationClass(
						className,
						currentVariation,
						variation
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

	// Create separate arrays of the variation controls. We're doing this so
	// that we can split the primary and secondary sections with a divider.
	// Wasn't sure of a cleaner way to do that with a single array.
	const primaryControls = Object.keys( PRIMARY_VARIATIONS ).map( ( variation, index ) => {
		return variationMenuItem( variation, `primary-${ index }` );
	} );

	const secondaryControls = Object.keys( SECONDARY_VARIATIONS ).map( ( variation, index ) => {
		return variationMenuItem( variation, `secondary-${ index }` );
	} );

	return (
		<Dropdown
			className="x3p0-color-variations-dropdown"
			contentClassName="x3p0-color-variations-dropdown-content"
			popoverProps={ { placement: 'bottom-start' } }
			renderToggle={ ( { isOpen, onToggle } ) => (
				<ToolbarButton
					icon={ paintbrushIcon }
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
					{ primaryControls }
					<Divider key="divider" marginStart="2" />
					{ secondaryControls }
				</MenuGroup>
			) }
		/>
	);
};
