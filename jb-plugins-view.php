<?php
/**
 * @package jb-plugins
 * @version 1.6
 */
/*
Plugin Name: jb-plugins
Plugin URI: http://git.responsivedeveloper.com/bob/
Description: jb-plugins
Author: James Mcavady
Version: 0.1
Author URI: https://www.responsivedeveloper.com/
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

?>
<h2>Your recipes</h2>
<div class="wrap">

  <table class="wp-list-table widefat fixed striped pages">
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
		$recipe_table = $wpdb->prefix . 'recipe';
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
	  <th>Recipe Description</th>
	  </tr>
	</tfoot>
  <table>
</div>
