/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@wordpress/icons/build-module/library/color.js":
/*!*********************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/color.js ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const color = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  viewBox: "0 0 24 24",
  xmlns: "http://www.w3.org/2000/svg"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M17.2 10.9c-.5-1-1.2-2.1-2.1-3.2-.6-.9-1.3-1.7-2.1-2.6L12 4l-1 1.1c-.6.9-1.3 1.7-2 2.6-.8 1.2-1.5 2.3-2 3.2-.6 1.2-1 2.2-1 3 0 3.4 2.7 6.1 6.1 6.1s6.1-2.7 6.1-6.1c0-.8-.3-1.8-1-3zm-5.1 7.6c-2.5 0-4.6-2.1-4.6-4.6 0-.3.1-1 .8-2.3.5-.9 1.1-1.9 2-3.1.7-.9 1.3-1.7 1.8-2.3.7.8 1.3 1.6 1.8 2.3.8 1.1 1.5 2.2 2 3.1.7 1.3.8 2 .8 2.3 0 2.5-2.1 4.6-4.6 4.6z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (color);
//# sourceMappingURL=color.js.map

/***/ }),

/***/ "./node_modules/@wordpress/icons/build-module/library/star-filled.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@wordpress/icons/build-module/library/star-filled.js ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/primitives */ "@wordpress/primitives");
/* harmony import */ var _wordpress_primitives__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__);


/**
 * WordPress dependencies
 */

const starFilled = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.SVG, {
  xmlns: "http://www.w3.org/2000/svg",
  viewBox: "0 0 24 24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_primitives__WEBPACK_IMPORTED_MODULE_1__.Path, {
  d: "M11.776 4.454a.25.25 0 01.448 0l2.069 4.192a.25.25 0 00.188.137l4.626.672a.25.25 0 01.139.426l-3.348 3.263a.25.25 0 00-.072.222l.79 4.607a.25.25 0 01-.362.263l-4.138-2.175a.25.25 0 00-.232 0l-4.138 2.175a.25.25 0 01-.363-.263l.79-4.607a.25.25 0 00-.071-.222L4.754 9.881a.25.25 0 01.139-.426l4.626-.672a.25.25 0 00.188-.137l2.069-4.192z"
}));
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (starFilled);
//# sourceMappingURL=star-filled.js.map

/***/ }),

/***/ "./resources/js/block-edit/color-variations/constants.js":
/*!***************************************************************!*\
  !*** ./resources/js/block-edit/color-variations/constants.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   COLOR_SHADES: () => (/* binding */ COLOR_SHADES),
/* harmony export */   SUPPORTED_BLOCKS: () => (/* binding */ SUPPORTED_BLOCKS),
/* harmony export */   VARIATIONS: () => (/* binding */ VARIATIONS),
/* harmony export */   VARIATION_PREFIX: () => (/* binding */ VARIATION_PREFIX)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress imports.


/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
const SUPPORTED_BLOCKS = ['core/group', 'core/paragraph'];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
const VARIATION_PREFIX = 'has-color-var-';

/**
 * @description Group of available variation options.
 * @type {object}
 */
const VARIATIONS = {
  'default': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Default', 'x3p0-ideas'),
  'neutral': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Neutral', 'x3p0-ideas'),
  'primary': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Primary', 'x3p0-ideas'),
  'secondary': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Secondary', 'x3p0-ideas'),
  'tertiary': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Tertiary', 'x3p0-ideas'),
  'positive': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Positive', 'x3p0-ideas'),
  'negative': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Negative', 'x3p0-ideas')
};

/**
 * @description Color shades that are paired with each variation (e.g.,
 * `primary-base`, `primary-subtle`, etc.)
 * @type {array}
 */
const COLOR_SHADES = ['base', 'subtle', 'muted', 'contrast', 'emphasis'];

/***/ }),

/***/ "./resources/js/block-edit/color-variations/control-color-variation.js":
/*!*****************************************************************************!*\
  !*** ./resources/js/block-edit/color-variations/control-color-variation.js ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/color-variations/constants.js");
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./hooks */ "./resources/js/block-edit/color-variations/hooks.js");
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./utils */ "./resources/js/block-edit/color-variations/utils.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/color.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);

/**
 * Color variation picker component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.




// WordPress dependencies.




/**
 * @description Dropdown menu item for a color variation selector.
 * @example
 * <ColorVariationControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * />
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (({
  attributes: {
    className
  },
  setAttributes
}) => {
  // Get the variation colors.
  const variationColors = (0,_hooks__WEBPACK_IMPORTED_MODULE_2__.useVariationColors)();

  // Get the current variation.
  const currentVariation = (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getVariationFromClassName)(className);

  // Filter out shades that are not set for the variation. Then, map the
  // resulting array of colors to the color indicator components.
  const indicators = variation => Object.values(variationColors[variation]).map((shade, index) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Flex, {
    key: index
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ColorIndicator, {
    colorValue: shade
  })));

  // Builds a menu item for a variation.
  const variationMenuItem = (variation, index) => {
    const colorIndicators = indicators(variation);
    const value = 'default' === variation ? '' : variation;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.MenuItem, {
      key: index,
      role: "menuitemradio",
      className: "x3p0-color-var-picker__button",
      isSelected: currentVariation === value,
      isPressed: currentVariation === value,
      onClick: () => setAttributes({
        className: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.updateVariationClass)(className, value, currentVariation)
      })
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalHStack, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.__experimentalZStack, {
      key: `x3p0-color-var-indicator-${index}`,
      offset: -8,
      isLayered: false
    }, colorIndicators), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.FlexItem, {
      key: `x3p0-color-var-name-${index}`
    }, _constants__WEBPACK_IMPORTED_MODULE_1__.VARIATIONS[variation])));
  };

  // Color variations menu group.
  const variationPicker = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.MenuGroup, {
    className: "x3p0-color-var-picker",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Select a color variation', 'x3p0-ideas')
  }, Object.keys(variationColors).map((variation, index) => variationMenuItem(variation, `primary-${index}`)));
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Dropdown, {
    className: "x3p0-color-var-dropdown",
    contentClassName: "x3p0-color-var-popover",
    popoverProps: {
      placement: 'bottom-start'
    },
    renderToggle: ({
      isOpen,
      onToggle
    }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToolbarButton, {
      className: "x3p0-color-var-dropdown__button",
      icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_6__["default"],
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Color Variation', 'x3p0-ideas'),
      onClick: onToggle,
      "aria-expanded": isOpen,
      isPressed: !!currentVariation
    }),
    renderContent: () => variationPicker
  });
});

/***/ }),

/***/ "./resources/js/block-edit/color-variations/hooks.js":
/*!***********************************************************!*\
  !*** ./resources/js/block-edit/color-variations/hooks.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   useVariationColors: () => (/* binding */ useVariationColors)
/* harmony export */ });
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/color-variations/constants.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/**
 * The hooks file houses custom React hooks for use with the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.


/**
 * @description React hook that returns an array of colors.
 * @returns {Object}
 */
const useVariationColors = () => {
  // Gets the variations as registered in `theme.json`.
  const palette = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.useSetting)('color.palette');
  let colors = {};
  Object.keys(_constants__WEBPACK_IMPORTED_MODULE_0__.VARIATIONS).forEach(type => {
    let shades = {};
    _constants__WEBPACK_IMPORTED_MODULE_0__.COLOR_SHADES.forEach(shade => {
      const name = 'default' === type ? shade : `${type}-${shade}`;
      const result = palette.find(({
        slug
      }) => slug == name);
      if (result) {
        shades[shade] = result.color;
      }
    });
    if (0 < Object.keys(shades).length) {
      colors[type] = shades;
    }
  });
  return colors;
};

/***/ }),

/***/ "./resources/js/block-edit/color-variations/index.js":
/*!***********************************************************!*\
  !*** ./resources/js/block-edit/color-variations/index.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _control_color_variation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./control-color-variation */ "./resources/js/block-edit/color-variations/control-color-variation.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/color-variations/constants.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Filters the `BlockEdit` to add a color variation picker.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal imports.



// WordPress imports.


