<?php
/**
 * @package jb-plugins
 * @version 1.6
 */
/*
Plugin Name: jb-plugins
Plugin URI: http://git.responsivedeveloper.com/bob/
Description: jb-plugins
Author: Bob Toovey (Front End) and (Back End)James Mcavady
Version: 0.1
Author URI: http://buisness-gears.co.uk/
*/

//***********************/
//*@author James Mcavady*/
//***********************/

// ** site wides define and includes** //
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once('jb-plugins-shortcodes.php');

// ** add the recipe popup into admin header ** //
add_action('in_admin_header', 'jbplugins_admin_recipe_popup' );
function jbplugins_admin_recipe_popup() {
	include_once('jb-plugins-recipe-popup.php');
}

// ** add sidebar menu ** //
//add_action('admin_menu', 'jbplugins_admin_actions_add');

//function jbplugins_admin_actions_add() {
//        add_menu_page('addrecipes', 'Add recipes', 'manage_options', 'jb-plugins-add.php', 'add_recipes_admin');
//}


// ** add admin page template ** //
//function add_recipes_admin() {
//	include_once('jb-plugins-add.php');
//}


// ** sidebar menu under settings ** //
//add_action('admin_menu', 'jbplugins_admin_actions_view');

//function jbplugins_admin_actions_view() {
//        add_menu_page('viewrecipes', 'view recipes', 'manage_options', 'jb-plugins-view.php', 'view_recipes_admin');
//}

// ** view admin page template ** //
//function view_recipes_admin() {
//	include_once('jb-plugins-view.php');
//}


// ** add the database table on active plugin ** //

global $recipe_db_version;
$recipe_db_version = '1.0';

function recipe_install() {
	global $wpdb;
	global $recipe_db_version;

	$table_name = $wpdb->prefix . 'recipes';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		recipe_name text NOT NULL,
		recipe_description text NOT NULL,
		recipe_steps text NOT NULL,
		recipe_rfda text NOT NULL,
		recipe_shortcode text NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'recipe_db_version', $recipe_db_version );
}
register_activation_hook( __FILE__, 'recipe_install' );


// ** add some demo data into the DB ** //

function recipe_install_data() {
	global $wpdb;

	$recipe_name = 'Cherry Pie';
	$recipe_description = 'A massive cherry pie';
	$recipe_steps = "Step 1, step 2, step 3";
	$table_name = $wpdb->prefix . 'recipes';

	//check for data in the table
        $recipe_table = $wpdb->prefix . 'recipes';
        $hasData = $wpdb->get_results( "SELECT id FROM $recipe_table");

	if ($hasData = '1') {
		//do nothing
	} else {
		//insert dummy data
		$wpdb->insert(
		$table_name,
			array(
			  'time' => current_time( 'mysql' ),
			  'recipe_name' => $recipe_name,
			  'recipe_description' => $recipe_description,
			  'recipe_steps' => $recipe_steps,
			  'recipe_rfda' => $recipe_rfda,
			)
		);
	}
}

register_activation_hook(__FILE__, 'recipe_install_data' );


// ** deactivation **//

function jbplugins_deactivation() {
  // Deactivation rules here
}
register_deactivation_hook( __FILE__, 'jbplugins_deactivation' );


// ** uninstall ** //
function jsplugins_uninstall() {
  // Uninstallation stuff here
}
register_uninstall_hook( __FILE__, 'jbplugins_uninstall' );


//*********************//
// ** tinyMCE edits ** //
//*********************//

add_action('admin_head', 'jbplugins_add_my_tc_button');

function jbplugins_add_my_tc_button() {
    global $typenow;

//    if ( !current_user_can('edit_posts') &amp;&amp; !current_user_can('edit_pages') ) {
//    return;
//    }

    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "jbplugins_add_tinymce_plugin");
        add_filter('mce_buttons', 'jbplugins_register_my_tc_button');
    }
}

function jbplugins_add_tinymce_plugin($plugin_array) {
    $plugin_array['jbplugins_tc_button'] = plugins_url( 'js/recipe-button.js', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}

function jbplugins_register_my_tc_button($buttons) {
   array_push($buttons, "jbplugins_tc_button");
   return $buttons;
}


?>
