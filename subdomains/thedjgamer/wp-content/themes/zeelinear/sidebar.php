
<?php // Check if there are any header widgets
	if(is_active_sidebar('header-widgets-left') 
		or is_active_sidebar('header-widgets-center')
		or is_active_sidebar('header-widgets-right')) : 
?>
	
	<div id="header-widgets-wrap">
		
		<h3 id="header-widgets-icon" class="widget-icon-expand"></h3>
		
		<section id="header-widgets" class="widget-area clearfix">
			
			<div class="widget-column">
				<?php dynamic_sidebar('header-widgets-left'); ?>
			</div>
			<div class="widget-column">
				<?php dynamic_sidebar('header-widgets-center'); ?>
			</div>
			<div class="widget-column">
				<?php dynamic_sidebar('header-widgets-right'); ?>
			</div>
		
		</section>
		
	</div>
	
<?php endif;
