			
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<div class="meta-thumb"><?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?></div>
				
				<h2 class="post-title"><?php the_title(); ?></h2>
					
				<div class="entry">
					
					<span class="postmeta"><?php themezee_display_postmeta(); ?></span>
					
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
					<!-- <?php trackback_rdf(); ?> -->	
				</div>
				
				<div class="meta-tags"><?php the_tags('<ul><li><strong>'.__('Tags: ', 'themezee_lang').'</strong></li><li>','</li><li>','</li></ul>'); ?></div>
				<div class="clear"></div>
				
				<div class="postinfo"><?php themezee_display_postinfo(); ?></div>
				
			</div>