/**
 * @description Filters the and returns the `BlockEdit` component.
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (BlockEdit => props => {
  return _constants__WEBPACK_IMPORTED_MODULE_2__.SUPPORTED_BLOCKS.includes(props.name) ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.BlockControls, {
    group: "other"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_control_color_variation__WEBPACK_IMPORTED_MODULE_1__["default"], {
    attributes: props.attributes,
    setAttributes: props.setAttributes
  }))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props);
});

/***/ }),

/***/ "./resources/js/block-edit/color-variations/utils.js":
/*!***********************************************************!*\
  !*** ./resources/js/block-edit/color-variations/utils.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getVariationFromClassName: () => (/* binding */ getVariationFromClassName),
/* harmony export */   updateVariationClass: () => (/* binding */ updateVariationClass)
/* harmony export */ });
/* harmony import */ var _common_utils_classname__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common/utils-classname */ "./resources/js/common/utils-classname.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/color-variations/constants.js");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.


/**
 * @description Gets a variation value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
const getVariationFromClassName = className => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default())(className);
  const variation = Object.keys(_constants__WEBPACK_IMPORTED_MODULE_1__.VARIATIONS).find(option => list.contains(_constants__WEBPACK_IMPORTED_MODULE_1__.VARIATION_PREFIX + option));
  return undefined !== variation ? variation : '';
};

/**
 * @description Removes the previous variation class and adds the new one.
 *
 * @param {string} className
 * @param {string} newVar
 * @param {string} oldVar
 * @returns {string}
 */
const updateVariationClass = (className, newVar, oldVar) => (0,_common_utils_classname__WEBPACK_IMPORTED_MODULE_0__.updateClass)(className, 'default' === newVar ? '' : newVar, oldVar, _constants__WEBPACK_IMPORTED_MODULE_1__.VARIATION_PREFIX);

/***/ }),

/***/ "./resources/js/block-edit/filters.js":
/*!********************************************!*\
  !*** ./resources/js/block-edit/filters.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _color_variations__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./color-variations */ "./resources/js/block-edit/color-variations/index.js");
/* harmony import */ var _gradient_background__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./gradient-background */ "./resources/js/block-edit/gradient-background/index.js");
/* harmony import */ var _list_markers__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./list-markers */ "./resources/js/block-edit/list-markers/index.js");
/* harmony import */ var _separator_icons__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./separator-icons */ "./resources/js/block-edit/separator-icons/index.js");
/* harmony import */ var _text_shadow__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./text-shadow */ "./resources/js/block-edit/text-shadow/index.js");
/**
 * Exports block edit filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */







/**
 * @description An object containing of all the `editor.BlockEdit` filters. The
 * keys are the slugs for the filter namespaces, and the values are the callbacks.
 * @type {Object.<string, function>}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  'color-variations': _color_variations__WEBPACK_IMPORTED_MODULE_0__["default"],
  'gradient-background': _gradient_background__WEBPACK_IMPORTED_MODULE_1__["default"],
  'list-markers': _list_markers__WEBPACK_IMPORTED_MODULE_2__["default"],
  'separator-icons': _separator_icons__WEBPACK_IMPORTED_MODULE_3__["default"],
  'text-shadow': _text_shadow__WEBPACK_IMPORTED_MODULE_4__["default"]
});

/***/ }),

/***/ "./resources/js/block-edit/gradient-background/constants.js":
/*!******************************************************************!*\
  !*** ./resources/js/block-edit/gradient-background/constants.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   GRADIENT_PREFIX: () => (/* binding */ GRADIENT_PREFIX),
/* harmony export */   GRADIENT_SUFFIX: () => (/* binding */ GRADIENT_SUFFIX),
/* harmony export */   SUPPORTED_BLOCKS: () => (/* binding */ SUPPORTED_BLOCKS)
/* harmony export */ });
/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
const SUPPORTED_BLOCKS = ['core/avatar', 'core/image', 'core/post-featured-image'];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
const GRADIENT_PREFIX = 'has-';

/**
 * @description Suffix used for the class name.
 * @type {string}
 */
const GRADIENT_SUFFIX = '-gradient-background';

/***/ }),

/***/ "./resources/js/block-edit/gradient-background/control-gradient.js":
/*!*************************************************************************!*\
  !*** ./resources/js/block-edit/gradient-background/control-gradient.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _hooks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./hooks */ "./resources/js/block-edit/gradient-background/hooks.js");
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./utils */ "./resources/js/block-edit/gradient-background/utils.js");
/* harmony import */ var _common_utils_gradient__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../common/utils-gradient */ "./resources/js/common/utils-gradient.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__);

/**
 * Gradient background component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.




// WordPress dependencies.



/**
 * @description Creates a custom gradient picker.
 * @example
 * <GradientControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (({
  attributes: {
    className
  },
  setAttributes,
  clientId
}) => {
  // Get flattened gradients array and gradient options.
  const {
    gradients,
    gradientOptions
  } = (0,_hooks__WEBPACK_IMPORTED_MODULE_1__.useGradients)();

  // Get the current gradient.
  const currentGradient = (0,_utils__WEBPACK_IMPORTED_MODULE_2__.getGradientFromClassName)(className, gradients);

  // Returns the current gradient value by slug or null.
  const getGradientValue = () => currentGradient ? (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__.getGradientValueBySlug)(gradients, currentGradient) : null;

  // Returns a gradient slug by its value.
  const getGradientSlugByValue = value => (0,_common_utils_gradient__WEBPACK_IMPORTED_MODULE_3__.gradientSlug)((0,_common_utils_gradient__WEBPACK_IMPORTED_MODULE_3__.gradientAttribute)(value, gradients));

  // Define the gradient picker settings.
  const settings = {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Gradient Outline', 'x3p0-ideas'),
    gradientValue: getGradientValue(),
    onGradientChange: value => setAttributes({
      className: (0,_utils__WEBPACK_IMPORTED_MODULE_2__.updateGradientClass)(className, getGradientSlugByValue(value), currentGradient)
    }),
    isShownByDefault: true,
    disableCustomColors: true,
    disableCustomGradients: true,
    hasColorsOrGradients: false,
    gradients: gradientOptions
  };
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_5__.__experimentalColorGradientSettingsDropdown, {
    settings: [settings],
    panelId: clientId,
    __experimentalIsRenderedInSidebar: true,
    __experimentalHasMultipleOrigins: true
  });
});

/***/ }),

/***/ "./resources/js/block-edit/gradient-background/hooks.js":
/*!**************************************************************!*\
  !*** ./resources/js/block-edit/gradient-background/hooks.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   useGradients: () => (/* binding */ useGradients)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/**
 * The hooks file houses custom React hooks for use with the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.



/**
 * @description React hook that returns an object containing separated arrays
 * of gradients by theme and core.
 * @returns {object}
 */
const useGradients = () => {
  const colorGradientSettings = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.__experimentalUseMultipleOriginColorsAndGradients)();
  const gradients = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => colorGradientSettings.gradients.map(palette => [...(palette.gradients || [])]).flat());
  return {
    gradientOptions: colorGradientSettings.gradients,
    gradients: gradients
  };
};

/***/ }),

/***/ "./resources/js/block-edit/gradient-background/index.js":
/*!**************************************************************!*\
  !*** ./resources/js/block-edit/gradient-background/index.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _control_gradient__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./control-gradient */ "./resources/js/block-edit/gradient-background/control-gradient.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/gradient-background/constants.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Filters the `BlockEdit` to add a gradient background control.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (BlockEdit => props => {
  return _constants__WEBPACK_IMPORTED_MODULE_2__.SUPPORTED_BLOCKS.includes(props.name) ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.InspectorControls, {
    group: "color"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_control_gradient__WEBPACK_IMPORTED_MODULE_1__["default"], {
    attributes: props.attributes,
    setAttributes: props.setAttributes,
    clientId: props.clientId
  }))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props);
});

/***/ }),

/***/ "./resources/js/block-edit/gradient-background/utils.js":
/*!**************************************************************!*\
  !*** ./resources/js/block-edit/gradient-background/utils.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getGradientFromClassName: () => (/* binding */ getGradientFromClassName),
/* harmony export */   updateGradientClass: () => (/* binding */ updateGradientClass)
/* harmony export */ });
/* harmony import */ var _common_utils_classname__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common/utils-classname */ "./resources/js/common/utils-classname.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/gradient-background/constants.js");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.


