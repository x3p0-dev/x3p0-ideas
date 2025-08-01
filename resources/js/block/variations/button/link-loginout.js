/**
 * Creates a variation of the Button block for logging into or out of the site.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { login } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

registerBlockVariation('core/button', {
	name:       'x3p0/button-link-loginout',
	title:      __('Login/out Button', 'x3p0-ideas'),
	description: __('Displays a button for logging into or out of the site.', 'x3p0-ideas'),
	category:   'widgets',
	keywords:   [ 'login', 'logout' ],
	icon:       login,
	scope:      [ 'block', 'inserter' ],
	attributes: {
		metadata: {
			bindings: {
				text: {
					source: 'x3p0/site',
					args: {
						key: 'loginoutText'
					}
				},
				url: {
					source: 'x3p0/site',
					args: {
						key: 'loginoutUrl'
					}
				}
			}
		}
	},
	example: {},
	isActive: [
		'metadata.bindings.text.source',
		'metadata.bindings.text.args.key',
		'metadata.bindings.url.source',
		'metadata.bindings.url.args.key'
	]
});
