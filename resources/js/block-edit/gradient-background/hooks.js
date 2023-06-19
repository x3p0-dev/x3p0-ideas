/**
 * The hooks file houses custom React hooks for use with the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { SUPPORTED_GRADIENTS } from './constants';

// WordPress dependencies.
import { useMemo }    from '@wordpress/element';
import { useSetting } from '@wordpress/block-editor';

/**
 * @description React hook that returns an object containing separated arrays
 * of gradients by theme and core.
 * @returns {object}
 */
export const useGradients = () => {
	// Get gradient presets.
	let themeGradients   = useSetting( 'color.gradients.theme'   );
	let defaultGradients = useSetting( 'color.gradients.default' );

	// Flattened array with all gradient palettes.
	const gradients = useMemo( () => {

		if ( themeGradients ) {
			themeGradients.forEach( ( gradient, index ) => {
				if ( ! SUPPORTED_GRADIENTS.includes( gradient.slug ) ) {
					themeGradients.splice( index, 1 );
				}
			} );
		}

		if ( defaultGradients ) {
			defaultGradients.forEach( ( gradient, index ) => {
				if ( ! SUPPORTED_GRADIENTS.includes( gradient.slug ) ) {
					defaultGradients.splice( index, 1 );
				}
			} );
		}

		return [
			...( defaultGradients || [] ),
			...( themeGradients   || [] )
		];
	} );

	return {
		gradients: gradients,
		theme:     themeGradients,
		default:   defaultGradients
	};
};