/**
 * @description Gets a gradient value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
const getGradientFromClassName = (className, gradients) => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default())(className);
  const gradient = gradients.find(option => list.contains(_constants__WEBPACK_IMPORTED_MODULE_1__.GRADIENT_PREFIX + option.slug + _constants__WEBPACK_IMPORTED_MODULE_1__.GRADIENT_SUFFIX));
  return undefined !== gradient ? gradient.slug : '';
};

/**
 * @description Removes the previous gradient class and adds a new one.
 *
 * @param {string} className
 * @param {string} newGradient
 * @param {string} oldGradient
 * @returns {string}
 */
const updateGradientClass = (className, newGradient, oldGradient) => (0,_common_utils_classname__WEBPACK_IMPORTED_MODULE_0__.updateClass)(className, newGradient, oldGradient, _constants__WEBPACK_IMPORTED_MODULE_1__.GRADIENT_PREFIX, _constants__WEBPACK_IMPORTED_MODULE_1__.GRADIENT_SUFFIX);

/***/ }),

/***/ "./resources/js/block-edit/index.js":
/*!******************************************!*\
  !*** ./resources/js/block-edit/index.js ***!
  \******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _filters__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./filters */ "./resources/js/block-edit/filters.js");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Registers block edit filters.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.


// Register each of the block edit filters.
Object.keys(_filters__WEBPACK_IMPORTED_MODULE_0__["default"]).forEach(filter => (0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_1__.addFilter)('editor.BlockEdit', `x3p0/ideas/${filter}`, _filters__WEBPACK_IMPORTED_MODULE_0__["default"][filter]));

/***/ }),

/***/ "./resources/js/block-edit/list-markers/constants.js":
/*!***********************************************************!*\
  !*** ./resources/js/block-edit/list-markers/constants.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   MARKERS: () => (/* binding */ MARKERS),
/* harmony export */   MARKER_PREFIX: () => (/* binding */ MARKER_PREFIX),
/* harmony export */   OL_MARKERS: () => (/* binding */ OL_MARKERS),
/* harmony export */   SUPPORTED_BLOCKS: () => (/* binding */ SUPPORTED_BLOCKS),
/* harmony export */   UL_MARKERS: () => (/* binding */ UL_MARKERS)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.


/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
const SUPPORTED_BLOCKS = ['core/list'];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
const MARKER_PREFIX = 'has-marker-';

/**
 * @description Unordered list options.
 * @type {array}
 */
const UL_MARKERS = [{
  value: 'arrow',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Arrow', 'x3p0-ideas')
}, {
  value: 'dash',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Dash', 'x3p0-ideas')
}, {
  value: 'disc',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Disc', 'x3p0-ideas')
}, {
  value: 'circle',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Circle', 'x3p0-ideas')
}, {
  value: 'square',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Square', 'x3p0-ideas')
}];

/**
 * @description Ordered list options.
 * @type {array}
 */
const OL_MARKERS = [{
  value: 'decimal',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Decimal', 'x3p0-ideas')
}, {
  value: 'leading-zero',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Leading Zero', 'x3p0-ideas')
}, {
  value: 'upper-alpha',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Alphabetical: Uppercase', 'x3p0-ideas')
}, {
  value: 'lower-alpha',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Alphabetical: Lowercase', 'x3p0-ideas')
}, {
  value: 'upper-roman',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Roman: Uppercase', 'x3p0-ideas')
}, {
  value: 'lower-roman',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Roman: Lowercase', 'x3p0-ideas')
}];

/**
 * @description Combined array of list options.
 * @type {array}
 */
const MARKERS = [...UL_MARKERS, ...OL_MARKERS];

/***/ }),

/***/ "./resources/js/block-edit/list-markers/control-marker-dropdown.js":
/*!*************************************************************************!*\
  !*** ./resources/js/block-edit/list-markers/control-marker-dropdown.js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common/utils-icon */ "./resources/js/common/utils-icon.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/list-markers/constants.js");
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./utils */ "./resources/js/block-edit/list-markers/utils.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);

/**
 * List marker component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.




// WordPress dependencies.




// Define a default option for the select control.
const DEFAULT_OPTION = {
  value: '',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Default', 'x3p0-ideas')
};

/**
 * @description Creates a list marker dropdown control.
 * @example
 * <MarkerDropdownControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * />
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (({
  attributes: {
    className,
    ordered
  },
  setAttributes
}) => {
  // Get the marker and only update it when `className` changes.
  const marker = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => (0,_utils__WEBPACK_IMPORTED_MODULE_3__.getMarkerFromClassName)(className), [className]);

  // Gets the marker options based on the list element.
  const options = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => ordered ? [DEFAULT_OPTION, ..._constants__WEBPACK_IMPORTED_MODULE_2__.OL_MARKERS] : [DEFAULT_OPTION, ..._constants__WEBPACK_IMPORTED_MODULE_2__.UL_MARKERS], [ordered]);

  // Resets the marker class if the list element changes.
  (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useEffect)(() => {
    if (marker && ordered && !(0,_utils__WEBPACK_IMPORTED_MODULE_3__.isOrderedMarker)(marker) || !ordered && !(0,_utils__WEBPACK_IMPORTED_MODULE_3__.isUnorderedMarker)(marker)) {
      setAttributes({
        className: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.updateMarkerClass)(className, '', marker)
      });
    }
  }, [ordered]);
  const markerButtonContent = (option, index) => {
    const slug = option.value ? option.value : 'default';
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.FlexItem, {
      key: `x3p0-marker-name-${index}`,
      className: "x3p0-list-marker-selector__content"
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("ul", {
      className: `x3p0-list-marker-selector__list has-marker-${slug}`
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("li", null, option.label)));
  };
  const markerButton = (option, index) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.MenuItem, {
    key: index,
    role: "menuitemradio",
    className: "x3p0-list-marker-selector__button",
    isSelected: marker === option.value,
    isPressed: marker === option.value,
    onClick: () => setAttributes({
      className: (0,_utils__WEBPACK_IMPORTED_MODULE_3__.updateMarkerClass)(className, option.value, marker)
    })
  }, markerButtonContent(option, index));
  const markerControls = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.MenuGroup, {
    className: "x3p0-list-marker-selector",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('Select a list marker', 'x3p0-ideas')
  }, options.map((option, index) => markerButton(option, index)));
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.Dropdown, {
    className: "x3p0-list-marker-dropdown",
    contentClassName: "x3p0-list-marker-popover",
    popoverProps: {
      placement: 'bottom-start'
    },
    renderToggle: ({
      isOpen,
      onToggle
    }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.ToolbarButton, {
      className: "x3p0-list-marker__button",
      icon: _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__.markerIcon,
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__.__)('List Marker', 'x3p0-ideas'),
      onClick: onToggle,
      "aria-expanded": isOpen,
      isPressed: !!marker
    }),
    renderContent: () => markerControls
  });
});

/***/ }),

/***/ "./resources/js/block-edit/list-markers/index.js":
/*!*******************************************************!*\
  !*** ./resources/js/block-edit/list-markers/index.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _control_marker_dropdown__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./control-marker-dropdown */ "./resources/js/block-edit/list-markers/control-marker-dropdown.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/list-markers/constants.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Filters the `BlockEdit` to add a list marker control.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.


/**
 * @description Filters and returns the `BlockEdit` component.
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (BlockEdit => props => {
  return _constants__WEBPACK_IMPORTED_MODULE_2__.SUPPORTED_BLOCKS.includes(props.name) ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.BlockControls, {
    group: "other"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_control_marker_dropdown__WEBPACK_IMPORTED_MODULE_1__["default"], {
    attributes: props.attributes,
    setAttributes: props.setAttributes
  }))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props);
});

/***/ }),

/***/ "./resources/js/block-edit/list-markers/utils.js":
/*!*******************************************************!*\
  !*** ./resources/js/block-edit/list-markers/utils.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getMarkerFromClassName: () => (/* binding */ getMarkerFromClassName),
/* harmony export */   isOrderedMarker: () => (/* binding */ isOrderedMarker),
/* harmony export */   isUnorderedMarker: () => (/* binding */ isUnorderedMarker),
/* harmony export */   updateMarkerClass: () => (/* binding */ updateMarkerClass)
/* harmony export */ });
/* harmony import */ var _common_utils_classname__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common/utils-classname */ "./resources/js/common/utils-classname.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/list-markers/constants.js");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.


