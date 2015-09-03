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

//site wides
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
include_once('jb-plugins-shortcodes.php');


//sidebar menu under add links
add_action('admin_menu', 'jbplugins_admin_actions_add');

function jbplugins_admin_actions_add() {
        add_menu_page('addrecipes', 'Add recipes', 'manage_options', 'jb-plugins-add.php', 'add_recipes_admin');
}

// add admin page template
function add_recipes_admin() {
	include_once('jb-plugins-add.php');
}

// *** //

//sidebar menu under settings
add_action('admin_menu', 'jbplugins_admin_actions_view');

function jbplugins_admin_actions_view() {
        add_menu_page('viewrecipes', 'view recipes', 'manage_options', 'jb-plugins-view.php', 'view_recipes_admin');
}

// view admin page template
function view_recipes_admin() {
	include_once('jb-plugins-view.php');
}


//add the database table on active plugin

global $recipe_db_version;
$recipe_db_version = '1.0';

function recipe_install() {
	global $wpdb;
	global $jal_db_version;

	$table_name = $wpdb->prefix . 'recipes';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		name tinytext NOT NULL,
		text text NOT NULL,
		url varchar(55) DEFAULT '' NOT NULL,
		UNIQUE KEY id (id)
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'recipe_db_version', $recipe_db_version );
}


register_activation_hook( __FILE__, 'recipe_install' );

?>
