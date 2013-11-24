   	<div id="sidebartop"></div>
	 <div id="menu">
             
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('rightsidebar') ) : ?>
			<h4>Pages</h4>
			<ul><li><a href="<?php echo get_option('home'); ?>">Home</a></li><?php wp_list_pages('title_li='); ?></ul>
			<h4>Categories</h4>
			<ul>
			<?php wp_list_categories('title_li='); ?>
			</ul>
			<br />
			<p><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png"></abbr>'); ?></a>
			</p>
			<?php if ( function_exists('wp_tag_cloud') ) : ?>
			 <?php /*?>available in wp 2.3<?php */?> 
			<h4>Popular Tags</h4>
			<p>
			<?php wp_tag_cloud('smallest=8&largest=22&number=10'); ?>
			</p>
			<?php endif; ?>
			<h4><?php _e('Search'); ?></h4>
			<form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
			<input type="text" name="s" id="s" value="" size="13" /><input type="submit" id="searchsubmit" name="search" value="Search" />
			</form>
			<h4>Archives</h4>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
			<h4>Links</h4>
			<ul>
			<?php wp_list_bookmarks('title_li=0&categorize=0'); ?>
			</ul>
	<?php endif; ?>
	</div>
   	<div id="sidebarbottom"></div>
