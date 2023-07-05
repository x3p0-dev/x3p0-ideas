/**
 * The hooks file houses custom React hooks for use with the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

import { getIcons } from './utils';

// WordPress dependencies.
import { useMemo } from '@wordpress/element';

/**
 * @description React hook that returns an object containing separated arrays
 * of gradients by theme and core.
 * @returns {object}
 */
export const useIcons = () => {

	const icons = useMemo( () =>getIcons() );

	return icons;
};
