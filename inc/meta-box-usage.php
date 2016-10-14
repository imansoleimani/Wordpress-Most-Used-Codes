<?php
/**
 * Registering meta boxes
 *
 * In this file, I'll show you how to extend the class to add more field type (in this case, the 'taxonomy' type)
 * All the definitions of meta boxes are listed below with comments, please read them carefully.
 * Note that each validation method of the Validation Class MUST return value instead of boolean as before
 *
 * You also should read the changelog to know what has been changed
 *
 * For more information, please visit: http://www.deluxeblogtips.com/2010/04/how-to-create-meta-box-wordpress-post.html
 *
 */

/********************* BEGIN DEFINITION OF META BOXES ***********************/

// prefix of meta keys, optional
// use underscore (_) at the beginning to make keys hidden, for example $prefix = '_rw_';
// you also can make prefix empty to disable it
$prefix = 'ts_';

$classy_meta_boxes = array();

$classy_meta_boxes[] = array(
	'id' => 'metas',
	'title' => 'Test Metas',
	'pages' => array('page', 'post', 'products'),
	'fields' => array(

		array(
            'name' => ' Size :',
            'desc' => 'Enter Size Of The File',
            'id' => $prefix . 'size',
            'type' => 'text',
            'std' => ''
        ),
		array(
		    'name' => ' Price :',
		    'desc' => 'Enter The Price',
		    'id' => $prefix . 'price',
		    'type' => 'text',
		    'std' => ''
        ),
        array(
		    'name' => 'Available ?',
		    'desc' => 'Product Available ?',
		    'id' => $prefix . 'pro_available',
		    'type' => 'checkbox',
		    'std' => ''
        ),
	)
);

$classy_meta_boxes[] = array(
	'id' => 'Second Metas',
	'title' => 'Second Meta For Custom Post Type',
	'pages' => array('custom_post_type_name'),
	'fields' => array(

		array(
            'name' => 'Description',
            'desc' => 'Enter Custom Description',
            'id' => $prefix . 'dscr',
            'type' => 'textarea',
            'std' => ''
        ),
		array(
		        'name' => 'Color',
		        'desc' => 'Enter Color For This Custom Product',
		        'id' => $prefix . 'color',
		        'type' => 'text',
		        'std' => ''
		    ),
	)
);

foreach ($classy_meta_boxes as $meta_box) {
	new classy_meta_box($meta_box);
}

/********************* END DEFINITION OF META BOXES ***********************/
?>