<?php
	
	function themezee_sections_general() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_general_header",
					"name" => __('Header Settings', 'zeeLinear_language'));
					
		$themezee_sections[] = array("id" => "themeZee_general_layout",
					"name" => __('Layout Settings', 'zeeLinear_language'));
					
		$themezee_sections[] = array("id" => "themeZee_general_css_section",
					"name" => __('Custom CSS Code', 'zeeLinear_language'));
					
		return $themezee_sections;
	}
	
	function themezee_settings_general() {

		$themezee_settings = array();
	
		### HEADER SETTINGS
		#######################################################################################
		$themezee_settings[] = array("name" => __('Logo Image', 'zeeLinear_language'),
						"desc" => __('Paste the full Image URL of your logo or click Upload Image. Leave this field blank to display the site title instead of a logo image.', 'zeeLinear_language'),
						"id" => "themeZee_general_logo",
						"std" => "",
						"type" => "image",
						"section" => "themeZee_general_header");

		$themezee_settings[] = array("name" => __('Show Tagline?', 'zeeLinear_language'),
						"desc" => __('Check this if you want to show your tagline(blog description) below the logo', 'zeeLinear_language'),
						"id" => "themeZee_general_tagline",
						"std" => "true",
						"type" => "checkbox",
						"section" => "themeZee_general_header");
						
		### LAYOUT SETTINGS
		#######################################################################################				
						
		$themezee_settings[] = array("name" => __('Show Author Box?', 'zeeLinear_language'),
						"desc" => __('Check this if you want to show an author box (with author description, avatar and website) below single posts.', 'zeeLinear_language'),
						"id" => "themeZee_show_author_box",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_general_layout");
						
		$themezee_settings[] = array("name" => __('Footer Content', 'zeeLinear_language'),
						"desc" => __('Enter the content which is displayed in the footer here.', 'zeeLinear_language'),
						"id" => "themeZee_general_footer",
						"std" => "Place your Footer Content here",
						"type" => "html",
						"section" => "themeZee_general_layout");
						
		### CUSTOM CSS
		#######################################################################################					
		$themezee_settings[] = array("name" => __('Custom CSS', 'zeeLinear_language'),
						"desc" => __('Place your Custom CSS code here.', 'zeeLinear_language'),
						"id" => "themeZee_general_css",
						"std" => "",
						"type" => "textarea",
						"section" => "themeZee_general_css_section");
										
		return $themezee_settings;
	}

?>