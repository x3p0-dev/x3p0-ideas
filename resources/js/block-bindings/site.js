/**
 * Defines the `x3p0/site` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { __, sprintf } from '@wordpress/i18n';

export default {
	name: 'x3p0/site',
	label: __('Site Data', 'x3p0-ideas'),
	getValues({ select, bindings }) {
		const currentYear  = new Date().getFullYear();

		const placeholders = {
			// Translators: %s is the current year.
			copyright: sprintf(__('Copyright &copy; %s', 'x3p0-ideas'), currentYear),
			year: `${currentYear}` // Note: this must be a string.
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
