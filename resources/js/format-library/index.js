/**
 * Registers RichText format types.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// WordPress dependencies.
import domReady from '@wordpress/dom-ready';
import { unregisterFormatType } from '@wordpress/rich-text';

// Register format types.
import "./abbreviation";
import "./big";
import "./cite";
import "./delete";
import "./insert";
import "./mark";
import "./overline";
import "./samp";
import "./small";
import "./span";

// Unregisters the Core highlight format type. It doesn't use a semantic
// background color and, therefore, doesn't translate between style variations.
// Instead, use the Mark format type (labeled Highlight) registered separately.
// It uses the semantic `<mark>` tag but leaves the styling in control of the
// theme or style variation.
domReady(() => {
	unregisterFormatType('core/text-color');
});
