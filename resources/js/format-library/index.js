/**
 * Registers the RichText format types
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import abbreviationFormat from "./abbreviation";
import bigFormat          from "./big";
import citeFormat         from "./cite";
import deleteFormat       from "./delete";
import insertFormat       from "./insert";
import markFormat         from "./mark";
import overlineFormat     from "./overline";
import smallFormat        from "./small";
import spanFormat         from "./span";

// WordPress dependencies.
import domReady from '@wordpress/dom-ready';
import { registerFormatType, unregisterFormatType } from '@wordpress/rich-text';

// Register each `RichText` format type.
registerFormatType(abbreviationFormat.name, abbreviationFormat);
registerFormatType(bigFormat.name, bigFormat);
registerFormatType(citeFormat.name, citeFormat);
registerFormatType(deleteFormat.name, deleteFormat);
registerFormatType(insertFormat.name, insertFormat);
registerFormatType(markFormat.name, markFormat);
registerFormatType(overlineFormat.name, overlineFormat);
registerFormatType(smallFormat.name, smallFormat);
registerFormatType(spanFormat.name, spanFormat);

// Unregisters the Core highlight format type. It doesn't use a semantic
// background color and, therefore, doesn't translate between style variations.
// Instead, use the Mark format type (labeled Highlight) registered separately.
// It uses the semantic `<mark>` tag but leave the styling in control of the
// theme or style variation.
domReady(() => {
	unregisterFormatType('core/text-color');
});
