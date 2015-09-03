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
<h2>Add your recipes</h2>
<div class="postbox" >
  <h3 class="hndle ui-sortable-hndle" >Just add your recipe using the boxes below and then click the add recipe button to save it.</h3>
    <div class="inside">
      <div class="misc-pub-section">
        <form action="" method="_POST">
          <input type="text" name="Recipe Name" id="RecipeName" value="Your recipe name" />
        <br/>
          <input type="text" name="Recipe Steps" id="RecipeSteps" value="Your recipe steps" />
        <br/>
          <input type="text" name="Recipe Ingrediants" id="RecipeIngrediants" value="Your recipe ingreditants" />
        </form>
      </div>
    </div>
    <div id="major-publishing-actions">
      <input type="submit" name="submit" id="submit" class="button button-primary" value="Add Recipe"  />
    </div>
</div>
