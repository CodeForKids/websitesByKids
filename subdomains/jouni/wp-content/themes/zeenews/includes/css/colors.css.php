<?php 
add_action('wp_head', 'themezee_css_colors');
function themezee_css_colors() {
	
	$options = get_option('themezee_options');
	
	if ( isset($options['themeZee_color_activate']) and $options['themeZee_color_activate'] == 'true' ) {
		
		echo '<style type="text/css">';
		echo '
			a, a:link, a:visited, .comment a:link, .comment a:visited, .wp-pagenavi a, #sidebar .widgettitle,
			#sidebar a:link, #sidebar a:visited, .post-title, .post-title a:link, .post-title a:visited, 
			#respond h3, .bypostauthor .fn
			{
				color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			.wp-pagenavi .current, #header, #foot_wrap
			{
				background-color: #'.esc_attr($options['themeZee_colors_full']).';
			}
			.sticky {
				border-left: 2px solid #'.esc_attr($options['themeZee_colors_full']).';
			}
		';
		echo '</style>';
	}
}