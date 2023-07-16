import { addFilter } from '@wordpress/hooks';

/**
 * @description Returns the theme's default featured image size so that it's
 * rendered in the featured image component in the sidebar panel.
 * @returns {string}
 */
const withImageSize = () => 'x3p0-16x9-lg';

addFilter(
	'editor.PostFeaturedImage.imageSize',
	'x3p0/ideas/featured-image-size',
	withImageSize
);

/*
// added in GB 16.2
addFilter(
	'blocks.registerBlockType',
	'x3p0/ideas/block/footnotes',
	( settings, name ) => {
		if ( name !== 'core/footnotes' ) {
			return settings;
		}
		settings.supports.inserter = true;

		return settings;
	}
);
*/

/*
addFilter(
	'blocks.registerBlockType',
	'x3p0/ideas/block/post-template',
	( settings, name ) => {
		if ( name !== 'core/post-template' ) {
			return settings;
		}
		return Object.assign( {}, settings, {
			supports: Object.assign( settings.supports ?? {}, {
				spacing: Object.assign( settings.supports.spacing ?? {}, {
					padding: true
				} )
			} )
		} );
	}
);
*/
