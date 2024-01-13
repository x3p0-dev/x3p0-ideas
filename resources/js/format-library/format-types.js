/**
 * Exports the RichText format types.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import abbreviationFormat from "./abbreviation";
import deleteFormat       from "./delete";
import insertFormat       from "./insert";
import markFormat         from "./mark";
import overlineFormat     from "./overline";

/**
 * @description Array of RichText format type objects.
 * @type {array}
 */
export default [
	abbreviationFormat,
	deleteFormat,
	insertFormat,
	markFormat,
	overlineFormat
];
