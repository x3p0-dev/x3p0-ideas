/**
 * Defines the `x3p0/superpower` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockBindingsSource } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

registerBlockBindingsSource({
	name: 'x3p0/superpower',
	label: __('Superpower', 'x3p0-ideas'),
	getValues({ bindings }) {
		const values = {};

		for (const [ attributeName ] of Object.entries(bindings)) {
			values[attributeName] = __('Powered by WordPress, crazy ideas, and passion.', 'x3p0-ideas');
		}

		return values;
	},
	canUserEditValue: () => false
});
