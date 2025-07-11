/**
 * Color scheme toggle view on the front end using the Interactivity API.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { store } from '@wordpress/interactivity';

const SWITCHABLE_SCHEMES = [
	'light dark',
	'dark light'
];

// Get the module data for the script module, which is set via a PHP filter.
const dataElement = document.getElementById('wp-script-module-data-x3p0-ideas-color-scheme');
const data        = dataElement ? JSON.parse(dataElement.textContent) : {};

const { state } = store(data.store, {
	state: {
		/**
		 * Determines whether the current user is logged in.
		 *
		 * @returns {boolean}
		 */
		get isLoggedIn() {
			return 0 < state.userID;
		}
	},
	actions: {
		/**
		 * Toggles the color scheme when a user interaction triggers it,
		 * such as a button click. This sets a cookie to persist the
		 * color scheme.
		 *
		 * @return {void}
		 */
		toggle() {
			state.isDark      = ! state.isDark;
			state.colorScheme = state.isDark ? 'dark' : 'light';

			// If the user is logged in, get the value from their
			// user meta instead of a cookie.
			if (state.isLoggedIn) {
				wp.apiFetch( {
					path: `/wp/v2/users/${state.userID}`,
					method: 'POST',
					data: {
						meta: {
							[data.store]: state.colorScheme
						}
					}
				});
				return;
			}

			// Define the cookie path and domain.
			let path   = data.cookiePath || '/';
			let domain = data.cookieDomain ? "; domain=" + data.cookieDomain : '';

			// Save preference to a cookie.
			document.cookie = `${data.store}=${state.colorScheme};path=${path}${domain}`;
		}
	},
	callbacks: {
		/**
		 * Callback for use when initializing the element. If the color
		 * scheme is switchable, we determine whether the user prefers
		 * a light or dark mode and set the `isDark` state to that
		 * preference.
		 *
		 * @return {void}
		 */
		init() {
			// Bail early if the color scheme is not switchable.
			if (! SWITCHABLE_SCHEMES.includes(state.colorScheme)) {
				return;
			}

			state.isDark =
				window.matchMedia
				&& window.matchMedia('(prefers-color-scheme: dark)').matches;
		},
		/**
		 * Updates the root element's color scheme CSS property when the
		 * dark mode state changes.
		 *
		 * @return {void}
		 */
		updateScheme() {
			document.documentElement.style.setProperty(
				'color-scheme',
				state.colorScheme
			);
		}
	}
});
