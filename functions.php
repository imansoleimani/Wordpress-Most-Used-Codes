<?php

////////////////////////////////////  Enable Post Thumbnails  /////////////////////////////////////////

 add_theme_support('post-thumbnails');
 set_post_thumbnail_size(); // Normal post thumbnails

// Enable admin to set custom background images in 'appearance > background'
 add_custom_background();

 add_filter( 'pre_option_link_manager_enabled', '__return_true' );


//////////////////////////////////////  Get Post Image URL  ///////////////////////////////////////////

function get_image_url(){
 $image_id = get_post_thumbnail_id();
 $image_url = wp_get_attachment_image_src($image_id,'full');
 $image_url = $image_url[0];
 echo $image_url;
 }


/////////////////////////////  Don't Show Admin Bar To Members  //////////////////////////////////

 add_action('after_setup_theme', 'remove_admin_bar');
 	function remove_admin_bar() {
 	if (!current_user_can('administrator') && !is_admin()) {
 	  show_admin_bar(false);
 	}
 	}


//////////////////////////////////////////  Include Files  ///////////////////////////////////////////////

include 'inc/theme_options.php';
include 'inc/menus.php';
include 'inc/custompost.php';
include 'inc/widgetss.php';
include 'inc/meta-box-class.php';
include 'inc/meta-box-usage.php';
include 'inc/paginate.php';


///////////////////////////////////////  Enable ShortCodes  ////////////////////////////////////////////

add_filter( 'term_description', 'do_shortcode' );

///////////////////////////////////////////////////////////////////////////////////////////////////////////

?>
