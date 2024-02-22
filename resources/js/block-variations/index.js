/**
 * Registers block variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import grid            from './grid';
//import paginationLabel from './pagination-label';
import siteCopyright   from './site-copyright';

// WordPress dependencies.
import domReady from '@wordpress/dom-ready';
import { getBlockVariations, registerBlockVariation } from '@wordpress/blocks';

// Register each block variation.
//registerBlockVariation(paginationLabel.block, paginationLabel.variation);
registerBlockVariation(siteCopyright.block, siteCopyright.variation);

// `getBlockVariations()` returns `undefined` unless we wait until the DOM is
// ready. We need this to conditionally register variations.
domReady(() => {
	const variations = getBlockVariations('core/group');

	if (! variations.some(variation => 'group-grid' === variation.name)) {
		registerBlockVariation(grid.block, grid.variation);
	}
});
