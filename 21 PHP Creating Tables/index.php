<?php


$servername="localhost";
$username="root";
$password="";
$database="php_tutorial";

$connection=mysqli_connect($servername,$username,$password,$database);

if ($connection){
    echo "Connection was Successful! <br>";
}
else{
    echo "Connection Failed --> ".mysqli_connect_error(). "<br>";
}

//CREATING TABLE

$sql="CREATE TABLE `Employee` ( `SNo` INT NOT NULL AUTO_INCREMENT ,  `Name` VARCHAR(50) NOT NULL ,  `Gender` VARCHAR(15) NOT NULL ,  `Position` VARCHAR(30) NOT NULL ,    PRIMARY KEY  (`SNo`));";

$result=mysqli_query($connection,$sql);

if ($result){
    echo "Table was created Succesfully! <br>";
}
else{
    echo "Table was not created! --> ".mysqli_error($connection);
}



?>