(self["webpackChunkoc_bootstrap_theme"] = self["webpackChunkoc_bootstrap_theme"] || []).push([["/js/app"],{

/***/ "./assets/src/js/app.js":
/*!******************************!*\
  !*** ./assets/src/js/app.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/**
 * Bootstrap - Starter Kit
 *
 * @author Prismify
 * @version 1.0.6
 */

window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! @popperjs/core */ "./node_modules/@popperjs/core/lib/index.js");
__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.esm.js");
// require('more-packages-installed-with-npm-install');

$(function () {
  "use strict";

  // Helpers
  // require('.abstracts/more-abstracts');

  // Components
  // require('./components/more-components');
  // Initiate the wowjs
  // Sticky Navbar
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".sticky-top").addClass("shadow-sm").css("top", "0px");
    } else {
      $(".sticky-top").removeClass("shadow-sm").css("top", "-150px");
    }
  });
});

/***/ }),

/***/ "./assets/src/scss/app.scss":
/*!**********************************!*\
  !*** ./assets/src/scss/app.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["css/app","/js/vendor"], () => (__webpack_exec__("./assets/src/js/app.js"), __webpack_exec__("./assets/src/scss/app.scss")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);