<?php

//create new class
new RecipeCollection
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

	

}
