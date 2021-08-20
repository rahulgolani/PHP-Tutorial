<?php

// Data Types

/*
String Single quotes or double quotes
Integer
Float
Boolean
Object
Array
Null
*/

$name="Rahul Golani"; //String
$age=24; //integer
$income=79999.15; //float

$isExperienced=false;

// printing variables through echo is not the correct way since it will sometimes not print its correct value, Example if we echo $isExperienced then a blank string will be printed. To overcome this we can use var_dump(variable name), this function will return the variable typeand the value of the variable

echo "Value is $isExperienced<br>";
echo "<br>";
echo "Value is ", var_dump($isExperienced);
echo "<br>";

//Object - Instances of a class

//Array->

$friends=array("Rahul","Golani");
// this type of array is called numeric array or indexed arrayy since it has keys as 0,1 etc
// echo $friends;//error since we are trying to convert array to string 

echo var_dump($friends);

//indexing

echo "<br>";
echo "<br>";
echo $friends[0];

echo "<br>";
// echo $friends[4];// Not array index out of bound error but undefined offset
echo "<br>";

$name=null; //empty value

?>