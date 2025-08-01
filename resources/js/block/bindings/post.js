/**
 * Defines the `x3p0/post` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockBindingsSource } from '@wordpress/blocks';
import { __, sprintf } from '@wordpress/i18n';

registerBlockBindingsSource({
	name: 'x3p0/post',
	label: __('Post Data', 'x3p0-ideas'),
	getValues({ bindings }) {
		// Define placeholders to show for the bound block's content.
		// Some of these we can dynamically generate later. Some are
		// static, so we can just use a custom string.
		const placeholders = {
			readingTime: sprintf(__('%d Minutes', 'x3p0-ideas'), 0)
		};

		const values = {};

		for (const [ attributeName, source ] of Object.entries(bindings)) {
			const bindingKey = source.args?.key || attributeName;

			values[attributeName] = placeholders?.[bindingKey] || bindingKey;
		}

		return values;
	},
	canUserEditValue: () => false
});
