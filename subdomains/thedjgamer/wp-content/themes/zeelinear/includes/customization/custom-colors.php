<?php
/***
 * Custom Color Options
 *
 * Get custom colors from theme options and embed CSS color settings 
 * in the <head> area of the theme. 
 *
 */


// Add Custom Colors
add_action('wp_head', 'themezee_custom_colors');
function themezee_custom_colors() { 
	
	// Get Theme Options
	$options = get_option('zeelinear_options');
	
	// Get Color Scheme and set color scheme to default if nothing is selected)
	$color_scheme = $options['themeZee_color_scheme'] <> '' ? esc_attr($options['themeZee_color_scheme']) : 'default';
	
	$link_color = $color_scheme;
	$navi_color = '#333333';
	$footer_color = '#333333';
	$post_title_color = $color_scheme;
	$post_title_format = $color_scheme;
	$post_button_color = $color_scheme;
	$sidebar_button_color = $color_scheme;
	$sidebar_link_color = $color_scheme;
	
	// Set CSS settings except color scheme is default (=> default colors are already defined in style.css)
	if( $color_scheme <> 'default') :
	
		$color_css = '<style type="text/css">';
		$color_css .= '
			a, a:link, a:visited, .comment a:link, .comment a:visited, .wp-pagenavi .current {
				color: '. $link_color .';
			}
			#mainnav, #mainnav-menu ul, #mainnav-icon, #header-widgets-icon {
				background-color: '. $navi_color .';
			}
			#mainnav-menu ul ul{
				border-left: 1px solid '. $navi_color .';
				border-top: 1px solid '. $navi_color .';
			}
			#footer-widgets, #footer {
				background-color: '. $footer_color .';
			}
			#logo a .site-title, .post-title, .post-title a:link, .post-title a:visited, 
			.small-title a:link, .small-title a:visited {
				color: '. $post_title_color .';
			}
			.type-post .post-body, .type-post .postmeta .post-format-icon, .format-link .post-content .entry a {
				background-color: '. $post_title_format .';
			}
			.more-link span, .read-more span, #commentform #submit, .format-link .post-content .entry a, 
			#frontpage-slider-head .frontpage-slide-keys a, #image-nav .nav-previous a, #image-nav .nav-next a {
				background-color: '. $post_button_color .';
			}
			#header-widgets-icon:before {
				background-color: '. $sidebar_button_color .';
			}
			#header-widgets a:link, #header-widgets a:visited {
				color: '. $sidebar_link_color .';
			}
			.widget-tabnav li a {  
				background-color: '. $sidebar_link_color .';
			}
			
			@media only screen and (max-width: 60em) {
				#mainnav-menu, #mainnav-menu a:hover {
					background-color: '. $navi_color .';
				}
				#mainnav-menu ul a {
					border-bottom: 1px solid '. $navi_color .';
				}
			}
			@media only screen and (max-width: 50em) {
				.type-post .post-format {
					background-color: '. $post_title_format .';
				}
			}
		';
		$color_css .= '</style>';
		
		// Print Color CSS
		echo $color_css;
	
	endif;
}