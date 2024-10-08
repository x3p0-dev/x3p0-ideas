/**
 * Registers block bindings with the editor.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockBindingsSource } from '@wordpress/blocks';

// Import block binding sources.
import theme from './theme';

// Register block binding sources.
registerBlockBindingsSource(theme);
