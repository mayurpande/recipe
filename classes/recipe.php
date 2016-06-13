<?php

class Recipe
{
	private $title;
	public $ingreadients = array();
	public $instructions = array();
	public $yield;
	public $tag = array();
	public $source = "Alena Holligan";
	//define acceptable measurements
	private $measurements = array(
		'tsp',
		'tbsp',
		'cup',
		'oz',
		'lb',
		'fl oz',
		'pint',
		'quart',
		'gallon'
	);
	public function setTitle($title)
	{
		$this->title = ucwords($title);
	}	
	public function getTitle()
	{
		return $this->title;
	}
	public function addIngredient($item,$amount = null,$measure = null)
	{
		//we can require they pass a float or an integer, as they amount
		if($amount != null && !is_float($amount) && !is_int($amount)){
			//if they haven't entered an amount with float or int, we want to exit
			exit("The amount must be a float: " . gettype($amount) . " $amount given");
		}
		//after declaring array above we can check if they correct measurement is given
		if($measure != null && !in_array(strtolower($measure), $this->measurements)){
			exit("please enter a valid measurement: " . implode(", ", $this->measurements));
		}
		$this->ingredients[] = array(
			'item' => ucwords($item),
			'amount' => $amount,
			'measure' => strtolower($measure)
		);
	}	
	
	public function getIngredients()
	{
		return $this->ingredients;
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


