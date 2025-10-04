/**
 * Registers block list block filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import postTimeToRead from './post-time-to-read';

// WordPress dependencies.
import {addFilter} from "@wordpress/hooks";

// Add filters.
addFilter('editor.BlockListBlock', 'x3p0-ideas-post-time-to-read', postTimeToRead);
