<?php
register_sidebar(array(
 'name' => 'test1',
 'id' => 'sidebar-1',
 'before_widget' => '<div class="custom-widget">',
 'after_widget' => '</div>',
 'before_title' => '<h1 class="text-center"">',
 'after_title' => '</h1></div>',
));

register_sidebar(array(
 'name' => 'test2',
 'id' => 'sidebar-2',
 'before_widget' => '<div class="custom-widget">',
 'after_widget' => '</div>',
 'before_title' => '<h1 class="text-center"">',
 'after_title' => '</h1>',
));

?>
