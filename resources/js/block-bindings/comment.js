/**
 * Defines the `x3p0/comment` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { __ } from '@wordpress/i18n';

export default {
	name: 'x3p0/comment',
	label: __('Comment Data', 'x3p0-ideas'),
	getValues({ bindings }) {
		// Define placeholders to show for the bound block's content.
		// Some of these we can dynamically generate later. Some are
		// static, so we can just use a custom string.
		const placeholders = {
			parentLink: __('In reply to Comment Author', 'x3p0-ideas')
		};

		const values = {};

		for (const [ attributeName, source ] of Object.entries(bindings)) {
			const bindingKey = source.args?.key || attributeName;

			values[attributeName] = placeholders?.[bindingKey] || bindingKey;
		}

		return values;
	},
	canUserEditValue: () => false
};
