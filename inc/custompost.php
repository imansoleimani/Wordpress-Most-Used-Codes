<?php

function my_custom_post_test() {
$labels = array(
'name'               => _x( 'test_name', 'post type general name' ),
'singular_name'      => _x( 'test_name', 'post type singular name' ),
'add_new'            => _x( 'New Test Post', 'book' ),
'add_new_item'       => __( 'New Test Post' ),
'edit_item'          => __( 'Edit' ),
'new_item'           => __( 'New Post' ),
'all_items'          => __( 'All Posts' ),
'view_item'          => __( 'View Posts' ),
'search_items'       => __( 'Search' ),
'not_found'          => __( 'No Post Found!' ),
'not_found_in_trash' => __( 'No Post in Trash!' ),
'parent_item_colon'  => '',
'menu_name'          => 'Test Menu Name'
);
$args = array(
'labels'        => $labels,
'description'   => 'Add Test Post!',
'public'        => true,
'menu_position' => 5,
'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments','page-attributes' ),
'has_archive'   => true,
);
register_post_type( 'test', $args );
}
add_action( 'init', 'my_custom_post_test' );

/*================================================*/
// Add More Here...

/*================================================*/

?>
