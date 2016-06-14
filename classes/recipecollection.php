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
				//we are going to do a few more things to the item so lets add that to a new variable
				$item = $ing["item"];
				//first thing we want to check is if our item contains a comma
				//if so we only want to use the part before the comma
				if(strpos($item, ",")){
					//if comma found we only want item to be first part of string
					$item = strstr($item,",",true);
				}
				//now we want to check it this item is already in the array as its singular 
				//or plural version
				// so will check it item with an s is in our ingredients array
				// we us in_array we pass it what we want to look for and then we pass it the array
				if(in_array($item."s",$ingredients)){
					//if so then I want to use item plus s, so I can use item
					//and then concatenate the s
					$item.="s";
				}else if (in_array(substr($item,0,-1), $ingredients)){ //removes last character of string
					//next we want to check else if the singular version is in our array
					//and if its found we want to use that
					$item = substr($item,0,-1);
				}
				//after our item is set in one of these three ways
				//we can add that to the ingredient just like we were doing before
				//but this we will use our item variable

				//we will add the item as the key in our array
				//then we will add an inner array element to that ingredient
				$ingredients[$item] = array(
					$ing["amount"],
					$ing["measure"]
				);
			}
		}
		//now we can return the ingredients
		return $ingredients;

	}
}
