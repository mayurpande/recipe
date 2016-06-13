<?php

class Recipe
{
	private $title;
	public $ingreadients = array();
	public $instructions = array();
	public $yield;
	public $tag = array();
	public $source = "Alena Holligan";

	public function setTitle($title)
	{
		$this->title = ucwords($title);
	}	
	public function getTitle()
	{
		return $this->title;
	}

	public function displayRecipe()
	{
		/*within the method we describe the action we want to perform
		 * for our methods to be really useful. we need them to have access
		 * to the other methods and properties of their respective objects
		 * php allows objects to reference themselves, using the keyword variable
		 * this.
		 * when working within the scope of a method use $this in the same way you 
		 * would use the object name outside the class.
		 * The $this keyword, indicates that we want to use the object's own properties or
		 * methods and allows us to have access to them, in the class scope
		 */
		return $this->title . " by " . $this->source;
	}
}

//after creating the class a new object can be instansiated and stored in a variable
$recipe1 = new Recipe();
//access properties with object created
$recipe1->source = "Grandma Holligan";
$recipe1->setTitle("my first recipe");

//new object of class
$recipe2 = new Recipe();
$recipe2->source = "Betty Crocker";
$recipe2->setTitle("My Second recipe");

//now to use displayRecipe method we call it just like a regular fn
//only difference is that we first need to reference the object that it belongs to
echo $recipe1->getTitle();
echo $recipe1->displayRecipe();
echo $recipe2->displayRecipe();
