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

		//there are two constants that reference where the file is stored
		//the first one is file, this gives us the full path with the name
		//we can get just the file name with combining the file with base name
		//we could also use the fn name dir with file as well to pull only the directory path
		//but we have another constant that you will often see, the dir or directory constant
		//this constant gives us the full constant to the path to the file without the filename
		$output .= "\nIt is stored in " . basename(__FILE__) . " at " . __DIR__ . ".";

		//next we will show specific info about where in the class we are looking
		//__LINE__ will tell us the current line number in the file
		//__METHOD__ will tell us the the current method
		$output .= "\nThis display is from line " . __LINE__ . " in method " . __METHOD__;
		

		//finally we will show a list of the methods, in case the user is looking for something
		//this is another place where we will use a function in place with a constant. 
		$output .= "\nThe following methods are available for objects o this class: \n";
		//use implode
		$output .= implode("\n", get_class_methods(__CLASS__));	
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


