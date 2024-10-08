/**
 * Defines the `x3p0/theme` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { __, sprintf } from '@wordpress/i18n';

export default {
	name: 'x3p0/theme',
	label: __('Theme Data', 'x3p0-ideas'),
	getValues({ bindings }) {
		// Define placeholders to show for the bound block's content.
		// Some of these we can dynamically generate later. Some are
		// static, so we can just use a custom string.
		const placeholders = {
			helloDolly:      __('🎺 🎶...', 'x3p0-ideas'),
			name:            __('Theme Name', 'x3p0-ideas'),
			paginationLabel: sprintf(__('Page %1$s / %2$s:', 'x3p0-ideas'), 3, 7),
			superpower:      __('Powered by ❤️ and soul.', 'x3p0-ideas')
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
