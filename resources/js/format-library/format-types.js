/**
 * Exports the RichText format types.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

import { abbreviationFormat } from "./abbreviation";
import { deleteFormat }       from "./delete";
import { insertFormat }       from "./insert";
import { markFormat }         from "./mark";
import { overlineFormat }     from "./overline";

export default [
	abbreviationFormat,
	deleteFormat,
	insertFormat,
	markFormat,
	overlineFormat
];
