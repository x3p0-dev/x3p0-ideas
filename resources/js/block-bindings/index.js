/**
 * Registers block bindings with the editor.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockBindingsSource } from '@wordpress/blocks';

// Import block binding sources.
import comment from './comment';
import media   from './media';
import post    from './post';
import site    from './site';
import theme   from './theme';

// Register block binding sources.
registerBlockBindingsSource(comment);
registerBlockBindingsSource(media);
registerBlockBindingsSource(post);
registerBlockBindingsSource(site);
registerBlockBindingsSource(theme);
