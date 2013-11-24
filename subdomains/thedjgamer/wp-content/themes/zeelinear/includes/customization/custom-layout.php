<?php 
add_action('wp_head', 'themezee_css_layout');
function themezee_css_layout() {
	
	echo '<style type="text/css">';
	$options = get_option('zeelinear_options');
	
	// Add Custom CSS
	if ( isset($options['themeZee_general_css']) and $options['themeZee_general_css'] <> '' ) {
		echo wp_kses_post($options['themeZee_general_css']);
	}
	
	echo '</style>';
}