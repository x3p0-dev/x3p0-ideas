/**
 * Current year variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { calendar } from '@wordpress/icons';
import { __, sprintf } from '@wordpress/i18n';

export default {
	block: 'core/paragraph',
	variation: {
		name:       'x3p0/site-year',
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
	}
};
