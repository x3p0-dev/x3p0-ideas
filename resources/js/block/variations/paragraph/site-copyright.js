/**
 * Site Copyright variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { registerBlockVariation } from '@wordpress/blocks';
import { copyrightIcon } from '../../../common/utils-icon';
import { __ } from '@wordpress/i18n';

registerBlockVariation('core/paragraph', {
	name:       'x3p0/paragraph-site-copyright',
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
		}
	},
	isActive: [
		'metadata.bindings.content.source',
		'metadata.bindings.content.args.key'
	]
});
