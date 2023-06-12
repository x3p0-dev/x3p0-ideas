// WordPress dependencies.
import { __ } from '@wordpress/i18n';

export const SUPPORTED_BLOCKS = [
	'core/list'
];

export const MARKER_PREFIX = 'is-style-marker-';

export const UL_MARKERS = [
	{ value: 'arrow',  label:   __( 'Arrow',  'x3p0-ideas' ) },
	{ value: 'dash',   label:   __( 'Dash',   'x3p0-ideas' ) },
	{ value: 'disc',   label:   __( 'Disc',   'x3p0-ideas' ) },
	{ value: 'circle', label:   __( 'Circle', 'x3p0-ideas' ) },
	{ value: 'square', label:   __( 'Square', 'x3p0-ideas' ) }
];

export const OL_MARKERS = [
	{ value: 'decimal',              label: __( 'Decimal',      'x3p0-ideas' ) },
	{ value: 'decimal-leading-zero', label: __( 'Leading Zero', 'x3p0-ideas' ) }
];

export const MARKERS = [
	...UL_MARKERS,
	...OL_MARKERS
];
