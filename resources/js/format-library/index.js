/**
 * Registers the RichText format types
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.
import formatTypes from './format-types';

// WordPress dependencies.
import { registerFormatType } from '@wordpress/rich-text';

// Register each `RichText` format type.
formatTypes.forEach( ( { name, ...settings } ) =>
	registerFormatType( name, settings )
);
