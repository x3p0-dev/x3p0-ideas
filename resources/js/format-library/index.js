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

// WordPress dependencies.
import { registerFormatType } from '@wordpress/rich-text';

// Register each `RichText` format type.
registerFormatType(abbreviationFormat.name, abbreviationFormat);
registerFormatType(bigFormat.name, bigFormat);
registerFormatType(citeFormat.name, citeFormat);
registerFormatType(deleteFormat.name, deleteFormat);
registerFormatType(insertFormat.name, insertFormat);
registerFormatType(markFormat.name, markFormat);
registerFormatType(overlineFormat.name, overlineFormat);
registerFormatType(smallFormat.name, smallFormat);
