/**
 * Registers block edit filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import withGradientBackground from './gradient-background';
import withListMarker         from './list-marker';

// WordPress dependencies.
import { addFilter } from '@wordpress/hooks';

// Add filters.
addFilter('editor.BlockEdit', 'x3p0-ideas-gradient-background', withGradientBackground);
addFilter('editor.BlockEdit', 'x3p0-ideas-list-marker',         withListMarker);
