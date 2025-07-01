/**
 * Color scheme toggle view on the front end using the Interactivity API.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { store } from '@wordpress/interactivity';

const { state } = store('toggle-color-scheme', {
	state: {},
	actions: {
		toggleMode() {
			state.darkMode = ! state.darkMode;

			// Save preference to a cookie.
			document.cookie = `color-scheme=${
				state.darkMode ? 'dark' : 'light'
			};path=/`;
		}
	},
	callbacks: {
		updateColorScheme() {
			// Dark mode is undefined if there is no cookie.
			if ('undefined' === typeof state.darkMode) {
				return;
			}

			const root = document.querySelector(':root');

			root.style.setProperty(
				'color-scheme',
				state.darkMode ? 'dark' : 'light'
			);
		},
		initToggle() {
			if ('light dark' !== state.colorScheme) {
				state.darkMode = 'dark' === state.colorScheme;
				return;
			}

			state.darkMode =
				window.matchMedia
				&& window.matchMedia('(prefers-color-scheme: dark)').matches;
		}
	},
});
