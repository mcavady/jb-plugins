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

?>
<!-- change inline styles to css file -->
 <div class='viewrecipe' style='float:left; text-align: center; width: 97.6%; background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin-top: 20px;'>
	<h2>Your recipes</h2>
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
		<!-- query the db -->
		<?php
			global $wpdb;
			$recipe_table = $wpdb->prefix . 'recipe'; //Good practice
			$recipes = $wpdb->get_results( "SELECT * FROM $recipe_table");
		?>
		<!-- display the results -->
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

