<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 */


// Display Custom Header
if ( ! function_exists( 'themezee_display_custom_header' ) ):
	
	function themezee_display_custom_header() {
		
		// Check if there is a custom header image
		if( get_header_image() != '' ) : ?>
		
			<div id="custom-header">
				<img src="<?php echo get_header_image(); ?>" />
			</div>
	
	<?php endif;

	}
	
endif;


// Display Postmeta Data
if ( ! function_exists( 'themezee_display_postmeta' ) ):
	
	function themezee_display_postmeta() { ?>
		
		<span class="meta-date">
		<?php printf(__('<a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a>', 'zeeLinear_language'), 
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		?>
		</span>
		<span class="meta-author">
		<?php printf(__('by <a href="%1$s" title="%2$s" rel="author">%3$s</a>', 'zeeLinear_language'), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'zeeLinear_language' ), get_the_author() ) ),
				get_the_author()
			);
		?>
		</span>
	<?php if ( comments_open() ) : ?>
		<span class="meta-comments">
			<?php comments_popup_link( __('Leave a comment', 'zeeLinear_language'),__('One comment','zeeLinear_language'),__('% comments','zeeLinear_language') ); ?>
		</span>
	<?php endif; ?>
		<span class="meta-category">
			<?php printf(__('%1$s', 'zeeLinear_language'), get_the_category_list(', ')); ?>
		</span>
	<?php
		$tag_list = get_the_tag_list('', ', ');
		if ( $tag_list ) : ?>
			<span class="meta-tags">
				<?php echo $tag_list; ?>
			</span>
	<?php endif;
	}
	
endif;


// Display Site Title or Logo
if ( ! function_exists( 'themezee_display_logo' ) ):
	
	function themezee_display_logo() { 
	
		// Get Theme Options
		$options = get_option('zeelinear_options');
		
		?>
		
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		
		<?php // Display Logo Image or Site Title
			if ( isset($options['themeZee_general_logo']) and $options['themeZee_general_logo'] <> '' ) : ?>
				<img class="logo-image" src="<?php echo esc_url($options['themeZee_general_logo']); ?>" alt="Logo" /></a>
		<?php else: ?>
				<h1 class="site-title"><?php bloginfo('name'); ?></h1>
		<?php endif; ?>
			
		</a>
	<?php
	
	}
	
endif;

	
// Display Content Pagination
if ( ! function_exists( 'themezee_display_pagination' ) ):
	
	function themezee_display_pagination() { 
		
		global $wp_query;
		
		if ( $wp_query->max_num_pages > 1 ) :

			if(function_exists('wp_pagenavi')) : // if PageNavi is activated ?>
				
				<div class="post-pagination-wrap clearfix">
					<?php wp_pagenavi(); ?>
				</div>
				
		<?php
			else : // Otherwise, use traditional Navigation ?>
				
				<div class="post-pagination-wrap clearfix">
					<div class="post-pagination clearfix">
						<span class="pagination-previous"><?php next_posts_link(__('&laquo; Older Entries', 'zeeLinear_language')) ?></span>
						<span class="pagination-next"><?php previous_posts_link (__('Recent Entries &raquo;', 'zeeLinear_language')) ?></span>
					</div>
				</div>
				
	<?php 	
			endif;
		endif;
		
	}
	
endif;


// Display Frontpage Slideshow
if ( ! function_exists( 'themezee_display_frontpage_slideshow' ) ):
	
	function themezee_display_frontpage_slideshow() { 
		
		// Get Query Arguments for Featured Posts Slider
		$options = get_option('zeelinear_options');
		$slider_limit = intval($options['themeZee_frontpage_slider_limit']);
		$slider_content = ($options['themeZee_frontpage_slider_content'] == 'recent') ? 'date' : 'comment_count';
		$slider_category = $options['themeZee_frontpage_slider_category'];
	
		$query_arguments = array(
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'posts_per_page' => $slider_limit,
			'orderby' => $slider_content,
			'order' => 'DESC',
			'category_name' => $slider_category
		);
		$zee_slider_query = new WP_Query($query_arguments);
		
		$slider = '';
		
		if ($zee_slider_query->have_posts()) : ?>
		
		
		<div id="frontpage-slider-container" class="clearfix">
			<div id="frontpage-slider-head" class="clearfix">
				<div class="frontpage-slide-keys"></div>
				<h2><?php echo esc_attr($options['themeZee_frontpage_slider_title']); ?></h2>
			</div>
			<div id="frontpage-slider-wrap" class="clearfix">
				<div id="frontpage-slider" class="zeeflexslider">
					<ul class="zeeslides">
				
				<?php while ($zee_slider_query->have_posts()) : $zee_slider_query->the_post(); ?>
				
					<li id="slide-<?php the_ID(); ?>" class="zeeslide">

						<?php get_template_part( 'content', get_post_format() ); ?>

					</li>

				<?php endwhile; ?>
				
					</ul>
				</div>
			</div>
		</div>
				
		<?php endif; ?>
	
	<?php wp_reset_postdata();
	
	}
	
endif;


?>