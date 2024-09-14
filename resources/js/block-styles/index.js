/**
 * Registers block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { unregisterBlockStyle } from '@wordpress/blocks';
import domReady from '@wordpress/dom-ready';

// Unregisters block style variations when the DOM is ready. Note that styles
// registered via JS must also be unregistered via JS.
domReady(() => {
	// Remove core block styles.
	unregisterBlockStyle('core/separator', 'dots');
	unregisterBlockStyle('core/social-links', 'pill-shape');
	unregisterBlockStyle('core/tag-cloud', 'outline');
});
