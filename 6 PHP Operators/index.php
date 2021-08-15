<?php

// Operators in PHP

// 1) Assignment Operators

$a=45;
$b=8;

// 2) Arithmetic Operators


echo "For a+b, the result is ".($a+$b). "<br>";
echo "For a-b, the result is ".($a-$b). "<br>";
echo "For a/b, the result is ".($a/$b). "<br>";
echo "For a*b, the result is ".($a*$b). "<br>";
echo "For a%b, the result is ".($a%$b). "<br>";
echo "For a**b, the result is ".($a**$b). "<br>";


//3 Comparison Operator

$x=7;
$y=7;
echo "<br>";
echo "For x == y the result is ", var_dump($x == $y). "<br>";
echo "For x > y the result is ", var_dump($x > $y). "<br>";
echo "For x <= y the result is ", var_dump($x <= $y). "<br>";
echo "For x >= y the result is ", var_dump($x >= $y). "<br>";
echo "For x <> y the result is ", var_dump($x <> $y). "<br>";
echo "For x < y the result is ", var_dump($x < $y). "<br>";

//4 Logical Operators

$m=true;
$n=false;

echo "<br>";
echo "For m and n, the result is ", var_dump($m and $n), "<br>";
echo "For m and n, the result is ", var_dump($m && $n), "<br>";
echo "For m or n, the result is ", var_dump($m or $n), "<br>";
echo "For m or n, the result is ", var_dump($m || $n), "<br>";
echo "For not m, the result is ", var_dump(!$m), "<br>";

?>