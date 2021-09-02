<?php

$servername="localhost";
$username="root";
$password="";
$database="users";

$connection=mysqli_connect($servername,$username,$password,$database);

if (!$connection){
    die("Could Not Connect to the Database ".mysqli_connect_error());
}





?>