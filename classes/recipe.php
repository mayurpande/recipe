<?php

class Recipe
{
	private $title;
	private $ingreadients = array();
	private $instructions = array();
	private $yield;
	private $tag = array();
	private $source = "Alena Holligan";
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

	//all magic methods start with double underscore
	//if we want someone to set be able to create a recipe without adding a title
	//right away we would need to set the title default to null
	public function __construct($title = null)
	{
		//call setTitle method
		$this->setTitle($title);

	}

	public function __toString()
	{
		
		//make use of magic constants, give useful info
		//magic constant class gives name of class
		$output = "You are calling a " . __CLASS__ . " object with the title \"";
		$output .= $this->getTitle() . "\"";
		//for the recipe if we call the object directly we will want to know what recipe
		//this is, so lets return the title 
		return $output;


	}
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

	public function addInstruction($string)
	{
		//we will add our instructions one at a time, we will accept a string argument
		//then we can add this new instruction to our array of new instructions
		$this->instructions[] = $string;
	}

	public function getInstructions()
	{	
		//return this instructions
		return $this->instructions;
	}

	public function addTag($tag)
	{
		$this->tags[] = strtolower($tag);
	}

	public function getTags()
	{
		return $this->tags;
	}

	public function setYield($yield)
	{
		$this->yield = $yield;
	}

	public function getYield()
	{
		return $this->yield;
	}

	public function setSource($source)
	{
		$this->source = ucwords($source);
	}

	public function getSource()
	{
		return $this->source;
	}



}


