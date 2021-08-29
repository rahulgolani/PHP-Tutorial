<?php

// To get the content of another file we can use include or require
// include './dbconnect.php';// If file not found warning is given and rest of the code is executed
require './dbconnect.php';//If file not found then error is give and the code is aborted

$sql='SELECT * FROM employee';

$result=mysqli_query($connection,$sql);

while($row=mysqli_fetch_assoc($result)){
    echo "Name: ".$row['Name']. " Position: ".$row['Position'];
    echo "<br>";
}

?>