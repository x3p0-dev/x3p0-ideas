/**
 * Constants for style variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.
import { __ } from '@wordpress/i18n';

/**
 * @description Houses all of our block style variations as objects and assigned
 * to their respective blocks. The key for the variation is its `name`, and the
 * value is its label.
 * @type {object}
 */
export const BLOCK_STYLES = {
	'core/archives': {
		'horizontal': __( 'Horizontal', 'x3p0-ideas' )
	},
	'core/button': {
		'hand-drawn': __( 'Hand Drawn', 'x3p0-ideas' )
	},
	'core/categories': {
		'horizontal': __( 'Horizontal', 'x3p0-ideas' )
	},
	'core/column': {
		'box':  __( 'Box',  'x3p0-ideas' ),
		'card': __( 'Card', 'x3p0-ideas' )
	},
	'core/columns': {
		'reverse-stack': __( 'Reverse Mobile Stack', 'x3p0-ideas' )
	},
	'core/comment-author-name': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/comment-date': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/comment-edit-link': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/comment-reply-link': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/cover': {
		'polygon-slant-down-sm': __( 'Slant Down: Small',  'x3p0-ideas' ),
		'polygon-slant-down-md': __( 'Slant Down: Medium', 'x3p0-ideas' ),
		'polygon-slant-up-sm':   __( 'Slant Up: Small',    'x3p0-ideas' ),
		'polygon-slant-up-md':   __( 'Slant Up: Medium',   'x3p0-ideas' ),
		'stretch':               __( 'Stretch',            'x3p0-ideas' )
	},
	'core/footnotes': {
		'pull': __( 'Pull', 'x3p0-ideas' )
	},
	'core/gallery': {
		'classic': __( 'Classic', 'x3p0-ideas' )
	},
	'core/group': {
		'box':        __( 'Box',                'x3p0-ideas' ),
		'card':       __( 'Card',               'x3p0-ideas' ),
		'hand-drawn': __( 'Hand Drawn',         'x3p0-ideas' ),
		'padded':     __( 'Padded',             'x3p0-ideas' ),
		'padded-y':   __( 'Padded: Vertically', 'x3p0-ideas' )
	},
	'core/heading': {
		'clip-text':         __( 'Clip Text', 'x3p0-ideas' ),
		'text-wrap-balance': __( 'Wrap: Balance', 'x3p0-ideas' )
	},
	'core/home-link': {
		'button': __( 'Button', 'x3p0-ideas' ),
		'icon':   __( 'Icon',   'x3p0-ideas' )
	},
	'core/image': {
		'borderless':   __( 'Borderless',    'x3p0-ideas' ),
		'hand-drawn':   __( 'Hand-Drawn',    'x3p0-ideas' ),
		'icon':         __( 'Caption Icon',  'x3p0-ideas' ),
		'polaroid':     __( 'Polaroid',      'x3p0-ideas' ),
		'tape':         __( 'Tape',          'x3p0-ideas' ),
		'tape-corners': __( 'Tape: Corners', 'x3p0-ideas' )
	},
	'core/list': {
		'gap-snug':    __( 'Gap: Snug',    'x3p0-ideas' ),
		'gap-normal':  __( 'Gap: Normal',  'x3p0-ideas' ),
		'gap-relaxed': __( 'Gap: Relaxed', 'x3p0-ideas' ),
		'gap-loose':   __( 'Gap: Loose',   'x3p0-ideas' ),
		'horizontal':  __( 'Horizontal',   'x3p0-ideas' )
	},
	'core/loginout': {
		'button': __( 'Button', 'x3p0-ideas' ),
		'icon':   __( 'Icon',   'x3p0-ideas' )
	},
	'core/paragraph': {
		'indent':  __( 'Indent',  'x3p0-ideas' ),
		'intro':   __( 'Intro',   'x3p0-ideas' ),
		'lead-in': __( 'Lead-in', 'x3p0-ideas' ),
		'lede':    __( 'Lede',    'x3p0-ideas' )
	},
	'core/post-author-name': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/post-comments-count': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/post-comments-form': {
		'icons': __( 'Icons', 'x3p0-ideas' )
	},
	'core/post-comments-link': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/post-date': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/post-template': {
		'flex':                  __( 'Flexible', 'x3p0-ideas' ),
		'featured-col-span-all': __( 'Featured: Full Width', 'x3p0-ideas' )
	},
	'core/post-terms': {
		'button': __( 'Button', 'x3p0-ideas' ),
		'icon':   __( 'Icon',   'x3p0-ideas' )
	},
	'core/post-time-to-read': {
		'icon': __( 'Icon', 'x3p0-ideas' )
	},
	'core/pullquote': {
		'hand-drawn': __( 'Hand Drawn', 'x3p0-ideas' ),
		'mark-top':   __( 'Mark: Top',  'x3p0-ideas' )
	},
	'core/search': {
		'icon': __( 'Icon', 'x3p0-ideas' ),
		'sm':   __( 'Small', 'x3p0-ideas' )
	},
	'core/separator': {
		'dashed':     __( 'Dashed',     'x3p0-ideas' ),
		'dotted':     __( 'Dotted',     'x3p0-ideas' ),
		'double':     __( 'Double',     'x3p0-ideas' ),
		'hand-drawn': __( 'Hand Drawn', 'x3p0-ideas' )
	},
	'core/social-links': {
		'hand-drawn': __( 'Hand Drawn', 'x3p0-ideas' ),
		'outline':    __( 'Outline',    'x3p0-ideas' )
	},
	'core/site-title': {
		'normalize': __( 'Normalize', 'x3p0-ideas' )
	},
	'core/table-of-contents': {
		'chapters':          __( 'Chapters', 'x3p0-ideas' ),
		'chapters-and-subs': __( 'Chapters With Sub-headings', 'x3p0-ideas' ),
		'marker-unordered':  __( 'Unordered', 'x3p0-ideas' ),
		'pull':              __( 'Pull',      'x3p0-ideas' )
	},
	'core/tag-cloud': {
		'flat': __( 'Flat', 'x3p0-ideas' )
	}
};