/**
 * @description Gets a marker value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
const getMarkerFromClassName = className => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default())(className);
  const marker = _constants__WEBPACK_IMPORTED_MODULE_1__.MARKERS.find(option => list.contains(_constants__WEBPACK_IMPORTED_MODULE_1__.MARKER_PREFIX + option.value));
  return undefined !== marker ? marker.value : '';
};

/**
 * @description Removes the previous marker class and adds the new one.
 *
 * @param {string} className
 * @param {string} newMarker
 * @param {string} oldMarker
 * @returns {string}
 */
const updateMarkerClass = (className, newMarker, oldMarker) => (0,_common_utils_classname__WEBPACK_IMPORTED_MODULE_0__.updateClass)(className, newMarker, oldMarker, _constants__WEBPACK_IMPORTED_MODULE_1__.MARKER_PREFIX);

/**
 * @description Determines if the marker is for ordered lists.
 *
 * @param {string} slug
 * @returns {boolean}
 */
const isOrderedMarker = slug => _constants__WEBPACK_IMPORTED_MODULE_1__.OL_MARKERS.find(marker => marker.value === slug);

/**
 * @description Determines if the marker is for unordered lists.
 *
 * @param {string} slug
 * @returns {boolean}
 */
const isUnorderedMarker = slug => _constants__WEBPACK_IMPORTED_MODULE_1__.UL_MARKERS.find(marker => marker.value === slug);

/***/ }),

/***/ "./resources/js/block-edit/separator-icons/constants.js":
/*!**************************************************************!*\
  !*** ./resources/js/block-edit/separator-icons/constants.js ***!
  \**************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   ICONS: () => (/* binding */ ICONS),
/* harmony export */   STYLE_PREFIX: () => (/* binding */ STYLE_PREFIX),
/* harmony export */   SUPPORTED_BLOCKS: () => (/* binding */ SUPPORTED_BLOCKS)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress imports.


/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
const SUPPORTED_BLOCKS = ['core/separator'];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
const STYLE_PREFIX = 'has-icon-';

/**
 * @description Array of icon options.
 * @type {array}
 */
const ICONS = [{
  value: '❦',
  gradient: ''
}, {
  value: '🫠',
  gradient: 'mohave'
}, {
  value: '🌼',
  gradient: 'mohave'
}, {
  value: '☀️',
  gradient: 'true-sunset'
}, {
  value: '🪶',
  gradient: 'shy-rainbow'
}, {
  value: '🔥',
  gradient: 'luminous-vivid-amber-to-luminous-vivid-orange'
}, {
  value: '🍃',
  gradient: 'emerald'
}, {
  value: '☕',
  gradient: 'oahu'
}, {
  value: '🍻',
  gradient: 'happy-memories'
}, {
  value: '🪷',
  gradient: 'blush-light-purple'
}, {
  value: '🎸',
  gradient: 'blush-bordeaux'
}, {
  value: '✏️',
  gradient: 'mohave'
}, {
  value: '🚀',
  gradient: 'superman'
}, {
  value: '☘️',
  gradient: 'emerald'
}, {
  value: '⭐',
  gradient: 'luminous-dusk'
}, {
  value: '🌻',
  gradient: 'true-sunset'
}, {
  value: '⛱️',
  gradient: 'powerpuff'
}];

/***/ }),

/***/ "./resources/js/block-edit/separator-icons/control-icons.js":
/*!******************************************************************!*\
  !*** ./resources/js/block-edit/separator-icons/control-icons.js ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils */ "./resources/js/block-edit/separator-icons/utils.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_icons__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/icons */ "./node_modules/@wordpress/icons/build-module/library/star-filled.js");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Separator icon component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.




/**
 * @description Creates a separator icon control.
 * @example
 * <SeparatorIconControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (({
  attributes: {
    className
  },
  setAttributes
}) => {
  // Get the icons.
  const icons = (0,_utils__WEBPACK_IMPORTED_MODULE_1__.getIcons)();

  // Get the current icon.
  const currentIcon = (0,_utils__WEBPACK_IMPORTED_MODULE_1__.getIconFromClassName)(className);

  // Update the icon class and gradient.
  const onIconButtonClick = icon => setAttributes({
    className: (0,_utils__WEBPACK_IMPORTED_MODULE_1__.updateIconClass)(className, currentIcon === icon.value ? '' : icon.value, currentIcon),
    gradient: currentIcon === icon.value || !icon?.gradient ? undefined : icon?.gradient
  });

  // Builds a menu item for an icon.
  const iconButton = (icon, index) => {
    var _icon$label;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Button, {
      key: index,
      isPressed: currentIcon === icon.value,
      className: "x3p0-sep-icons-picker__button",
      onClick: () => onIconButtonClick(icon)
    }, (_icon$label = icon.label) !== null && _icon$label !== void 0 ? _icon$label : icon.value);
  };

  // Builds an icon picker in a 6-column grid.
  const iconPicker = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.BaseControl, {
    className: "x3p0-sep-icons-picker",
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Icons', 'x3p0-ideas')
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "x3p0-sep-icons-picker__description"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Pick an icon to super-charge your separator. Need more icons?', 'x3p0-ideas') + ' ', (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("a", {
    href: "#",
    target: "_blank"
  }, (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Learn how to add your own →', 'x3p0-ideas'))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.__experimentalGrid, {
    className: "x3p0-sep-icons-picker__grid",
    columns: "6"
  }, icons.map((icon, index) => iconButton(icon, index))));

  // Returns the dropdown menu item.
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.Dropdown, {
    className: "x3p0-sep-icons-dropdown",
    contentClassName: "x3p0-sep-icons-popover",
    popoverProps: {
      headerTitle: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Separator Icons', 'x3p0-ideas'),
      variant: 'toolbar'
    },
    renderToggle: ({
      isOpen,
      onToggle
    }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.ToolbarButton, {
      className: "x3p0-sep-icons-dropdown__button",
      icon: _wordpress_icons__WEBPACK_IMPORTED_MODULE_4__["default"],
      label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Separator Icon', 'x3p0-ideas'),
      onClick: onToggle,
      "aria-expanded": isOpen,
      isPressed: !!currentIcon
    }),
    renderContent: () => iconPicker
  });
});

/***/ }),

/***/ "./resources/js/block-edit/separator-icons/index.js":
/*!**********************************************************!*\
  !*** ./resources/js/block-edit/separator-icons/index.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _control_icons__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./control-icons */ "./resources/js/block-edit/separator-icons/control-icons.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/separator-icons/constants.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Filters the `BlockEdit` to add a separator icon picker.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal imports.



// WordPress imports.


/**
 * @description Filters the and returns the `BlockEdit` component.
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (BlockEdit => props => {
  return _constants__WEBPACK_IMPORTED_MODULE_2__.SUPPORTED_BLOCKS.includes(props.name) ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.BlockControls, {
    group: "other"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_control_icons__WEBPACK_IMPORTED_MODULE_1__["default"], {
    attributes: props.attributes,
    setAttributes: props.setAttributes
  }))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props);
});

/***/ }),

/***/ "./resources/js/block-edit/separator-icons/utils.js":
/*!**********************************************************!*\
  !*** ./resources/js/block-edit/separator-icons/utils.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getIconFromClassName: () => (/* binding */ getIconFromClassName),
/* harmony export */   getIcons: () => (/* binding */ getIcons),
/* harmony export */   updateIconClass: () => (/* binding */ updateIconClass)
/* harmony export */ });
/* harmony import */ var _common_utils_classname__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common/utils-classname */ "./resources/js/common/utils-classname.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/separator-icons/constants.js");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_3__);
/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.



/**
 * @description Wraps the icons in a filter hook and returns them.
 *
 * @returns {array}
 */
const getIcons = () => Array.from((0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_3__.applyFilters)('x3p0.ideas.blockEdit.separatorIcons', new Set(_constants__WEBPACK_IMPORTED_MODULE_1__.ICONS)));

/**
 * @description Gets an icon slug/value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
const getIconFromClassName = className => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default())(className);
  const style = getIcons().find(option => list.contains(_constants__WEBPACK_IMPORTED_MODULE_1__.STYLE_PREFIX + option.value));
  return undefined !== style ? style.value : '';
};

/**
 * @description Removes the previous icon class and adds a new one.
 *
 * @param {string} className
 * @param {string} newIcon
 * @param {string} oldIcon
 * @returns {string}
 */
