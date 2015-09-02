<?php
/**
 * @package jb-plugins
 * @version 1.6
 */
/*
Plugin Name: jb-plugins
Plugin URI: http://git.responsivedeveloper.com/bob/
Description: jb-plugins
Author: Bob Toovey and James Mcavady
Version: 0.1
Author URI: http://buisness-gears.co.uk/
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

add_action('admin_menu', 'jbplugins_admin_actions');

function jbplugins_admin_actions() {
	add_options_page('recipes', 'Add recipes', 'manage_options', __FILE__, 'recipes_admin');
}

function recipes_admin() {
?>
 <div class='addrecipe' style='float:left; text-align: center; width: 97.6%; background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-top: 20px;'>
	<h2>Add your recipes</h2>
	<p>add recipe form</p>
 </div>
 <div class='listrecipe' style='float:left; text-align: center; width: 97.6%; background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-top: 20px;'>
	<h2>Your recipes</h2>
	<p>A list of recipes</p>
	<table class="widefat">
		<thead>
		  <thead>
		  <tr>
		  <th>Recipe ID</th>
		  <th>Recipe Name</th>
		  <th>Recipe Description</th>
		  </tr>
		</thead>

		<tbody>

		<?php
			global $wpdb;

			$recipe_table = $wpdb->prefix . 'recipe'; //Good practice
			$recipes = $wpdb->get_results( "SELECT * FROM $recipe_table");
		?>

		<?php
			foreach ($recipes as $recipe) {
		?>

		<tr>

		<?php
			echo "<td>".$recipe->id."</td>";
			echo "<td>".$recipe->recipe_title."</td>";
			echo "<td>".$recipe->description."</td>";
		?>

		</tr>
		<?php
		}
		?>
		</tbody>



		<tfoot>
		  <thead>
		  <tr>
		  <th>Recipe ID</th>
		  <th>Recipe Name</th>
		  </tr>
		</tfoot>
	<table>
 </div>

<?php
}
?>
