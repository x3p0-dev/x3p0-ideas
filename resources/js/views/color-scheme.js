/**
 * Color scheme toggle view on the front end using the Interactivity API.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { store } from '@wordpress/interactivity';

const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');

const { callbacks, state } = store('x3p0-ideas/color-scheme', {
	state: {
		/**
		 * Determines whether the current user is logged in.
		 *
		 * @returns {boolean}
		 */
		get isLoggedIn() {
			return 0 < state.userId;
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
					path: `/wp/v2/users/${state.userId}`,
					method: 'POST',
					data: {
						meta: {
							[state.name]: state.colorScheme
						}
					}
				});
				return;
			}

			// Define the cookie path and domain.
			let path   = state.cookiePath || '/';
			let domain = state.cookieDomain ? "; domain=" + state.cookieDomain : '';

			// Save preference to a cookie.
			document.cookie = `${state.name}=${state.colorScheme};path=${path}${domain}`;
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
			if (
				! state.hasOwnProperty('switchableSchemes')
				|| ! state.switchableSchemes.includes(state.colorScheme)
			) {
				return;
			}

			state.isDark = prefersDarkScheme.matches;
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

// Add an event listener for when the media query for color scheme preference
// changes. When this happens, reinitialize the color scheme. This is needed for
// cases where the user hasn't saved a preference with the site via cookie or
// metadata. This ensures that elements, such as buttons, that are tied to the
// state will be updated.
prefersDarkScheme.addEventListener('change', () => {
	callbacks.init();
});