const updateIconClass = (className, newIcon, oldIcon) => (0,_common_utils_classname__WEBPACK_IMPORTED_MODULE_0__.updateClass)(className, newIcon, oldIcon, _constants__WEBPACK_IMPORTED_MODULE_1__.STYLE_PREFIX);

/***/ }),

/***/ "./resources/js/block-edit/text-shadow/constants.js":
/*!**********************************************************!*\
  !*** ./resources/js/block-edit/text-shadow/constants.js ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   SHADOWS: () => (/* binding */ SHADOWS),
/* harmony export */   SHADOW_PREFIX: () => (/* binding */ SHADOW_PREFIX),
/* harmony export */   SUPPORTED_BLOCKS: () => (/* binding */ SUPPORTED_BLOCKS)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Houses constants needed for the component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.


/**
 * @description Array of supported blocks for the filter.
 * @type {array}
 */
const SUPPORTED_BLOCKS = ['core/heading', 'core/paragraph'];

/**
 * @description Prefix used for the class name.
 * @type {string}
 */
const SHADOW_PREFIX = 'has-text-shadow-';

/**
 * @description Array of icon options. Ideally, we'd be able to pull these from
 * `theme.json`, but the `settings.custom` options is best suited to CSS custom
 * properties and not text strings (for the labels).
 * @type {array}
 */
const SHADOWS = [{
  value: 'none',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('None', 'x3p0-ideas')
}, {
  value: 'sm',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Small', 'x3p0-ideas')
}, {
  value: 'md',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Medium', 'x3p0-ideas')
}, {
  value: 'lg',
  label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Large', 'x3p0-ideas')
}];

/***/ }),

/***/ "./resources/js/block-edit/text-shadow/control-text-shadow.js":
/*!********************************************************************!*\
  !*** ./resources/js/block-edit/text-shadow/control-text-shadow.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _utils__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./utils */ "./resources/js/block-edit/text-shadow/utils.js");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Text shadow component.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.




/**
 * @description A default option for `<CustomSelectControl/>`.
 * @type {object}
 */
const DEFAULT_OPTION = {
  key: 'default',
  name: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Default', 'x3p0-ideas'),
  value: ''
};

/**
 * @description Creates a text shadow selector control.
 * @example
 * <GradientControl
 * 	attributes={props.attributes}
 * 	setAttributes={props.setAttributes}
 * 	clientId={props.clientId}
 * />
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (({
  attributes: {
    className
  },
  setAttributes
}) => {
  // Get the shadow and only update it when `className` changes.
  const shadow = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useMemo)(() => (0,_utils__WEBPACK_IMPORTED_MODULE_1__.getShadowFromClassName)(className), [className]);
  const options = [DEFAULT_OPTION, ...(0,_utils__WEBPACK_IMPORTED_MODULE_1__.getShadows)().map(shadow => ({
    key: shadow.value,
    name: shadow.label,
    value: shadow.value
  }))];
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: "x3p0-text-shadow"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_3__.CustomSelectControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_2__.__)('Text Shadow', 'x3p0-ideas'),
    options: options,
    value: options.find(option => option.value === shadow),
    onChange: ({
      selectedItem
    }) => setAttributes({
      className: (0,_utils__WEBPACK_IMPORTED_MODULE_1__.updateShadowClass)(className, selectedItem.value, shadow)
    }),
    size: "__unstable-large",
    __nextHasNoMarginBottom: true,
    __nextUnconstrainedWidth: true
  }));
});

/***/ }),

/***/ "./resources/js/block-edit/text-shadow/index.js":
/*!******************************************************!*\
  !*** ./resources/js/block-edit/text-shadow/index.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _control_text_shadow__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./control-text-shadow */ "./resources/js/block-edit/text-shadow/control-text-shadow.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/text-shadow/constants.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__);

/**
 * Filters the `BlockEdit` to add a text shadow control.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.


/**
 * @description Filters the and returns the `BlockEdit` component.
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (BlockEdit => props => {
  return _constants__WEBPACK_IMPORTED_MODULE_2__.SUPPORTED_BLOCKS.includes(props.name) ? (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_3__.InspectorControls, {
    group: "typography"
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_control_text_shadow__WEBPACK_IMPORTED_MODULE_1__["default"], {
    attributes: props.attributes,
    setAttributes: props.setAttributes
  }))) : (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props);
});

/***/ }),

/***/ "./resources/js/block-edit/text-shadow/utils.js":
/*!******************************************************!*\
  !*** ./resources/js/block-edit/text-shadow/utils.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   getShadowFromClassName: () => (/* binding */ getShadowFromClassName),
/* harmony export */   getShadows: () => (/* binding */ getShadows),
/* harmony export */   updateShadowClass: () => (/* binding */ updateShadowClass)
/* harmony export */ });
/* harmony import */ var _common_utils_classname__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../common/utils-classname */ "./resources/js/common/utils-classname.js");
/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./constants */ "./resources/js/block-edit/text-shadow/constants.js");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_4__);
/**
 * Utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.



// WordPress dependencies.




/**
 * @description Wraps the shadows in a filter hook and returns them.
 *
 * @returns {array}
 */
const getShadows = () => (0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_3__.applyFilters)('x3p0.ideas.blockEdit.textShadows', _constants__WEBPACK_IMPORTED_MODULE_1__.SHADOWS);

/**
 * @description Gets a text shadow value if it is included in a class.
 *
 * @param {string} className
 * @returns {string}
 */
const getShadowFromClassName = className => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_2___default())(className);
  const shadow = getShadows().find(option => list.contains(_constants__WEBPACK_IMPORTED_MODULE_1__.SHADOW_PREFIX + option.value));
  return undefined !== shadow ? shadow.value : '';
};

/**
 * @description Removes the previous shadow class and adds the new one.
 *
 * @param {string} className
 * @param {string} newShadow
 * @param {string} oldShadow
 * @returns {string}
 */
const updateShadowClass = (className, newShadow, oldShadow) => (0,_common_utils_classname__WEBPACK_IMPORTED_MODULE_0__.updateClass)(className, newShadow, oldShadow, _constants__WEBPACK_IMPORTED_MODULE_1__.SHADOW_PREFIX);

/***/ }),

/***/ "./resources/js/block-editor/index.js":
/*!********************************************!*\
  !*** ./resources/js/block-editor/index.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__);


/**
 * @description Returns the theme's default featured image size so that it's
 * rendered in the featured image component in the sidebar panel.
 * @returns {string}
 */
const withImageSize = () => 'x3p0-16x9-lg';
(0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_0__.addFilter)('editor.PostFeaturedImage.imageSize', 'x3p0/ideas/featured-image-size', withImageSize);

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

/***/ }),

/***/ "./resources/js/block-styles/const.js":
/*!********************************************!*\
  !*** ./resources/js/block-styles/const.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   BLOCK_STYLES: () => (/* binding */ BLOCK_STYLES)
/* harmony export */ });
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Constants for style variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.


/**
 * @description Houses all of our block style variations as objects and assigned
 * to their respective blocks. The key for the variation is its `name`, and the
 * value is its label.
 * @type {object}
 */
