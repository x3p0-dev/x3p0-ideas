// WordPress dependencies.
import { __ } from '@wordpress/i18n';

// Sets the supported blocks.
export const SUPPORTED_BLOCKS = [
	'core/heading',
	'core/paragraph'
];

// Defines the text shadow class prefix.
export const SHADOW_PREFIX = 'has-text-shadow-';

// Ideally, we'd get these directly from `theme.json`.
export const SHADOWS = [
	{ value: 'none', label: __( 'None',    'x3p0-ideas' ) },
	{ value: 'sm',   label: __( 'Small',   'x3p0-ideas' ) },
	{ value: 'md',   label: __( 'Medium',  'x3p0-ideas' ) },
	{ value: 'lg',   label: __( 'Large',   'x3p0-ideas' ) }
];
