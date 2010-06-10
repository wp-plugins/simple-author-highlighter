<?php
/*
Plugin Name: Simple Author Highlighter
Plugin URI: http://www.dakulov.eu#page5
Description: Easy highlight authors comments
Version: 0.1
Author: Akulov Dmitriy
Author URI: http://www.dakulov.eu
*/
?>
<?php
// create custom plugin settings menu
add_action('admin_menu', 'sah_create_menu');

function sah_create_menu() {

	//create new top-level menu
	add_options_page('Simple Author Highlighter', 'SAH Settings', 'administrator', 'sah', 'sah_settings_page');

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}

add_action ('wp_head', 'addHeaderCode') ;

function addHeaderCode() {
		echo "\n".'<!-- Start Simple Author Highlighter -->'."\n";
		echo '<style type="text/css">' . "\n";
		echo '.bypostauthor {background-color: ' . get_option('color_code') . ' !important; }' . "\n";
		echo '</style>'."\n";
		echo '<!-- Start Simple Author Highlighter  -->'."\n";
}

function register_mysettings() {
	//register our settings
	register_setting( 'sah-settings-group', 'color_code' );
}

function sah_settings_page() {
?>
<div class="wrap">
<h2>Simple Author Highlighter - Settings</h2>
<br/>
<form method="post" action="options.php">
    <?php settings_fields( 'sah-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enter the highlight color</th>
        <td><input type="text" name="color_code" value="<?php echo get_option('color_code'); ?>" /> <i>For example: #e8e8e8</i></td>
        </tr>
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
<br/><center>
<a href="http://www.dakulov.eu">Plugin Page</a></center>
</div>
<?php } ?>