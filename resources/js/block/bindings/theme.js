/**
 * Defines the `x3p0/theme` block binding source.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockBindingsSource } from '@wordpress/blocks';
import { __, sprintf } from '@wordpress/i18n';
import { store as coreDataStore } from '@wordpress/core-data';

registerBlockBindingsSource({
	name: 'x3p0/theme',
	label: __('Theme Data', 'x3p0-ideas'),
	getValues({ select, bindings }) {
		const theme = select(coreDataStore).getCurrentTheme();

		const placeholders = {
			helloDolly:      __('🎺 🎶...', 'x3p0-ideas'),
			link:            `<a href="${theme.theme_uri.rendered}" class="theme-name theme-name--link">${theme.name.rendered}</a>`,
			name:            theme.name.rendered,
			paginationLabel: sprintf(__('Page %1$s / %2$s:', 'x3p0-ideas'), 3, 7),
			url:             theme.theme_uri.rendered,
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
