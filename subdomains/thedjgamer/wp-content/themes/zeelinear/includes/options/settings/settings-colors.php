<?php
	
	function themezee_sections_colors() {
		$themezee_sections = array();
		
		$themezee_sections[] = array("id" => "themeZee_colors_schemes",
					"name" => __('Predefined Color Schemes', 'zeeLinear_language'));
		
		return $themezee_sections;
	}
	
	function themezee_settings_colors() {
	
		$color_schemes = array(
			'#151515' => __('Black', 'zeeLinear_language'),
			'#1562a5' => __('Blue', 'zeeLinear_language'),
			'#725639' => __('Brown', 'zeeLinear_language'),
			'#2d912e' => __('Green', 'zeeLinear_language'),
			'#e34c00' => __('Orange', 'zeeLinear_language'),
			'#9215a5' => __('Purple', 'zeeLinear_language'),
			'#dd3333' => __('Red', 'zeeLinear_language'),
			'#009b91' =>  __('Teal', 'zeeLinear_language'),
			'default' => __('Standard', 'zeeLinear_language'));
		
		$themezee_settings = array();
	
		### COLOR SETTINGS
		#######################################################################################
							
		$themezee_settings[] = array("name" => __('Set Color Scheme', 'zeeLinear_language'),
						"desc" => __('Please select your color scheme here.', 'zeeLinear_language'),
						"id" => "themeZee_color_scheme",
						"std" => "default",
						"type" => "select",
						'choices' => $color_schemes,
						"section" => "themeZee_colors_schemes"
						);
						
		return $themezee_settings;
	}

?>