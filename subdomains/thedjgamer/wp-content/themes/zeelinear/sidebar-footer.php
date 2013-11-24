
<?php // Check if there are any footer widgets
	if(is_active_sidebar('footer-widgets-left') 
		or is_active_sidebar('footer-widgets-center')
		or is_active_sidebar('footer-widgets-right')) : 
?>
		
	<section id="footer-widgets" class="widget-area clearfix">
		
		<div class="widget-column">
			<?php dynamic_sidebar('footer-widgets-left'); ?>
		</div>
		<div class="widget-column">
			<?php dynamic_sidebar('footer-widgets-center'); ?>
		</div>
		<div class="widget-column">
			<?php dynamic_sidebar('footer-widgets-right'); ?>
		</div>
	
	</section>
	
<?php endif; ?>
