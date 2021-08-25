<?php

$servername='localhost';
$username="root";
$password="";

// Connecting to MySQL

$connection=mysqli_connect($servername,$username,$password);

if ($connection){
    echo "Connection was Successful!<br>";
}
else{
    die("Connection Failed ".mysqli_connect_error());
}

//Creating a database
$sql="CREATE DATABASE PHP_TUTORIAL";

// executing the query(param1-connection object, param2-sql query)
$result=mysqli_query($connection,$sql);

if ($result){
    echo "Database was created Successfully!<br>";
}
else{
    echo "Database was not created due to error ---> ".mysqli_error($connection)."<br>"; 
}

//Dropping a database
$sql="DROP DATABASE PHP_TUTORIAL";

// executing the query(param1-connection object, param2-sql query)
$result=mysqli_query($connection,$sql);

if ($result){
    echo "Database was dropped Successfully!<br>";
}
else{
    echo "Database was not dropped due to error ---> ".mysqli_error($connection)."<br>"; 
}

?>