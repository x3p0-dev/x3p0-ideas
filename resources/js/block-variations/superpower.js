/**
 * Site Copyright variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { bolt } from '../common/utils-icon';
import { __ } from '@wordpress/i18n';

export default {
	block: 'core/paragraph',
	variation: {
		name:       'x3p0/superpower',
		title:      __('Superpower', 'x3p0-ideas'),
		description: __('Displays a random "powered by" message on your site.', 'x3p0-ideas'),
		category:   'widgets',
		keywords:   [ 'superpower', 'footer' ],
		icon:       bolt,
		scope:      [ 'inserter' ],
		attributes: {
			metadata: {
				bindings: {
					content: {
						source: 'x3p0/theme',
						args: {
							key: 'superpower'
						}
					}
				}
			},
			content: __('Powered by WordPress, crazy ideas, and passion.', 'x3p0-ideas')
		},
		isActive: [
			'metadata.bindings.content.source',
			'metadata.bindings.content.args.key'
		]
	}
};
