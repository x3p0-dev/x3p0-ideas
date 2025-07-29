/**
 * Registers block variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2025, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Internal dependencies.
import commentParentLink from './comment-parent-link';
import currentYear       from './current-year';
import paginationLabel   from './pagination-label';
import postFormat        from './post-format';
import postReadingTime   from './post-reading-time';
import siteCopyright     from './site-copyright';
import superpower        from './superpower';
import themeLink         from './theme-link';
import themeSpacer       from './theme-spacer';
import toggleColorScheme from './toggle-color-scheme';

// WordPress dependencies.
import { registerBlockVariation } from '@wordpress/blocks';

// Register each block variation.
registerBlockVariation(commentParentLink.block, commentParentLink.variation);
registerBlockVariation(currentYear.block,       currentYear.variation);
registerBlockVariation(paginationLabel.block,   paginationLabel.variation);
registerBlockVariation(postFormat.block,        postFormat.variation);
registerBlockVariation(postReadingTime.block,   postReadingTime.variation);
registerBlockVariation(siteCopyright.block,     siteCopyright.variation);
registerBlockVariation(superpower.block,        superpower.variation);
registerBlockVariation(themeLink.block,         themeLink.variation);
registerBlockVariation(themeSpacer.block,       themeSpacer.variation);
registerBlockVariation(toggleColorScheme.block, toggleColorScheme.variation);
