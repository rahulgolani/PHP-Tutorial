<?php

$servername='localhost';
$username='root';
$password='';
$database='forum';

$connection=mysqli_connect($servername,$username,$password,$database);

if (!$connection){
    die('Error Connecting to Database '.mysqli_connect_error());
}

?>