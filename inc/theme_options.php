<?php
$themename = "test";
$shortname = "ts";
$zm_categories_obj = get_categories('hide_empty=0');
$zm_categories = array();
foreach ($zm_categories_obj as $zm_cat) {
$zm_categories[$zm_cat->cat_ID] = $zm_cat->category_nicename;
}
$categories_tmp = array_unshift($zm_categories, "يک دسته را انتخاب کنيد:");

$options = array (

	array(  "name" => "Default Options",
            "type" => "title",
			"desc" => "",
       		),


	array(    "type" => "open"),

	array( 	"name" => "Site Slug",
			"desc" => "Write Site Slug",
			"id" => $shortname."_slug",
			"std" => "We Are The Best1",
            "type" => "text"),

	array( 	"name" => "CopyRight Text",
			"desc" => "Enter CopyRight Text",
			"id" => $shortname."_cpr",
			"std" => "All Rights Reserved!",
            "type" => "text"),
    
	array(    "type" => "close"),


	array(  "name" => "Social Media",
            "type" => "title",
			"desc" => "",
       		),


	array(    "type" => "open"),

	array( 	"name" => "Telegram",
			"desc" => "Enter Telegram ID",
			"id" => $shortname."_telegram",
			"std" => "",
			"type" => "text",),


	array( 	"name" => "Instagram",
			"desc" => "Enter Instagram ID",
			"id" => $shortname."_instagram",
			"std" => "",
            "type" => "text"),

  	array( 	"name" => "YouTube",
			"desc" => "Enter Youtube ID",
			"id" => $shortname."_youtube",
			"std" => "",
            "type" => "text"),

    	array( 	"name" => "Twitter",
			"desc" => "Enter Twitter ID",
			"id" => $shortname."_twitter",
			"std" => "",
            "type" => "text"),
    
    array( 	"name" => "FaceBook",
			"desc" => "Enter Facebook ID",
			"id" => $shortname."_facebook",
			"std" => "",
            "type" => "text"),

	array(    "type" => "close")



);


function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=theme_options.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] );
                update_option( $value['id'], $value['std'] );}

            header("Location: themes.php?page=theme_options.php&reset=true");
            die;

        }
    }

      add_theme_page($themename." Options", "Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}



function mytheme_admin() {

    global $themename, $shortname, $options;




?>
<div class="wrap">
<h2>Theme Options</h2>
<?php
   if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong> تنظیمات ذخیره شد.</strong></p></div>';
   if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>تنظیمات به حالت پیشفرض برگشت.</strong></p></div>';
?>
<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#F2F2F2; padding:10px;">

<?php break;

case "close":
?>

</table><br />

<?php break;

case "title":
?>
<table width="100%" border="0" style="background-color:#E6E6E6; padding:3px 10px;"><tr>
<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif; font-size: 18px;"><?php echo $value['name']; ?></h3></td>
</tr>

<?php break;

case 'text':
?>

<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
</td>
</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break;

}
}
?>

<p class="submit">
<input name="save" type="submit" value="ذخیره تنظیمات" class="button-primary" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input class="button" name="reset" type="submit" value="تنظیمات پیشفرض" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>

<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>
