<?php
//***********************/
//*@author James Mcavady*/
//***********************/
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
		$recipe_table = $wpdb->prefix . 'recipes';
		$recipes = $wpdb->get_results( "SELECT * FROM $recipe_table");
	?>
	<?php
		foreach ($recipes as $recipe) {
	?>
	<tr>
	<?php
		echo "<td>".$recipe->id."</td>";
		echo "<td>".$recipe->recipe_name."</td>";
		echo "<td>".$recipe->recipe_description."</td>";
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
