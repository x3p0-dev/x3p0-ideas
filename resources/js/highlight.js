/**
 * Code syntax highlighter.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023-2024, Justin Tadlock
 * @license   GPL-3.0-or-later
 */

// Put Prism.js in manual mode. This must execute before calling the Prism
// script. The reason we do this is to specifically target only code blocks that
// the user has selected to be highlighted and to avoid plugin conflicts.
window.Prism = window.Prism || {};
window.Prism.manual = true;

// Import the Prism script.
import './prism';

// Target our code blocks only.
document.querySelectorAll('.wp-block-code.is-style-highlight').forEach(
	(block) => Prism.highlightAllUnder(block)
);
