/**
 * The hooks file houses custom React hooks for use with the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// WordPress dependencies.
import { useMemo } from '@wordpress/element';

import {
	__experimentalUseMultipleOriginColorsAndGradients as useMultipleOriginColorsAndGradients
} from '@wordpress/block-editor';

/**
 * React hook that returns an object containing separated arrays
 * of gradients by theme and core.
 * @returns {object}
 */
export const useGradients = () => {

	const colorGradientSettings = useMultipleOriginColorsAndGradients();

	const gradients = useMemo(() =>
		colorGradientSettings.gradients.map(
			(palette) =>
			[ ...(palette.gradients || []) ]
		).flat()
	);

	return {
		gradientOptions: colorGradientSettings.gradients,
		gradients:       gradients
	};
};
