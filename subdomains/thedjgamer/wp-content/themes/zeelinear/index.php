<?php get_header(); ?>

	<div id="wrap">
		
		<section id="content" class="primary" role="main">
		 
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'content', get_post_format() );
		
			endwhile;
			
		themezee_display_pagination();

		endif; ?>
			
		</section>

	</div>
	
<?php get_footer(); ?>	