const BLOCK_STYLES = {
  'core/archives': {
    'horizontal': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Horizontal', 'x3p0-ideas')
  },
  'core/button': {
    'hand-drawn': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Hand Drawn', 'x3p0-ideas')
  },
  'core/categories': {
    'horizontal': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Horizontal', 'x3p0-ideas')
  },
  'core/columns': {
    'reverse-stack': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Reverse Mobile Stack', 'x3p0-ideas')
  },
  'core/comment-author-name': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/comment-date': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/comment-edit-link': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/comment-reply-link': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/cover': {
    'polygon-slant-down-sm': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Slant Down: Small', 'x3p0-ideas'),
    'polygon-slant-down-md': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Slant Down: Medium', 'x3p0-ideas'),
    'polygon-slant-up-sm': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Slant Up: Small', 'x3p0-ideas'),
    'polygon-slant-up-md': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Slant Up: Medium', 'x3p0-ideas'),
    'stretch': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Stretch', 'x3p0-ideas')
  },
  'core/footnotes': {
    'pull': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Pull', 'x3p0-ideas')
  },
  'core/gallery': {
    'classic': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Classic', 'x3p0-ideas')
  },
  'core/heading': {
    'clip-text': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Clip Text', 'x3p0-ideas'),
    'text-wrap-balance': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Wrap: Balance', 'x3p0-ideas')
  },
  'core/home-link': {
    'button': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Button', 'x3p0-ideas'),
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/image': {
    'borderless': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Borderless', 'x3p0-ideas'),
    'hand-drawn': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Hand-Drawn', 'x3p0-ideas'),
    'polaroid': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Polaroid', 'x3p0-ideas'),
    'tape': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Tape', 'x3p0-ideas'),
    'tape-corners': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Tape: Corners', 'x3p0-ideas')
  },
  'core/list': {
    'gap-snug': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Gap: Snug', 'x3p0-ideas'),
    'gap-normal': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Gap: Normal', 'x3p0-ideas'),
    'gap-relaxed': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Gap: Relaxed', 'x3p0-ideas'),
    'gap-loose': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Gap: Loose', 'x3p0-ideas'),
    'horizontal': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Horizontal', 'x3p0-ideas')
  },
  'core/loginout': {
    'button': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Button', 'x3p0-ideas'),
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/paragraph': {
    'indent': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Indent', 'x3p0-ideas'),
    'intro': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Intro', 'x3p0-ideas'),
    'lead-in': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Lead-in', 'x3p0-ideas'),
    'lede': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Lede', 'x3p0-ideas')
  },
  'core/post-author-name': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/post-comments-count': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/post-comments-form': {
    'icons': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icons', 'x3p0-ideas')
  },
  'core/post-comments-link': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/post-date': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/post-template': {
    'flex': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Flexible', 'x3p0-ideas'),
    'featured-col-span-all': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Featured: Full Width', 'x3p0-ideas')
  },
  'core/post-terms': {
    'button': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Button', 'x3p0-ideas'),
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/post-time-to-read': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas')
  },
  'core/pullquote': {
    'hand-drawn': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Hand Drawn', 'x3p0-ideas'),
    'mark-top': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Mark: Top', 'x3p0-ideas')
  },
  'core/search': {
    'icon': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Icon', 'x3p0-ideas'),
    'sm': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Small', 'x3p0-ideas')
  },
  'core/separator': {
    'dashed': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Dashed', 'x3p0-ideas'),
    'dotted': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Dotted', 'x3p0-ideas'),
    'double': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Double', 'x3p0-ideas'),
    'hand-drawn': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Hand Drawn', 'x3p0-ideas')
  },
  'core/social-links': {
    'hand-drawn': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Hand Drawn', 'x3p0-ideas'),
    'outline': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Outline', 'x3p0-ideas')
  },
  'core/site-title': {
    'normalize': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Normalize', 'x3p0-ideas')
  },
  'core/table-of-contents': {
    'chapters': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Chapters', 'x3p0-ideas'),
    'chapters-and-subs': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Chapters With Sub-headings', 'x3p0-ideas'),
    'marker-unordered': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Unordered', 'x3p0-ideas'),
    'pull': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Pull', 'x3p0-ideas')
  },
  'core/tag-cloud': {
    'flat': (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Flat', 'x3p0-ideas')
  }
};

/***/ }),

/***/ "./resources/js/block-styles/index.js":
/*!********************************************!*\
  !*** ./resources/js/block-styles/index.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _const__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./const */ "./resources/js/block-styles/const.js");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/dom-ready */ "@wordpress/dom-ready");
/* harmony import */ var _wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__);
/**
 * Registers block styles.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.



// Registers the block style variations when the DOM is ready.
_wordpress_dom_ready__WEBPACK_IMPORTED_MODULE_1___default()(() => {
  // Remove core block styles.
  (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__.unregisterBlockStyle)('core/separator', 'dots');

  // Loop through each of the blocks to get its style variations. Then,
  // loop through the variations and register them.
  Object.keys(_const__WEBPACK_IMPORTED_MODULE_0__.BLOCK_STYLES).forEach(block => Object.keys(_const__WEBPACK_IMPORTED_MODULE_0__.BLOCK_STYLES[block]).forEach(name => (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_2__.registerBlockStyle)(block, {
    name,
    label: _const__WEBPACK_IMPORTED_MODULE_0__.BLOCK_STYLES[block][name]
  })));
});

/***/ }),

/***/ "./resources/js/block-variations/index.js":
/*!************************************************!*\
  !*** ./resources/js/block-variations/index.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Registers block variations.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.



// Registers the theme spacer as the default so that---with any luck---users
// will choose the theme spacing sizes over custom sizes. Note that there is
// currently no way to set the default spacer size via `theme.json` nor is there
// a way to disable custom spacing sizes.
(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockVariation)('core/spacer', {
  name: 'x3p0/theme-spacer',
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_0__.__)('Spacer', 'x3p0-ideas'),
  isDefault: true,
  keywords: ['space', 'spacer', 'spacing'],
  attributes: {
    height: 'var:preset|spacing|plus-3'
  },
  isActive: blockAttributes => blockAttributes.height && blockAttributes.height.includes('var:preset|spacing|')
});

/***/ }),

/***/ "./resources/js/common/utils-classname.js":
/*!************************************************!*\
  !*** ./resources/js/common/utils-classname.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   updateClass: () => (/* binding */ updateClass)
/* harmony export */ });
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/token-list */ "@wordpress/token-list");
/* harmony import */ var _wordpress_token_list__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_token_list__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Common utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.


/**
 * @description Removes the previous style class and adds the new one.
 *
 * @param {string} className
 * @param {string} newClass
 * @param {string} oldClass
 * @param {string} prefix
 * @param {string} suffix
 * @returns string
 *
 * @example
 * const className = 'prefix-bar-suffix';
 * const newClass = updateClass( className, 'foo', 'bar', 'prefix-', '-suffix' );
 * // returns: 'prefix-foo-suffix
 */
const updateClass = (className, newClass = '', oldClass = '', prefix = '', suffix = '') => {
  const list = new (_wordpress_token_list__WEBPACK_IMPORTED_MODULE_0___default())(className);
  if (oldClass) {
    list.remove(prefix + oldClass + suffix);
  }
  if (newClass) {
    list.add(prefix + newClass + suffix);
  }
  return list.value;
};

/***/ }),

/***/ "./resources/js/common/utils-gradient.js":
/*!***********************************************!*\
  !*** ./resources/js/common/utils-gradient.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   gradientAttribute: () => (/* binding */ gradientAttribute),
/* harmony export */   gradientSetting: () => (/* binding */ gradientSetting),
/* harmony export */   gradientSlug: () => (/* binding */ gradientSlug),
/* harmony export */   gradientStyle: () => (/* binding */ gradientStyle)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/**
 * Gradient utility functions.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// WordPress dependencies.


/**
 * Formats a gradient value as a preset string if the preset exists. Otherwise,
 * returns the original gradient value.
 */
const gradientAttribute = (value, gradients) => {
  const slug = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.getGradientSlugByValue)(gradients, value);
  return slug ? `var:preset|gradient|${slug}` : value;
};

/**
 * Returns a gradient preset slug if a preset string is given. Otherwise, null.
 */
const gradientSlug = gradient => {
  return gradient && gradient.startsWith('var:preset|gradient|') ? gradient.replace('var:preset|gradient|', '') : null;
};

/**
 * Returns a gradient CSS value. First checks to see if a preset slug is given.
 */
const gradientSetting = (gradient, gradients) => {
  const slug = gradientSlug(gradient);
  if (slug) {
    const value = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.getGradientValueBySlug)(gradients, slug);
    return undefined === value ? gradient : value;
  }
  return gradient;
};

/**
 * Returns a gradient CSS value. Uses a CSS variable if the gradient is a preset.
 */
const gradientStyle = gradient => {
  const slug = gradientSlug(gradient);
  return slug ? `var(--wp--preset--gradient--${slug})` : gradient;
};

/***/ }),

/***/ "./resources/js/common/utils-icon.js":
/*!*******************************************!*\
  !*** ./resources/js/common/utils-icon.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   abbreviationIcon: () => (/* binding */ abbreviationIcon),
/* harmony export */   delIcon: () => (/* binding */ delIcon),
/* harmony export */   insertIcon: () => (/* binding */ insertIcon),
/* harmony export */   markIcon: () => (/* binding */ markIcon),
/* harmony export */   markerIcon: () => (/* binding */ markerIcon),
/* harmony export */   overlineIcon: () => (/* binding */ overlineIcon)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

