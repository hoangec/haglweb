/**
 * Bootstrap - Starter Kit
 *
 * @author Prismify
 * @version 1.0.6
 */

window.$ = window.jQuery = require("jquery");
require("@popperjs/core");
require("bootstrap");
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
