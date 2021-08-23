<?php

//2 ways to connect to MySQL database

// 1) MySQLi extension (procedural and object oriented) (compatible only with MySQL)
// 2) PDO (PHP data object) (compatible with many databses so if you are switching between multiple databases then this is the best option to go with)

//3 variables required to establish a connection

$servername="localhost";
$username="root";
$password="";

// establishing a connection->
$connection=mysqli_connect($servername,$username,$password);

// echo var_dump($connection);

if($connection){
    echo "Connection Successful<br>";
}
else{
    die("Connection Failed ".mysqli_connect_error());
}

?>