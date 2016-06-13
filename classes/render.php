<?php

class Render
{
	
	public static function listIngredients($ingredients)
	{	
		$output = "";
		foreach($ingredients as $ing){
			$output .= $ing['amount'] . " " . $ing['measure'] . " " . $ing['item'];
			$output .= "\n";
		}
		return $output;

	}
	//pass this a recipe object
	public static function displayRecipe($recipe)
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

		//as we made title private, it is no longer in the same class so not accesible.
		//so we need to specify the getTitle method here
		$output = "";
		$output .=  $recipe->getTitle() . " by " . $recipe->getSource();
		$output .= "\n";
		$output .= implode(", ",$recipe->getTags());
		$output .= "\n\n";
		//to call static method within same class use keyword self
		$output .= self::listIngredients($recipe->getIngredients());
		$output .= "\n";
		$output .= implode("\n",$recipe->getInstructions());
		$output .= "\n";
		$output .= $recipe->getYield();
		return $output;
	}

}
