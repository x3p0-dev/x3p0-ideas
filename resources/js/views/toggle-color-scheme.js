/**
 * Color scheme toggle view on the front end using the Interactivity API.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { store } from '@wordpress/interactivity';

const { state } = store('x3p0-ideas-color-scheme', {
	actions: {
		/**
		 * Toggles the color scheme when a user interaction triggers it,
		 * such as a button click. This sets a cookie to persist the
		 * color scheme.
		 *
		 * @return {void}
		 */
		toggle() {
			state.isDark = ! state.isDark;

			// Save preference to a cookie.
			document.cookie = `x3p0-ideas-color-scheme=${
				state.isDark ? 'dark' : 'light'
			};path=/`;
		}
	},
	callbacks: {
		/**
		 * Callback for use when initializing the element. If a color
		 * scheme is defined, the function will use it to determine
		 * whether we are in dark mode. Otherwise, we capture the user's
		 * preference via `prefers-color-scheme`.
		 *
		 * @return {void}
		 */
		init() {
			if ('light dark' !== state.colorScheme) {
				state.isDark = 'dark' === state.colorScheme;
				return;
			}

			state.isDark =
				window.matchMedia
				&& window.matchMedia('(prefers-color-scheme: dark)').matches;
		},
		/**
		 * Updates the root element's color scheme CSS property when the
		 * dark mode state changes. If the dark mode is not yet defined
		 * (the case when no cookie has been set), bail early.
		 *
		 * @return {void}
		 */
		updateScheme() {
			if ('undefined' === typeof state.isDark) {
				return;
			}

			document.documentElement.style.setProperty(
				'color-scheme',
				state.isDark ? 'dark' : 'light'
			);
		}
	}
});
