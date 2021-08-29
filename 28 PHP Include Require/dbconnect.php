<?php


$servername="localhost";
$username="root";
$password="";
$database="php_tutorial";

$connection=mysqli_connect($servername,$username,$password,$database);

if ($connection){
    echo "Connection Successful! <br><br>";
}
else{
    die("Connection Failed -> ".mysqli_connect_error());
}

?>