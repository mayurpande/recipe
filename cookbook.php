<?php
include "classes/recipe.php";
include "classes/render.php";

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

//echo Render::displayRecipe($recipe1);
