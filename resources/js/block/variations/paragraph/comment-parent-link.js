/**
 * Comment parent link variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { comment } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

registerBlockVariation('core/paragraph', {
	name:       'x3p0/paragraph-comment-parent-link',
	title:      __('Comment Parent Link', 'x3p0-ideas'),
	description: __('Displays a link to the comment parent.', 'x3p0-ideas'),
	category:   'widgets',
	keywords:   [ 'comment', 'parent' ],
	icon:       comment,
	scope:      [], // For internal use, so leave scope empty.
	ancestor:   'core/comment-template',
	attributes: {
		metadata: {
			bindings: {
				content: {
					source: 'x3p0/comment',
					args: {
						key: 'parentLink'
					}
				}
			}
		},
		placeholder: __('In reply to Comment Author', 'x3p0-ideas')
	},
	isActive: [
		'metadata.bindings.content.source',
		'metadata.bindings.content.args.key'
	]
});
