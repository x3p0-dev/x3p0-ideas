/**
 * Theme spacer variation.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

import { __ } from '@wordpress/i18n';

// Registers the theme spacer as the default so that---with any luck---users
// will choose the theme spacing sizes over custom sizes. Note that there is
// currently no way to set the default spacer size via `theme.json` nor is there
// a way to disable custom spacing sizes.
export default {
	block: 'core/spacer',
	variation: {
		name:       'x3p0/theme-spacer',
		title:      __('Spacer', 'x3p0-ideas'),
		isDefault:  true,
		keywords:   [ 'space', 'spacer', 'spacing' ],
		attributes: {
			height: 'var:preset|spacing|plus-8'
		},
		isActive: (blockAttributes) =>
			blockAttributes?.height
			&& blockAttributes?.height.includes('var:preset|spacing|')
	}
};
