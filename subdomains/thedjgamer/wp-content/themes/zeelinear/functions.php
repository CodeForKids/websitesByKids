<?php

// Set Content Width
if ( ! isset( $content_width ) )
	$content_width = 450;

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'themezee_enqueue_scripts');

if ( ! function_exists( 'themezee_enqueue_scripts' ) ):
function themezee_enqueue_scripts() { 
	
	// Register and Enqueue Stylesheet
	wp_register_style('themezee_zeeLinear_stylesheet', get_stylesheet_uri());
	wp_enqueue_style('themezee_zeeLinear_stylesheet');

	// Register Genericons
	wp_register_style('themezee_zeeLinear_genericons', get_template_directory_uri() . '/css/genericons.css');
	wp_enqueue_style('themezee_zeeLinear_genericons');
	
	// Enqueue jQuery Framework
	wp_enqueue_script('jquery');
	
	// Register and Enqueue FlexSlider JS and CSS if necessary
	$options = get_option('zeelinear_options');
	if(isset($options['themeZee_frontpage_slider_active']) and $options['themeZee_frontpage_slider_active'] == 'true' ) :
		
		// FlexSlider CSS
		wp_register_style('themezee_zeeLinear_flexslider', get_template_directory_uri() . '/css/flexslider.css');
		wp_enqueue_style('themezee_zeeLinear_flexslider');
		
		// FlexSlider JS
		wp_register_script('themezee_jquery_flexslider', get_template_directory_uri() .'/js/jquery.flexslider-min.js', array('jquery'));
		wp_enqueue_script('themezee_jquery_flexslider');
		
		// Register and enqueue slider.js
		wp_register_script('themezee_jquery_frontpage_slider', get_template_directory_uri() .'/js/slider.js', array('jquery'));
		wp_enqueue_script('themezee_jquery_frontpage_slider');
	
	endif; 
	
	// Register and enqueue navigation.js
	wp_register_script('themezee_jquery_navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	wp_enqueue_script('themezee_jquery_navigation');
	
	// Register and Enqueue Fonts
	wp_register_style('themezee_default_font', 'http://fonts.googleapis.com/css?family=Lora');
	wp_enqueue_style('themezee_default_font');
	
	wp_register_style('themezee_default_title_font', 'http://fonts.googleapis.com/css?family=Trocchi');
	wp_enqueue_style('themezee_default_title_font');
		
}
endif;


// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'themezee_enqueue_comment_reply' );
	
function themezee_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'themezee_setup' );

if ( ! function_exists( 'themezee_setup' ) ):
function themezee_setup() { 
	
	// init Localization
	load_theme_textdomain('zeeLinear_language', get_template_directory() . '/languages' );
	
	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array(
		'default-color' => 'eeeeee'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1180,
		'height' => 300,
		'flex-height' => true));
		
	// Register Navigation Menus
	register_nav_menu( 'main_navi', __('Main Navigation', 'zeeLinear_language') );
}
endif;


// Add custom Image Sizes
add_action( 'after_setup_theme', 'themezee_add_image_sizes' );

if ( ! function_exists( 'themezee_add_image_sizes' ) ):
function themezee_add_image_sizes() { 
	
	// Add Featured Image Size
	add_image_size( 'featured_image', 690, 180, true);
	
	// Add Widget Post Thumbnail Size
	add_image_size( 'widget_post_thumb', 60, 60, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'themezee_register_sidebars' );

if ( ! function_exists( 'themezee_register_sidebars' ) ):
function themezee_register_sidebars() {
	
	//Register Header Widgets
	register_sidebar( array(
		'name' => __( 'Header Widgets Left', 'zeeLinear_language' ),
		'id' => 'header-widgets-left',
		'description' => __( 'Appears on Header on the left hand side.', 'zeeLinear_language' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Header Widgets Center', 'zeeLinear_language' ),
		'id' => 'header-widgets-center',
		'description' => __( 'Appears on Header on center position.', 'zeeLinear_language' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	register_sidebar( array(
		'name' => __( 'Header Widgets Right', 'zeeLinear_language' ),
		'id' => 'header-widgets-right',
		'description' => __( 'Appears on Header on the right hand side.', 'zeeLinear_language' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
	
}
endif;


/*==================================== INCLUDE FILES ====================================*/

// Includes all files needed for theme options, custom JS/CSS and Widgets
add_action( 'after_setup_theme', 'themezee_include_files' );

if ( ! function_exists( 'themezee_include_files' ) ):
function themezee_include_files() { 

	// include Theme Option Files
	require( get_template_directory() . '/includes/options/options-setup.php' );
	require( get_template_directory() . '/includes/options/options-framework.php' );

	// include Customization Files
	require( get_template_directory() . '/includes/customization/custom-colors.php' );
	require( get_template_directory() . '/includes/customization/custom-layout.php' );
	require( get_template_directory() . '/includes/customization/custom-jscript.php' );
	
	// include Hooks, Template Tags and extra Features of the theme
	require( get_template_directory() . '/includes/template-tags.php' );
	require( get_template_directory() . '/includes/theme-hooks.php' );
	
}
endif;


/*==================================== THEME FUNCTIONS ====================================*/

// Creates a better title element text for output in the head section
add_filter( 'wp_title', 'themezee_wp_title', 10, 2 );

function themezee_wp_title( $title, $sep = '' ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'zeeLinear_language' ), max( $paged, $page ) );

	return $title;
}


// Add Default Menu Fallback Function
function themezee_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Display Credit Link Function
function themezee_credit_link() { ?>
		<a href="http://themezee.com/themes/zeelinear/"><?php _e('zeeLinear Theme', 'zeeLinear_language'); ?></a>
<?php
}


// Change Excerpt Length
add_filter('excerpt_length', 'themezee_excerpt_length');
function themezee_excerpt_length($length) {
    return 50;
}


// Change Excerpt More
add_filter('excerpt_more', 'themezee_excerpt_more');
function themezee_excerpt_more($more) {
    return '';
}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'themezee_list_comments' ) ):
function themezee_list_comments($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	
	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>
	
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'zeeLinear_language' ); ?> <?php comment_author_link(); ?> 
			<?php edit_comment_link( __( '(Edit)', 'zeeLinear_language' ), '<span class="edit-link">', '</span>' ); ?>
			</p>
	
	<?php else : ?>
	
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 80 ); ?>
					<?php printf(__('<cite class="fn">%s</cite>', 'zeeLinear_language'), get_comment_author_link()) ?>
				</div>
				
		<?php if ($comment->comment_approved == '0') : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'zeeLinear_language' ); ?></p>
		<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf(__('%1$s at %2$s', 'zeeLinear_language'), get_comment_date(),  get_comment_time()) ?></a>
					<?php edit_comment_link(__('(Edit)', 'zeeLinear_language'),'  ','') ?>
				</div>
				
				<div class="comment-content"><?php comment_text(); ?></div>
				
				<div class="reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			
			</div>
<?php
	endif;
	
}
endif;
?>