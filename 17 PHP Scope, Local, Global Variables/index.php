<?php

echo "<h1>LOCAL SCOPE GLOBAL VARIABLES</h1>";

//global varibles scope is in the whole code but not inside the functions
$a=10;
$b=100;

function printValues(){
    //local variables- scope only within the block level
    // $a=11;
    // $b=12;
    // we can bring the global variables to this block by using global keyword
    global $a, $b;
    // any change made to global varibles here will reflect everywhere
    echo "BEFORE UPDATING GLOBAL VARIABLES <br>";
    echo $a,"<br>";
    echo $b,"<br>";
    $a=99;
    $b=999;
}

echo "<br>";
echo $a,"<br>";
echo $b,"<br>";
printValues();
echo "AFTER UPDATING GLOBAL VARIABLES<br>";
echo $a,"<br>";
echo $b,"<br>";

//$GLOBALS is an associative array which gives all the global 

echo var_dump($GLOBALS);
echo "<br>";

echo $GLOBALS["a"];
echo "<br>";    
echo $GLOBALS["b"];
?>