/**
 * Icons library.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// https://fonts.google.com/icons?icon.query=list&selected=Material+Symbols+Outlined:list_alt:FILL@0;wght@300;GRAD@-25;opsz@24
const markerIcon = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  height: "24",
  viewBox: "0 -960 960 960",
  width: "24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M324.758-294.578q13.934 0 23.684-9.68 9.75-9.681 9.75-23.615 0-13.935-9.777-23.685-9.777-9.75-23.711-9.75-13.935 0-23.588 9.777-9.654 9.777-9.654 23.712 0 13.934 9.681 23.588 9.68 9.653 23.615 9.653Zm0-152.153q13.934 0 23.684-9.681 9.75-9.681 9.75-23.615t-9.777-23.684q-9.777-9.75-23.711-9.75-13.935 0-23.588 9.777-9.654 9.777-9.654 23.711t9.681 23.588q9.68 9.654 23.615 9.654Zm0-152.961q13.934 0 23.684-9.681 9.75-9.681 9.75-23.615 0-13.935-9.777-23.685-9.777-9.749-23.711-9.749-13.935 0-23.588 9.776-9.654 9.777-9.654 23.712 0 13.934 9.681 23.588 9.68 9.654 23.615 9.654Zm119.896 300.229h222.845v-55.96H444.654v55.96Zm0-152.961h222.845v-55.96H444.654v55.96Zm0-152.153h222.845v-55.96H444.654v55.96ZM215.448-147.271q-28.346 0-48.262-19.915-19.915-19.916-19.915-48.262v-529.104q0-28.346 19.915-48.262 19.916-19.915 48.262-19.915h529.104q28.346 0 48.262 19.915 19.915 19.916 19.915 48.262v529.104q0 28.346-19.915 48.262-19.916 19.915-48.262 19.915H215.448Zm.091-55.96h528.922q4.615 0 8.462-3.846 3.846-3.847 3.846-8.462v-528.922q0-4.615-3.846-8.462-3.847-3.846-8.462-3.846H215.539q-4.615 0-8.462 3.846-3.846 3.847-3.846 8.462v528.922q0 4.615 3.846 8.462 3.847 3.846 8.462 3.846Zm-12.308-553.538v553.538-553.538Z"
}));

//https://fonts.google.com/icons?icon.query=short&selected=Material+Symbols+Outlined:short_text:FILL@0;wght@200;GRAD@-25;opsz@24
const abbreviationIcon = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  height: "24",
  viewBox: "0 -960 960 960",
  width: "24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M184.192-384.923v-36.923h353.847v36.923H184.192Zm0-153.846v-36.923h592v36.923h-592Z"
}));

// https://fonts.google.com/icons?icon.query=slash&selected=Material+Symbols+Outlined:format_clear:FILL@0;wght@200;GRAD@-25;opsz@24
const delIcon = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  height: "24",
  viewBox: "0 -960 960 960",
  width: "24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "m499.269-560.154-33.308-33.308 34.731-84.653H379.654l-44.423-44.039h426.923v44.308H549.077l-49.808 117.692Zm272.923 424.77L454.5-453.846l-92.923 219.077h-48.539l107.885-252.654L127.077-780.5l26.461-25.962 644.616 644.616-25.962 26.462Z"
}));
const insertIcon = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  height: "24",
  viewBox: "0 -960 960 960",
  width: "24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M215.539-148.078q-28.257 0-48.263-20.006-20.005-20.006-20.005-48.263v-528.114q0-28.257 20.005-48.263 20.006-20.005 48.263-20.005h528.922q28.257 0 48.263 20.005 20.005 20.006 20.005 48.263v251.692q-13.641-5.694-27.647-9.732-14.005-4.037-28.313-6.653v-235.307q0-4.615-3.846-8.462-3.847-3.846-8.462-3.846H215.539q-4.615 0-8.462 3.846-3.846 3.847-3.846 8.462v528.114q0 4.616 3.846 8.462 3.847 3.847 8.462 3.847h239.094q2.29 15.307 6.527 29.196 4.237 13.889 10.532 26.764H215.539Zm-12.308-98.383v42.423-552.731 247.547-2.932 265.693Zm90.808-53.002h163.626q2.605-14.307 7.105-28.249 4.499-13.942 10.576-27.711H294.039v55.96Zm0-152.961h257.347q23.423-19.192 49.653-32.383 26.23-13.192 56.46-19.423v-4.154h-363.46v55.96Zm0-152.961h371.922v-55.96H294.039v55.96ZM717.631-69.809q-72.553 0-123.476-50.868-50.923-50.869-50.923-123.422 0-72.554 50.869-123.477 50.868-50.922 123.422-50.922 72.553 0 123.476 50.868 50.923 50.869 50.923 123.422 0 72.554-50.869 123.477-50.868 50.922-123.422 50.922Zm-16.938-58.268h34.576v-99.192h99.192v-33.769h-99.192v-99.192h-34.576v99.192H601.5v33.769h99.193v99.192Z"
}));

// https://fonts.google.com/icons?icon.query=highlight&selected=Material+Symbols+Outlined:format_ink_highlighter:FILL@0;wght@300;GRAD@-25;opsz@24
const markIcon = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  height: "24",
  viewBox: "0 -960 960 960",
  width: "24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M84.846-6.961v-111.921h790.308v111.92H84.846Zm467.038-450L449.499-559.346 301.192-410.038q-3.654 3.461-3.654 8.462 0 5 3.654 8.462l85.152 84.653q3.462 3.461 8.463 3.461 5 0 8.462-3.461l148.615-148.5Zm-62.347-142.115 102.077 102.269 187.731-187.615q3.462-3.462 3.462-8.751t-3.462-8.943l-84.999-84.999q-3.654-3.462-8.943-3.462-5.288 0-8.75 3.462L489.537-599.076Zm-59.691-20.076 181.537 181.536-168.077 168.192q-20.577 20.577-49.153 20.577-28.577 0-49.154-20.577l-4.962-4.962-37.423 36.578h-145.69l109.961-110.653-4.192-4.385q-20.577-20.384-20.789-49.173-.211-28.788 20.366-49.365l167.576-167.768Zm0 0 209.077-208.885q19.884-20.077 48-19.673 28.115.404 47.692 20.481l84.652 85.152q20.077 20.577 20.077 48.596 0 28.019-20.077 48.096L611.383-437.616 429.846-619.152Z"
}));
const overlineIcon = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  height: "24",
  viewBox: "0 -960 960 960",
  width: "24"
}, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("path", {
  d: "M216.27-772.116v-55.96h527.46v55.96H216.27ZM480.023-136.27q-110.192 0-186.972-76.758-76.781-76.757-76.781-186.949 0-110.192 76.758-186.972 76.757-76.781 186.949-76.781 110.192 0 186.972 76.758 76.781 76.757 76.781 186.949 0 110.192-76.758 186.972-76.757 76.781-186.949 76.781ZM480-203.73q81.635 0 138.953-57.317Q676.27-318.365 676.27-400t-57.317-138.953Q561.635-596.27 480-596.27t-138.953 57.317Q283.73-481.635 283.73-400t57.317 138.953Q398.365-203.73 480-203.73Z"
}));

/***/ }),

/***/ "./resources/js/format-library/abbreviation/index.js":
/*!***********************************************************!*\
  !*** ./resources/js/format-library/abbreviation/index.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common/utils-icon */ "./resources/js/common/utils-icon.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_5__);

/**
 * Creates the abbreviation RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.






/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/abbr';

/**
 * @description RichText format type definition.
 * @type {object}
 */
const abbreviationFormat = {
  name,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Abbreviation', 'x3p0-ideas'),
  tagName: 'abbr',
  className: null,
  edit: Edit
};

/**
 * @description RichText format type definition.
 * @type {object}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (abbreviationFormat);

/**
 * @description Creates the format type edit component.
 */
