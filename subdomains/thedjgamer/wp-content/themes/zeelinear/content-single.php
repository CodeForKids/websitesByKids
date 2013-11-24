		
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
		<div class="post-body">
		
			<div class="post-format pf-<?php echo get_post_format(); ?>">
				<span class="post-format-icon"></span>
			</div>
		
			<div class="post-content">
	
				<h2 class="post-title"><?php the_title(); ?></h2>
				<?php the_post_thumbnail('featured_image'); ?>

				<div class="entry clearfix">
					<?php the_content(); ?>
				</div>
				<div class="page-links"><?php wp_link_pages(); ?></div>
			
			</div>
			
		</div>
		
		<div class="postmeta"><?php themezee_display_postmeta(); ?></div>
		
	</article>