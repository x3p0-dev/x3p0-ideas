/**
 * Site Copyright variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { brush } from "@wordpress/icons";
import { __ } from '@wordpress/i18n';

registerBlockVariation('core/paragraph', {
	name:       'x3p0/paragraph-theme-link',
	title:      __('Theme Link', 'x3p0-ideas'),
	description: __("Displays a link to the active theme's homepage.", 'x3p0-ideas'),
	category:   'widgets',
	keywords:   [ 'theme', 'link' ],
	icon:       brush,
	scope:      [ 'inserter' ],
	attributes: {
		metadata: {
			bindings: {
				content: {
					source: 'x3p0/theme',
					args: {
						key: 'link'
					}
				}
			}
		}
	},
	isActive: [
		'metadata.bindings.content.source',
		'metadata.bindings.content.args.key'
	]
});
