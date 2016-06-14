<?php
include "classes/recipe.php";
include "classes/render.php";
include "inc/allrecipes.php";
include "classes/recipecollection.php";

//instansiate a cookbook object
$cookbook = new RecipeCollection("Treehouse Recipes");

//now we can add the recipes to our cookbook collection using the add recipe method
$cookbook->addRecipe($lemon_chicken);
$cookbook->addRecipe($granola_muffins);
$cookbook->addRecipe($belgian_waffles);
$cookbook->addRecipe($pepper_casserole);
$cookbook->addRecipe($lasagna);

$cookbook->addRecipe($dried_mushroom_ragout);
$cookbook->addRecipe($rabbit_catalan);
$cookbook->addRecipe($grilled_salmon_with_fennel);
$cookbook->addRecipe($pistachio_duck);
$cookbook->addRecipe($chili_pork);
$cookbook->addRecipe($crab_cakes);
$cookbook->addRecipe($beef_medallions);
$cookbook->addRecipe($silver_dollar_cakes);
$cookbook->addRecipe($french_toast);
$cookbook->addRecipe($corn_beef_hash);
$cookbook->addRecipe($granola);
$cookbook->addRecipe($spicy_omelette);
$cookbook->addRecipe($scones);
echo Render::listRecipes($cookbook->getRecipeTitles());
exit;
echo Render::displayRecipe($lemon_chicken);






















/*
 
//after creating the class a new object can be instansiated and stored in a variable
$recipe1 = new Recipe("my first recipe");
//access properties with object created
$recipe1->setSource("Grandma Holligan");

$recipe1->addIngredient("egg",1);
$recipe1->addIngredient("flour",2,"cup");
//new object of class
$recipe2 = new Recipe("my second recipe");
$recipe2->setSource("Betty Crocker");


//now to use displayRecipe method we call it just like a regular fn
//only difference is that we first need to reference the object that it belongs to
$recipe1->addInstruction("This is my first instruction");
$recipe1->addInstruction("This is my second instruction");

$recipe1->addTag("Breakfast");
$recipe1->addTag("Main Course");

$recipe1->setYield("6 servings");

echo $recipe1;
/*
 * Now we are ready to call our static method
 * To use a static method, we specify the class, then double colons
 * and then the method
 */
//since we don't have an object we can
//echo new Render();
//echo Render::displayRecipe($recipe1);



