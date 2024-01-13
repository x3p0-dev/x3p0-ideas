/**
 * Registers block edit filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import filters from './filters';

// WordPress dependencies.
import { addFilter } from '@wordpress/hooks';

// Register each of the block edit filters.
Object.keys( filters ).forEach( ( filter ) =>
	addFilter( 'editor.BlockEdit', `x3p0/ideas/${ filter }`, filters[ filter ] )
);
