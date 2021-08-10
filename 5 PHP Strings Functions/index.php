<?php

// PHP Manual - php.net
// String Functions

$name="My name is Rahul Golani";

// Length of a String
echo strlen($name);
echo "<br>";

//Concatenation using . operator
echo "Length of String name is ".strlen($name);
echo "<br>";

//Word Count in a string ->
echo str_word_count($name);
echo "<br>";

//Reverse a string
echo strrev($name);
echo "<br>";

//Find Position of a string in a string
echo strpos($name,"Rahul");
echo "<br>";

//Replace a string with another string
// search, replace, subjects
echo str_replace("Rahul", "Mulchand", $name);
echo "<br>";

//Repeat a string multiple times
echo str_repeat($name,2);
echo "<br>";


echo "<br>";
echo "<br>";


?>