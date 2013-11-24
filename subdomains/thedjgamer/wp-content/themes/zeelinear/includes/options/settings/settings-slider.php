<?php
	
	function themezee_sections_slider() {
		$themezee_sections = array();
					
		$themezee_sections[] = array("id" => "themeZee_slider_activate",
					"name" => __('Activate Post Slider', 'zeeLinear_language'));
					
		$themezee_sections[] = array("id" => "themeZee_slider_settings",
					"name" => __('Post Slider Settings', 'zeeLinear_language'));
					
		$themezee_sections[] = array("id" => "themeZee_slider_content",
					"name" => __('Post Slider Content', 'zeeLinear_language'));

		return $themezee_sections;
	}
	
	function themezee_settings_slider() {
		
		// Create Categories Array
		$categories = array();
		$categories[''] = 'All Categories';
		$cats = get_categories(); 
		foreach ($cats as $cat) {
			$categories[$cat->category_nicename] = $cat->cat_name;
		}
	
		
		### Activate Post Slider
		#######################################################################################
		$themezee_settings[] = array("name" => __('Show Post Slider?', 'zeeLinear_language'),
						"desc" => __('Check this to activate the Featured Post Slideshow displayed on the front page.', 'zeeLinear_language'),
						"id" => "themeZee_frontpage_slider_active",
						"std" => "false",
						"type" => "checkbox",
						"section" => "themeZee_slider_activate");
						
		### Slider Settings
		#######################################################################################
						
		$themezee_settings[] = array("name" => __('Slider Title', 'zeeLinear_language'),
						"desc" => __('Enter your headline which is displayed above the featured post slideshow here.', 'zeeLinear_language'),
						"id" => "themeZee_frontpage_slider_title",
						"std" => "Featured Posts",
						"type" => "text",
						"section" => "themeZee_slider_settings");
						
		$themezee_settings[] = array("name" => __('Slider Animation', 'zeeLinear_language'),
						"desc" => "",
						"id" => "themeZee_frontpage_slider_animation",
						"std" => "slide",
						"type" => "radio",
						'choices' => array(
									'slide' => __('Horizontal Slider', 'zeeLinear_language'),
									'fade' => __('Fade Slider', 'zeeLinear_language')),
						"section" => "themeZee_slider_settings"
						);
									
		$themezee_settings[] = array("name" => __('Slider Speed', 'zeeLinear_language'),
						"desc" => __('Enter the speed of the slideshow cycling (timeout between slides), in milliseconds.', 'zeeLinear_language'),
						"id" => "themeZee_frontpage_slider_speed",
						"std" => "7000",
						"type" => "text",
						"section" => "themeZee_slider_settings");
						
		### Slider Content
		#######################################################################################
						
		$themezee_settings[] = array("name" => __('Slider Content', 'zeeLinear_language'),
						"desc" => "",
						"id" => "themeZee_frontpage_slider_content",
						"std" => "recent",
						"type" => "radio",
						'choices' => array(
									'recent' => __('Show recent posts', 'zeeLinear_language'),
									'popular' => __('Show popular posts', 'zeeLinear_language')),
						"section" => "themeZee_slider_content");
						
		$themezee_settings[] = array("name" => __('Slider Category', 'zeeLinear_language'),
						"desc" => __("Select a category which posts are displayed at the featured posts slider .", 'zeeLinear_language'),
						"id" => "themeZee_frontpage_slider_category",
						"std" => "",
						"type" => "select",
						'choices' => $categories,
						"section" => "themeZee_slider_content");

		$themezee_settings[] = array("name" => __('Number of Posts', 'zeeLinear_language'),
						"desc" => __('Enter the number how much posts should be displayed in the post slider.', 'zeeLinear_language'),
						"id" => "themeZee_frontpage_slider_limit",
						"std" => "5",
						"type" => "text",
						"section" => "themeZee_slider_content");
		
		return $themezee_settings;
	}

?>