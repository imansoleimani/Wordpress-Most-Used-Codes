<?php
 add_theme_support('post-thumbnails');
 set_post_thumbnail_size(); // Normal post thumbnails

// Enable admin to set custom background images in 'appearance > background'
 add_custom_background();

 add_filter( 'pre_option_link_manager_enabled', '__return_true' );

function get_image_url(){
 $image_id = get_post_thumbnail_id();
 $image_url = wp_get_attachment_image_src($image_id,'full');
 $image_url = $image_url[0];
 echo $image_url;
 }

 add_action('after_setup_theme', 'remove_admin_bar');
 	function remove_admin_bar() {
 	if (!current_user_can('administrator') && !is_admin()) {
 	  show_admin_bar(false);
 	}
 	}

require 'inc/theme_options.php';
require 'inc/menus.php';
require 'inc/custompost.php';
require 'inc/abzarak.php';
include 'inc/meta-box-class.php';
include 'inc/meta-box-usage.php';
include 'inc/dynamic_metabox.php';
include 'inc/paginate.php';
require 'jashnvare.php';
require 'inc/edit-profile.php';

///////////////////////////////////////////////////////////

add_filter( 'term_description', 'do_shortcode' );

///////////////////////////////////////////////////////////////////////////////////////////////////////////

function admin_color_scheme() {
   global $_wp_admin_css_colors;
   $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
function trim_number($num)
    {
         $eng = array('0','1','2','3','4','5','6','7','8','9');
         $per = array('۰','۱','۲','۳','۴','۵','۶','۷','۸','۹');
        return str_replace($eng,$per,$num);
    }

?>
