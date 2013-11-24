<?php
/*
Template Name: Page Fullwidth
*/
?>
<?php get_header(); ?>

	<div id="wrap">
		<div id="content" class="fullwidth">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<h2 class="page-title"><?php the_title(); ?></h2>
				<?php edit_post_link(__( 'Edit', 'themezee_lang' )); ?>

				<div class="entry">
					<?php the_post_thumbnail('medium', array('class' => 'alignleft')); ?>
					<?php the_content(); ?>
					<div class="clear"></div>
					<?php wp_link_pages(); ?>
				</div>
				
				
			</div>

		<?php endwhile; ?>

		<?php endif; ?>
		
		</div>
	</div>
<?php get_footer(); ?>	