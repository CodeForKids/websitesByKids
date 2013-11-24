/*! jQuery slider.js
  Setup of the Frontpage Slider based on the FlexSlider plugin (jquery.flexslider-min.js)
  Author: Thomas W (themezee.com)
*/
jQuery(document).ready(function($) {

	/* Add flexslider to #frontpage-slider div */ 
	$("#frontpage-slider").flexslider({
		animation: customSliderParams.animation,
		slideshowSpeed: customSliderParams.speed,
		namespace: "zeeflex-",
		selector: ".zeeslides > li",
		smoothHeight: true,
		controlsContainer: ".frontpage-slide-keys",
		controlNav: false
	});
});