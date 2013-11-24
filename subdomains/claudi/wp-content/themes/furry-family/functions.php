<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'rightsidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}

function widget_mytheme_search() {
?> 
        <h4>Search this site</h4>
        <div class="widget-move-over"><form method="get" id="searchform" action="<?php bloginfo('home'); ?>/"><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /></form></div>
<?php 
} 

function widget_mytheme_tags() {
?> 

        <h4>Popular Tags</h4>
        <div class="taggage">
        <?php wp_tag_cloud('smallest=8&largest=16'); ?>
        </div>

<?php 
} 

function widget_mytheme_pages() {
?> 
		<h4>Pages</h4>
        <ul><li><a href="<?php echo get_option('home'); ?>/">Home</a></li><?php wp_list_pages('title_li='); ?></ul>
<?php 
} 
if ( function_exists('register_sidebar_widget') ) {
	register_sidebar_widget(__('Search'), 'widget_mytheme_search');
	register_sidebar_widget(__('tag_cloud'), 'widget_mytheme_tags');
	register_sidebar_widget(__('Pages'), 'widget_mytheme_pages');
}

$themename = "Furry Family";
$shortname = "tn";
$options = array (
    
    array(    "name" => "Body style",
            "id" => $shortname."_body_style",
            "type" => "select",
            "std" => "style1",
            "options" => array("style1", "style2", "style3", "style4"))
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>
<br />
<h3>Please choose from the following body styles:</h3>
<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
    
if ($value['type'] == "text") { ?>
        
<tr valign="top"> 
    <th scope="row">
        Style 1<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style1-scr.png" alt="" /><br />
        Style 3<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style3-scr.png" alt="" />
    </th>
    <th scope="row">
        Style 2<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style2-scr.png" alt="" /><br />
        Style 4<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style4-scr.png" alt="" />
	<?php /*?><?php echo $value['name']; ?>:<?php */?></th>
    <td>
<br />
<br />
<strong>Select your style:</strong><br />
<br />
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
    </td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

    <tr valign="top"> 
    <th scope="row">
        Style 1<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style1-scr.png" alt="" /><br />
        Style 3<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style3-scr.png" alt="" />
    </th>
    <th scope="row">
        Style 2<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style2-scr.png" alt="" /><br />
        Style 4<br />
        <img src="<?php bloginfo('template_directory'); ?>/images/style4-scr.png" alt="" />
		<?php /*?><?php echo $value['name']; ?>:<?php */?></th>
        <td style="padding-left:25px;">
<br />
<br />
<strong>Select your style:</strong><br />
<br />
            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                <?php } ?>
            </select>
<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
        </td>
    </tr>

<?php 
} 
}
?>

</table>

</form>

<?php
}

function mytheme_wp_head() {
	global $options;
	foreach ($options as $value) {
		if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>
<link href="<?php bloginfo('template_directory'); ?>/<?php echo $tn_body_style; ?>.css" rel="stylesheet" type="text/css" />
<?php
}

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin');
?>