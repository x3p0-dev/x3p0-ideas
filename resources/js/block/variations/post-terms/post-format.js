/**
 * Post format variation for the Post Terms block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';
import { pencil } from '@wordpress/icons';

registerBlockVariation('core/post-terms', {
	name: 'x3p0/post-terms-post-format',
	title: __('Format', 'x3p0-ideas'),
	icon: pencil,
	description: __('Displays the assigned post format.', 'x3p0-ideas'),
	scope: [ 'block', 'inserter', 'transform' ],
	attributes: {
		term: 'post_format'
	},
	isActive: ['term']
});
