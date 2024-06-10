/**
 * Site Copyright variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { copyrightIcon } from '../../common/utils-icon';
import { __, sprintf } from '@wordpress/i18n';

export default {
	block: 'core/paragraph',
	variation: {
		name:       'x3p0/site-copyright',
		title:      __('Site Copyright', 'x3p0-ideas'),
		description: __('Displays the site copyright date.', 'x3p0-ideas'),
		category:   'widgets',
		keywords:   [ 'copyright' ],
		icon:       copyrightIcon,
		scope:      [ 'inserter' ],
		attributes: {
			metadata: {
				bindings: {
					content: {
						source: 'x3p0/site',
						args: {
							key: 'copyright'
						}
					}
				}
			},
			content: sprintf(
				// Translators: %s is the copyright year.
				__('Copyright © %s', 'x3p0-ideas'),
				new Date().getFullYear()
			)
		},
		isActive: [
			'metadata.bindings.content.source',
			'metadata.bindings.content.args.key'
		]
	}
};
