/**
 * Registers block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import { BLOCK_STYLES } from './const';

// WordPress dependencies.
import domReady from '@wordpress/dom-ready';

import {
	registerBlockStyle,
	unregisterBlockStyle
} from '@wordpress/blocks';

// Registers the block style variations when the DOM is ready.
domReady( () => {
	// Remove core block styles.
	unregisterBlockStyle( 'core/separator', 'dots' );

	// Loop through each of the blocks to get its style variations. Then,
	// loop through the variations and register them.
	Object.keys( BLOCK_STYLES ).forEach( ( block ) =>
		Object.keys( BLOCK_STYLES[ block ] ).forEach( ( name ) =>
			registerBlockStyle( block, {
				name,
				label: BLOCK_STYLES[ block ][ name ]
			} )
		)
	);
} );
