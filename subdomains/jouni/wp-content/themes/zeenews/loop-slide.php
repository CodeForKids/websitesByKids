	
			<div <?php post_class(); ?>>

				<div class="meta-thumb"><?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?></div>
				
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>

				<div class="entry">
					
					<span class="postmeta"><?php themezee_display_postmeta(); ?></span>
					
					<?php the_content('<span class="moretext">' . __('Read more', 'themezee_lang') . '</span>'); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
				</div>
			
				<div class="postinfo"><?php themezee_display_postinfo(); ?></div>
			
			</div>