function Edit({
  isActive,
  onChange,
  value,
  contentRef
}) {
  const [isPopoverVisible, setIsPopoverVisible] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)(false);
  const togglePopover = () => setIsPopoverVisible(state => !state);
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichTextToolbarButton, {
    icon: _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__.abbreviationIcon,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Abbreviation', 'x3p0-ideas'),
    isActive: isActive,
    onClick: () => isActive ? onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_5__.removeFormat)(value, name)) : togglePopover()
  }), isPopoverVisible && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(AbbrTitlePopover, {
    value: value,
    onChange: onChange,
    onClose: togglePopover,
    contentRef: contentRef
  }));
}
;

/**
 * @description Creates the popover component.
 */
function AbbrTitlePopover({
  value,
  contentRef,
  onChange,
  onClose
}) {
  const popoverAnchor = (0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_5__.useAnchor)({
    editableContentElement: contentRef.current,
    settings: abbreviationFormat
  });
  const [title, setTitle] = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.useState)('');
  const titleTextControl = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.TextControl, {
    label: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Add title for abbreviation', 'x3p0-ideas'),
    value: title,
    onChange: val => setTitle(val),
    help: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Expand on the definition for the abbreviation when a full description is not present in the content.', 'x3p0-ideas')
  });
  const popoverForm = (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("form", {
    className: "x3p0-format-abbr-popover__form",
    onSubmit: event => {
      event.preventDefault();
      onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_5__.applyFormat)(value, {
        type: name,
        attributes: {
          title
        }
      }));
      onClose();
    }
  }, titleTextControl);
  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_4__.Popover, {
    className: "x3p0-format-abbr-popover",
    anchor: popoverAnchor,
    placement: "top",
    onClose: onClose,
    variant: "toolbar"
  }, popoverForm);
}
;

/***/ }),

/***/ "./resources/js/format-library/delete/index.js":
/*!*****************************************************!*\
  !*** ./resources/js/format-library/delete/index.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common/utils-icon */ "./resources/js/common/utils-icon.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__);

/**
 * Creates the delete RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.




/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/del';

/**
 * @description RichText format type definition.
 * @type {object}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Delete', 'x3p0-ideas'),
  tagName: 'del',
  className: null,
  edit: ({
    isActive,
    onChange,
    value
  }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichTextToolbarButton, {
    icon: _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__.delIcon,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Delete', 'x3p0-ideas'),
    isActive: isActive,
    onClick: () => onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__.toggleFormat)(value, {
      type: name
    }))
  })
});

/***/ }),

/***/ "./resources/js/format-library/format-types.js":
/*!*****************************************************!*\
  !*** ./resources/js/format-library/format-types.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _abbreviation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./abbreviation */ "./resources/js/format-library/abbreviation/index.js");
/* harmony import */ var _delete__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./delete */ "./resources/js/format-library/delete/index.js");
/* harmony import */ var _insert__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./insert */ "./resources/js/format-library/insert/index.js");
/* harmony import */ var _mark__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./mark */ "./resources/js/format-library/mark/index.js");
/* harmony import */ var _overline__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./overline */ "./resources/js/format-library/overline/index.js");
/**
 * Exports the RichText format types.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */







/**
 * @description Array of RichText format type objects.
 * @type {array}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([_abbreviation__WEBPACK_IMPORTED_MODULE_0__["default"], _delete__WEBPACK_IMPORTED_MODULE_1__["default"], _insert__WEBPACK_IMPORTED_MODULE_2__["default"], _mark__WEBPACK_IMPORTED_MODULE_3__["default"], _overline__WEBPACK_IMPORTED_MODULE_4__["default"]]);

/***/ }),

/***/ "./resources/js/format-library/index.js":
/*!**********************************************!*\
  !*** ./resources/js/format-library/index.js ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _format_types__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./format-types */ "./resources/js/format-library/format-types.js");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_1__);
/**
 * Registers the RichText format types
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.


// Register each `RichText` format type.
_format_types__WEBPACK_IMPORTED_MODULE_0__["default"].forEach(({
  name,
  ...settings
}) => (0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_1__.registerFormatType)(name, settings));

/***/ }),

/***/ "./resources/js/format-library/insert/index.js":
/*!*****************************************************!*\
  !*** ./resources/js/format-library/insert/index.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common/utils-icon */ "./resources/js/common/utils-icon.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__);

/**
 * Creates the insert RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.




/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/ins';

/**
 * @description RichText format type definition.
 * @type {object}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Insert', 'x3p0-ideas'),
  tagName: 'ins',
  className: null,
  edit: ({
    isActive,
    onChange,
    value
  }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichTextToolbarButton, {
    icon: _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__.insertIcon,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Insert', 'x3p0-ideas'),
    isActive: isActive,
    onClick: () => onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__.toggleFormat)(value, {
      type: name
    }))
  })
});

/***/ }),

/***/ "./resources/js/format-library/mark/index.js":
/*!***************************************************!*\
  !*** ./resources/js/format-library/mark/index.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common/utils-icon */ "./resources/js/common/utils-icon.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__);

/**
 * Creates the mark RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.




/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/mark';

/**
 * @description RichText format type definition.
 * @type {object}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Mark', 'x3p0-ideas'),
  tagName: 'mark',
  className: null,
  edit: ({
    isActive,
    onChange,
    value
  }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichTextToolbarButton, {
    icon: _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__.markIcon,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Mark', 'x3p0-ideas'),
    isActive: isActive,
    onClick: () => onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__.toggleFormat)(value, {
      type: name
    }))
  })
});

/***/ }),

/***/ "./resources/js/format-library/overline/index.js":
/*!*******************************************************!*\
  !*** ./resources/js/format-library/overline/index.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../common/utils-icon */ "./resources/js/common/utils-icon.js");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/i18n */ "@wordpress/i18n");
/* harmony import */ var _wordpress_i18n__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/rich-text */ "@wordpress/rich-text");
/* harmony import */ var _wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__);

/**
 * Creates the overline RichText format type.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Internal dependencies.


// WordPress dependencies.




/**
 * @description Name of the format.
 * @type {string}
 */
const name = 'x3p0/overline';

/**
 * @description RichText format type definition.
 * @type {object}
 */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name,
  title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Overline', 'x3p0-ideas'),
  tagName: 'span',
  className: 'has-overline',
  edit: ({
    isActive,
    onChange,
    value
  }) => (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichTextToolbarButton, {
    icon: _common_utils_icon__WEBPACK_IMPORTED_MODULE_1__.overlineIcon,
    title: (0,_wordpress_i18n__WEBPACK_IMPORTED_MODULE_3__.__)('Overline', 'x3p0-ideas'),
    isActive: isActive,
    onClick: () => onChange((0,_wordpress_rich_text__WEBPACK_IMPORTED_MODULE_4__.toggleFormat)(value, {
      type: name
    }))
  })
});

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/dom-ready":
/*!**********************************!*\
  !*** external ["wp","domReady"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["domReady"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/hooks":
/*!*******************************!*\
  !*** external ["wp","hooks"] ***!
  \*******************************/
/***/ ((module) => {

module.exports = window["wp"]["hooks"];

/***/ }),

/***/ "@wordpress/i18n":
/*!******************************!*\
  !*** external ["wp","i18n"] ***!
  \******************************/
/***/ ((module) => {

module.exports = window["wp"]["i18n"];

/***/ }),

/***/ "@wordpress/primitives":
/*!************************************!*\
  !*** external ["wp","primitives"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["primitives"];

/***/ }),

/***/ "@wordpress/rich-text":
/*!**********************************!*\
  !*** external ["wp","richText"] ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["wp"]["richText"];

/***/ }),

/***/ "@wordpress/token-list":
/*!***********************************!*\
  !*** external ["wp","tokenList"] ***!
  \***********************************/
/***/ ((module) => {

module.exports = window["wp"]["tokenList"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!********************************!*\
  !*** ./resources/js/editor.js ***!
  \********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./block-editor */ "./resources/js/block-editor/index.js");
/* harmony import */ var _block_edit__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./block-edit */ "./resources/js/block-edit/index.js");
/* harmony import */ var _block_styles__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./block-styles */ "./resources/js/block-styles/index.js");
/* harmony import */ var _block_variations__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./block-variations */ "./resources/js/block-variations/index.js");
/* harmony import */ var _format_library__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./format-library */ "./resources/js/format-library/index.js");
/**
 * Primary editor script. Imports all of the various features so that they can
 * be bundled into a final file during the build process.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

// Import all the cool editor features from the theme.





})();

/******/ })()
;
//# sourceMappingURL=editor.js.map