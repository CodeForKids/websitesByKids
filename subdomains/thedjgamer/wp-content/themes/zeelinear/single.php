<?php get_header(); ?>

	<div id="wrap">
		
		<section id="content" class="primary" role="main">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', 'single' );
			
			$author = get_userdata(get_the_author());

			endwhile;
		
		endif; ?>
		
		<?php // Show Author Box
			$options = get_option('zeelinear_options');
			if(isset($options['themeZee_show_author_box']) and $options['themeZee_show_author_box'] == 'true') : ?>
			<div class="author-box clearfix">
				<div class="author-image"><?php echo get_avatar( get_the_author_meta('user_email'), '70'); ?></a></div>
				<div class="author-info">       
					<h5><?php _e('About the Author:', 'zeeLinear_language'); ?> <?php the_author_meta('display_name') ?></h5>
					<div class="author-description"><?php the_author_meta('description'); ?></div>
						
					<?php if(get_the_author_meta('user_url') != '') : ?>
						<div class="author-website">
							<?php _e('Author Website: ', 'zeeLinear_language'); ?>
							<a href="<?php the_author_meta('user_url'); ?>" title="Author Website"><?php the_author_meta('user_url'); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
	<?php endif; ?>
			
		<?php comments_template(); ?>
		
		</section>

	</div>
	
<?php get_footer(); ?>	