<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		
		<title>
			<?php if (is_home()) { echo bloginfo('name');
			} elseif (is_404()) {
			echo '404 Not Found';
			} elseif (is_category()) {
			echo 'Category:'; wp_title('');
			} elseif (is_search()) {
			echo 'Search Results';
			} elseif ( is_day() || is_month() || is_year() ) {
			echo 'Archives:'; wp_title('');
			} else {
			echo wp_title('');
			}
			?>
		</title>

	    <meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
		<meta name="description" content="<?php bloginfo('description') ?>" />
		<?php if(is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	    <?php }?>
	
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	</head>
	
	<?php wp_head(); ?>

	<body> 
    
    <div id="main">
    	
        <div id="topnavi">
        <!-- Menu -->
        	<div id="menu">
				<ul id="menu">
        
				<li <?php if(is_home()) { echo 'class="current_page_item"';} ?>>
            		<a href="<?php bloginfo('siteurl'); ?>">Home</a>
            	</li>
            	<?php wp_list_pages('title_li=&depth=1' ); ?>
            
				</ul>
			</div>
        
        	<div id="rightnavi">
        		<a href="<?php bloginfo('rss2_url'); ?>">RSS <img src="<?php bloginfo('template_directory'); ?>/img/rss.png" /></a>
        	</div>
        
        </div>
        
		<div class="wrapper">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p id="description"><?php bloginfo('description'); ?></p>
        </div>


		<div class="wrapper">
                
        	<div id="content">