<?php

echo "<h1>Multidimensional Arrays</h1>";


$multiDim=array(array(1,2,3,4),array(5,6,7,8),array(9,10,11,12));

foreach ($multiDim as $value) {
    foreach ($value as $element) {
        echo $element," ";
    }
    echo "<br>";
}

echo "<br><br>";

for ($i=0; $i < count($multiDim); $i++) { 
    for ($j=0; $j < count($multiDim[$i]); $j++) { 
        echo $multiDim[$i][$j]," ";
    }
    echo "<br>";
}
?>