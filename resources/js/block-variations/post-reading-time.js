/**
 * Reading Time variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { timerIcon } from '../common/utils-icon';
import { __, sprintf } from '@wordpress/i18n';

export default {
	block: 'core/paragraph',
	variation: {
		name:       'x3p0/post-reading-time',
		title:      __('Reading Time', 'x3p0-ideas'),
		description: __('Displays the estimated time to read the post.', 'x3p0-ideas'),
		category:   'theme',
		keywords:   [ 'time', 'read', 'reading' ],
		icon:       timerIcon,
		scope:      [ 'inserter' ],
		attributes: {
			metadata: {
				bindings: {
					content: {
						source: 'x3p0/post',
						args: {
							key: 'readingTime'
						}
					}
				}
			},
			placeholder: __('Reading Time', 'x3p0-ideas')
		},
		example: {},
		isActive: [
			'metadata.bindings.content.source',
			'metadata.bindings.content.args.key'
		]
	}
};