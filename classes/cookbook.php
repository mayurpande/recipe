<?php
include "classes/recipe.php";
//after creating the class a new object can be instansiated and stored in a variable
$recipe1 = new Recipe();
//access properties with object created
//$recipe1->source = "Grandma Holligan";
$recipe1->setTitle("my first recipe");
$recipe1->addIngredient("egg",1);
$recipe1->addIngredient("flour",2,"cup");
//new object of class
$recipe2 = new Recipe();
//$recipe2->source = "Betty Crocker";
$recipe2->setTitle("My Second recipe");

//now to use displayRecipe method we call it just like a regular fn
//only difference is that we first need to reference the object that it belongs to
echo $recipe1->getTitle();
foreach($recipe1->getIngredients() as $ing){
	echo "\n" . $ing["amount"] . " " . $ing["measure"] . " " . $ing["item"];
}

$recipe1->addInstruction("This is my first instruction");
$recipe1->addInstruction("This is my second instruction");

echo implode("\n",$recipe1->getInstructions());

$recipe1->addTag("Breakfast");
$recipe1->addTag("Main Course");

echo implode(", ",$recipe1->getTags());
