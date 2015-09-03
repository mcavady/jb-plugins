<h2>Add A Recipes</h2>
<div class="wrap">
<span>Just add your recipe using the boxes below and then click the add recipe button to save it.</span>
<hr/>
  <div class="postbox" >
    <div class="inside">
      <div class="misc-pub-section">

	<form action="../wp-content/plugins/jb-plugins/insertRecipe.php" method="_POST">
          <input type="text" name="Recipe Name" id="RecipeName" value="Your recipe name" />
        <hr/>
          <input type="text" name="Recipe Steps" id="RecipeSteps" value="Your recipe steps" />
        <hr/>
          <input type="text" name="Recipe Ingrediants" id="RecipeIngrediants" value="Your recipe ingreditants" />
	<div id="major-publishing-actions" >
      	  <input type="submit" name="submit" id="submit" class="button button-primary" value="Add Recipe"  />
    	</div>
        </form>

      </div>
      <span>*DEV NOTE*  - *API search function, further development, button disabled for now</span>
    </div>
  </div>
</div>
