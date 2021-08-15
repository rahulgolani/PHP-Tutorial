<?php

function getSum($marksArr){
    $sum=0;
    foreach ($marksArr as  $value) {
        $sum+=$value;
    }
    return $sum;
}

$marks=array(50,60,70,80);
echo "Total Marks are ", getSum($marks), "<br>";

?>