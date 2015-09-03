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

?>
