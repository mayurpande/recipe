<?php

class Recipe
{
	public $title;
	public $ingreadients = array();
	public $instructions = array();
	public $yield;
	public $tag = array();
	public $source = "Alena Holligan";
	

}

//after creating the class a new object can be instansiated and stored in a variable
$recipe1 = new Recipe();

var_dump($recipe1);
