# Wordpress Most Used Codes
Here's a Usage For This Codes :

Jump to Section :
* [Style.css](#stylecss)
* [Menus](#menus)
* [Post Image URL](#post-image-url)
* [Pagination](#pagination)
* [Widgets](#widgets)
* [Metabox](#metabox)
* [Theme Options](#theme-options)
* [Extras](#extras)

----------
###Style.css
Create a `style.css` file in your wordpress root directory to recognize it by wordpress :
```
Theme Name: Test Theme
Theme URI: http://Google.com
Description: Testing Theme For Your Wordpress Site!
Author: Iman Soleimani
Author URL: http://Google.com
Wordpress: Iman Soleimani
Tags: Complex
Version: 1.0


```

###Menus
Use menus by adding this to your `header.php` file :
```
wp_nav_menu( array( 'theme_location' => 'test1-menu',
  'container' =>'',
  'menu_class' =>'',
  'menu_id' => 'menu'
  ));
```
*it will create `ul` and `li` for your menu with `id=menu` attribute!*

----------

###Post Image URL
Use it in this way :
```
<img src="<?php get_image_url(); ?>" >
```
*You should use it in the loop.*


----------
###Pagination
See code below to learn using :
```
<?php
$this_page_id=$wp_query->post->ID;
$args = array( 'paged' => $paged,'showposts' => 5 );
$loop = new WP_Query( $args );

while ( $loop->have_posts() ) : $loop->the_post();

endwhile;
?>
```


----------
### Widgets
Call your widgets by adding this code in your `sidebar.php` file :
```
<?php dynamic_sidebar( 'test1-widget' ); ?>
```
Or you can check if dynamic sidebar exist then place it :
```
<?php
if ( !function_exists('dynamic_sidebar') ||
!dynamic_sidebar('test1-widget') ) : 
endif;
?>
```


----------
### Metabox
Use it in your wordpress post loop :
```
<?php
echo get_post_meta($post->ID, 'ts_size', TRUE);
?>
```
*See `Meta-box-usage.php` to learn how to add more metaboxes.*

*Ps: Don't Forget The PREFIX*

----------
###Theme Options
You can use it directly wherever you want, just call it by `echo` :
```
<?php echo $ts_cpr; ?>
```
*Ps: Don't Forget The PREFIX*


----------
###Extras
* To make shortcodes work with your theme, add this line to your `funtions.php` file :

```
add_filter( 'term_description', 'do_shortcode' );
```

* Add this to your `functions.php` if you want to remove the Wordpress Admin Bar in your member views :
```
 add_action('after_setup_theme', 'remove_admin_bar');
 	function remove_admin_bar() {
 	if (!current_user_can('administrator') && 
 	!is_admin()) {
 	  show_admin_bar(false);
 	}
}
```
