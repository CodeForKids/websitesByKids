<?php get_header(); ?>

<?php // Retrieve Current Author
	$author = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>
	
	<div id="wrap">
		
		<section id="content" class="primary" role="main">
		
			<h2 id="author-title" class="archive-title">
				<?php printf(__('Author Archives: %s', 'zeeLinear_language'), '<span>' . esc_attr($author->display_name) . '</span>'); ?>
			</h2>
			
	<?php // Show Author Box
		if(isset($author) and $author->description != '') : ?>
			<div class="author-box clearfix">
				<div class="author-image"><?php echo get_avatar( $author->user_email, '70'); ?></a></div>
				<div class="author-info">       
					<h5><?php _e('About the Author:', 'zeeLinear_language'); ?> <?php echo esc_attr($author->display_name); ?></h5>
					<div class="author-description"><?php echo esc_attr($author->description); ?></div>
						
					<?php if($author->user_url != '') : ?>
						<div class="author-website">
							<?php _e('Author Website: ', 'zeeLinear_language'); ?>
							<a href="<?php echo esc_url($author->user_url); ?>" title="<?php _e('Author Website: ', 'zeeLinear_language'); ?>">
							<?php echo esc_url($author->user_url); ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
	<?php endif; ?>

		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', get_post_format() );
		
			endwhile;
			
		themezee_display_pagination();
			
		endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>	