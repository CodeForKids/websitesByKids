		
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	
		<div class="post-body">
		
			<div class="post-format pf-standard">
				<a class="post-format-icon" title="<?php _e('Permalink to single post', 'zeeLinear_language'); ?>" href="<?php esc_url(the_permalink()); ?>"><span><?php _e('Permalink to single post', 'zeeLinear_language'); ?></span></a>
			</div>
		
			<div class="post-content">
	
				<h2 class="post-title"><a href="<?php esc_url(the_permalink()); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				
				<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_post_thumbnail('featured_image'); ?></a>

				<div class="entry clearfix">
					<?php the_content(__('<span>&raquo; Read more</span>', 'zeeLinear_language')); ?>
				</div>
				<div class="page-links"><?php wp_link_pages(); ?></div>
			
			</div>
			
		</div>
		
		<div class="postmeta">
			<a class="post-format-icon" title="<?php _e('Permalink to single post', 'zeeLinear_language'); ?>" href="<?php esc_url(the_permalink()); ?>"><span><?php _e('Permalink to single post', 'zeeLinear_language'); ?></span></a>
			<?php themezee_display_postmeta(); ?>
		</div>
		
	</article>