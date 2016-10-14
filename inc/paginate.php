<?php


function wp_pagination() {
global $wp_query;
$big = 12345678;
$page_format = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type'  => 'array'
) );
if( is_array($page_format) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div><ul>';
            echo '';
            foreach ( $page_format as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div>';
}
}


add_action( 'pre_get_posts', function ( $q ) {

    if( !is_admin() && $q->is_main_query() && $q->is_post_type_archive( 'products' ) ) {

        $q->set( 'posts_per_page', 10 );

    }

});


add_filter( 'redirect_canonical', 'custom_disable_redirect_canonical' );
function custom_disable_redirect_canonical( $redirect_url ) {
    if ( is_paged() && is_singular() ) $redirect_url = false;
    return $redirect_url;
}


?>
