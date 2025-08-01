/**
 * Current year variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { calendar } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

registerBlockVariation('core/paragraph', {
	name:       'x3p0/paragraph-site-year',
	title:      __('Current Year', 'x3p0-ideas'),
	description: __('Displays the current year.', 'x3p0-ideas'),
	category:   'widgets',
	keywords:   [ 'current', 'year' ],
	icon:       calendar,
	scope:      [ 'inserter' ],
	attributes: {
		metadata: {
			bindings: {
				content: {
					source: 'x3p0/site',
					args: {
						key: 'year'
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
