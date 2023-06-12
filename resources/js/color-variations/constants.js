// WordPress imports.
import { __ } from '@wordpress/i18n';

export const SUPPORTED_BLOCKS = [
	'core/group',
	'core/paragraph'
];

export const VARIATION_PREFIX = 'has-color-var-';

export const PRIMARY_VARIATIONS = {
	'default': __( 'Default', 'x3p0-ideas' ),
	'primary': __( 'Primary', 'x3p0-ideas' ),
	'neutral': __( 'Neutral', 'x3p0-ideas' ),
};

export const SECONDARY_VARIATIONS = {
	'info':    __( 'Info',    'x3p0-ideas' ),
	'tip':     __( 'Tip',     'x3p0-ideas' ),
	'warning': __( 'Warning', 'x3p0-ideas' ),
	'danger':  __( 'Danger',  'x3p0-ideas' )
};

export const VARIATIONS = {
	...PRIMARY_VARIATIONS,
	...SECONDARY_VARIATIONS
};

export const COLOR_SHADES = [
	'base',
	'subtle',
	'muted',
	'contrast',
	'emphasis'
];
