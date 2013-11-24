<div id="sidebar">
	<?php themezee_widgets_before(); // hook before sidebar widgets ?>
	
	<?php // Check if there are Widgets in Sidebar
	if( is_active_sidebar('sidebar-top') or is_active_sidebar('sidebar-bottom')
		or is_active_sidebar('sidebar-left') or is_active_sidebar('sidebar-right') ) :
	?>
	
	<ul class="sidebar-top">
		<?php if(is_active_sidebar('sidebar-top')) : dynamic_sidebar('sidebar-top'); endif; ?>
	</ul>

	<div class="sidebar-two">
		<ul class="sidebar-left">
			<?php if(is_active_sidebar('sidebar-left')) : dynamic_sidebar('sidebar-left'); endif; ?>
		</ul>
		<ul class="sidebar-right">
			<?php if(is_active_sidebar('sidebar-right')) : dynamic_sidebar('sidebar-right'); endif; ?>
		</ul>
	</div>
	
	<ul class="sidebar-bottom">
		<?php if(is_active_sidebar('sidebar-bottom')) : dynamic_sidebar('sidebar-bottom'); endif; ?>
	</ul>
	
	<?php else: ?>
	<ul>
		<li><h2 class="widgettitle"><?php _e('Sidebar', 'themezee_lang'); ?></h2>
			<div><?php _e('Go to WP-Admin > Appearance > Widgets to place your favorite Widgets here.', 'themezee_lang'); ?></div>
		</li>
		
		<?php wp_list_categories('title_li=<h2 class="widgettitle">Categories</h2>'); ?>
	
		<?php wp_list_pages('title_li=<h2 class="widgettitle">Pages</h2>'); ?>

		<li><h2 class="widgettitle"><?php _e('Archives', 'themezee_lang'); ?></h2>
			<ul>
			<?php wp_get_archives(); ?>
			</ul>
		</li>

	</ul>

	<?php endif; ?>
	
	<?php themezee_widgets_after(); // hook after sidebar widgets ?>
</div>