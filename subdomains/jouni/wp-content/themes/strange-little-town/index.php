<?php get_header(); ?>

			<?php if (have_posts()) : ?>

				<?php while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="time">
                    <span class="edit"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?><?php edit_post_link('Edit', '|', ''); ?></span>
                    <p><?php the_time('F jS, Y') ?> <span class="gray">Posted <?php the_time() ?></span></p>
                    </div>

					<?php the_content('Read the rest of this entry &raquo;'); ?>

					<div class="details">
                    <p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?></p>
                    </div>
                 				
                </div>

			<?php endwhile; ?>
            
            <div class="navigation"><p><?php posts_nav_link(); ?></p></div>
		
			<?php else : ?>

				<h2>Not Found</h2>
				<p>Sorry, but you are looking for something that isn't here.</p>
				<?php include (TEMPLATEPATH . "/searchform.php"); ?>

			<?php endif; ?>

        </div>
                    

<?php get_sidebar(); ?>


<?php get_footer(); ?>