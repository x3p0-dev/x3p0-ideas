/**
 * Registers block variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import commentParentLink from './comment-parent-link';
import paginationLabel   from './pagination-label';
import postFormat        from './post-format';
import postReadingTime   from './post-reading-time';
import siteCopyright     from './site-copyright';
import superpower        from './superpower';
import themeSpacer       from './theme-spacer';

// WordPress dependencies.
import { registerBlockVariation } from '@wordpress/blocks';

// Register each block variation.
registerBlockVariation(commentParentLink.block, commentParentLink.variation);
registerBlockVariation(paginationLabel.block,   paginationLabel.variation);
registerBlockVariation(postFormat.block,        postFormat.variation);
registerBlockVariation(postReadingTime.block,   postReadingTime.variation);
registerBlockVariation(siteCopyright.block,     siteCopyright.variation);
registerBlockVariation(superpower.block,        superpower.variation);
registerBlockVariation(themeSpacer.block,       themeSpacer.variation);
