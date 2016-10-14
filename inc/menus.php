<?php
// ---------------- Menus -----------------

add_theme_support( 'menus' );
register_nav_menus(
    array(
        $location => $description ,
        'test1-menu' => __( 'Header Menu'),
        'test2-menu' => __( 'Second Menu' )
      
    )
);


/* Use This Menu By Adding This Code To Your Header or anywhere you want :

            wp_nav_menu( array( 'theme_location' => 'test1-menu',
              'container' =>'',
              'menu_class' =>'',
              'menu_id' => 'menu'
           ) );
*/

?>