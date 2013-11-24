<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php /* Embeds HTML5shiv to support HTML5 elements in older IE versions. */ ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php themezee_wrapper_before(); // hook before #wrapper ?>
<div id="wrapper" class="hfeed">
	
	<?php themezee_header_before(); // hook before #header ?>
	<header id="header" class="clearfix" role="banner">
		
		<nav id="mainnav" role="navigation" class="clearfix">
			<?php // Display Navigation from WordPress Custom Menus
				wp_nav_menu(array('theme_location' => 'main_navi', 'container' => false, 'menu_id' => 'mainnav-menu', 'echo' => true, 'fallback_cb' => 'themezee_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
			?>
		</nav>
		
		<div id="logo">
		
		<?php // Display Site Title or Logo
			themezee_display_logo(); ?>
			
		<?php // Display Site Description (Tagline)
		$options = get_option('zeelinear_options');
		if(isset($options['themeZee_general_tagline']) and $options['themeZee_general_tagline'] == 'true') : ?>
			<h2 class="site-description""><?php echo bloginfo('description'); ?></h2>
		<?php endif; ?>
		
		</div>

	</header>
	<?php themezee_header_after(); // hook after #header ?>

	<?php // Display Custom Header Image
		themezee_display_custom_header(); ?>
	
	<?php get_sidebar(); ?>
	
	<?php // Show Featured Post Slider if option is checked
	if(is_front_page() and isset($options['themeZee_frontpage_slider_active']) and $options['themeZee_frontpage_slider_active'] == 'true' ) :
		themezee_display_frontpage_slideshow();
	endif;
	?>