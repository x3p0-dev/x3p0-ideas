/**
 * Theme spacer variation sets the default Spacer block.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { __, } from '@wordpress/i18n';

export default {
	block: 'core/spacer',
	variation: {
		name:       'x3p0/theme-spacer',
		title:      __('Spacer', 'x3p0-ideas'),
		isDefault:  true,
		keywords:   [ 'space', 'spacer', 'spacing' ],
		isActive: [ 'height' ],
		attributes: {
			height: 'var:preset|spacing|120'
		}
	}
};
