<?php


echo "<h1>Associative Array</h1><br>";

// In this array we can associate the values to the keys

$favColor=array("Rahul"=>"Black","John"=>"White","David"=>"Green");

foreach ($favColor as $key => $value) {
    echo "Favourite Color of <strong>$key</strong> is <strong>$value</strong><br>";
}


?>