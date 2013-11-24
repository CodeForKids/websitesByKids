	<div class="clear"></div>
	</div><!-- end #wrap -->
</div><!-- end #wrapper -->

<div id="foot_wrap">
		<?php if(is_active_sidebar('sidebar-footer-left') or is_active_sidebar('sidebar-footer-center-left') or is_active_sidebar('sidebar-footer-center-right') or is_active_sidebar('sidebar-footer-right')) : ?>
		<div id="bottombar">
			<ul class="bottombar_item">
				<?php dynamic_sidebar('sidebar-footer-left'); ?>
			</ul>
			<ul class="bottombar_item">
				<?php dynamic_sidebar('sidebar-footer-center-left'); ?>
			</ul>
			<ul class="bottombar_item">
				<?php dynamic_sidebar('sidebar-footer-center-right'); ?>
			</ul>
			<ul class="bottombar_item">
				<?php dynamic_sidebar('sidebar-footer-right'); ?>
			</ul>
			<div class="clear"></div>
		</div>
		<?php endif; ?>
		
		<?php themezee_footer_before(); // hook before #footer ?>
		<div id="footer_wrap">
			<div id="footer">
				<?php 
					$options = get_option('themezee_options');
					if ( isset($options['themeZee_general_footer']) and $options['themeZee_general_footer'] <> "" ) { 
						echo  $options['themeZee_general_footer']; } 
				?>
				<div class="credit_link"><?php themezee_credit_link(); ?></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php themezee_footer_after(); // hook after #footer ?>
		
</div><!-- end #foot_wrap -->
<?php themezee_wrapper_after(); // hook after #wrapper ?>

<?php wp_footer(); ?>
</body>
</html>