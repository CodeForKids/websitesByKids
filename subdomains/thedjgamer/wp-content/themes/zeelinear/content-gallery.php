		
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
		<div class="post-body">
		
			<div class="post-format pf-gallery">
				<a class="post-format-icon" title="<?php _e('Permalink to single post', 'zeeLinear_language'); ?>" href="<?php esc_url(the_permalink()); ?>"><span><?php _e('Permalink to single post', 'zeeLinear_language'); ?></span></a>
			</div>
		
			<div class="post-content">
			
				<div class="entry clearfix">
					<?php the_content(); ?>
				</div>
				<div class="page-links"><?php wp_link_pages(); ?></div>
				
			</div>
			
		</div>
		
		<div class="postmeta">
			<?php themezee_display_postmeta(); ?>
			<h2 class="small-title">
				<?php _e('Gallery:', 'zeeLinear_language'); ?> <a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h2>
		</div>
		
	</article>