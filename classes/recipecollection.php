<?php

//create new class
class RecipeCollection
{
	private $title;
	private $recipes = array();
	
	//this will allow us to set the title at the same time we instansiate our object
	public function __construct($title = null)
	{
		//call setTitle method
		$this->setTitle($title);

	}

	//as properties are private we need to use getter and setters, obtianed from recipe class
	public function setTitle($title)
	{
		if(empty($title)){
			//if condition is true set title null
			$this->title = null;
		}else{
			$this->title = ucwords($title);
		}
		
	}	
	public function getTitle()
	{
		return $this->title;
	}

	//next we need to be able to create a new recipe, lets add a new method
	public function addRecipe($recipe)
	{
		//accept recipe as argument and add it to our array
		$this->recipes[] = $recipe;
	}

	public function getRecipes()
	{
		return $this->recipes;
	}

	//method to grab the recipe titles
	public function getRecipeTitles()
	{
		//since each of the recipes is an object that contains much more than just the title
		//we need to grab just the title, start by initializing titles array
		$titles = array();
		//loop through each of the recipes in the collection and grab the title
		foreach($this->recipes as $recipe){
			//to our titles array we add recipe->getTitle
			$titles[] = $recipe->getTitle();
		}
		//then we can return our titles
		return $titles;
	}	

	//function to filter recipe by tag 
	public function filterByTag($tag)
	{
		//initialise a new tag recipes array
		$taggedRecipes = array();

		//loop through recipes and look for the tag
		foreach($this->recipes as $recipe){
			//make sure our tag is in lower case using strtolower,
			//then we will be looking in the recipe getTags method
			if(in_array(strtolower($tag), $recipe->getTags())){
				//if we find the tag we will add the tag to our tagged recipes array
				$taggedRecipes[] = $recipe;
			}
		}
		//finally we will return our taggesRecipes
		return $taggedRecipes;
		
	}

	//we want to create a master list of ingredients
	public function getCombinedIngredients()
	{
		//initialise an ingredients array
		$ingredients = array();

		//we are going to want to loop through each recipe in this collection
		//then loop through all the ingedients in each recipe
		foreach($this->recipes as $recipe){
			foreach($recipe->getIngredients() as $ing){
				//we will add the item as the key in our array
				//then we will add an inner array element to that ingredient
				$ingredients[$ing["item"]] = array(
					$ing["amount"],
					$ing["measure"]
				);
			}
		}
		//now we can return the ingredients
		return $ingredients;

	}
}
