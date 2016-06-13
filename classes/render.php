<?php

class Render
{

	//pass this a recipe object
	public function displayRecipe($recipe)
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
		return $this->title . " by " . $recipe->source;
	}

}
