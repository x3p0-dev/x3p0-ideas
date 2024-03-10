/**
 * Comment parent link variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { comment } from '@wordpress/icons';
import { __ } from '@wordpress/i18n';

export default {
	block: 'core/paragraph',
	variation: {
		name:       'x3p0/comment-parent-link',
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
						source: 'x3p0/theme',
						args: {
							key: 'commentParentLink'
						}
					}
				}
			},
			placeholder: __('In reply to Comment Author', 'x3p0-ideas')
		},
		isActive: (blockAttributes) =>
			'x3p0/theme' === blockAttributes?.metadata?.bindings?.content?.source
			&& 'commentParentLink' === blockAttributes?.metadata?.bindings?.content?.args?.key
	}
};
