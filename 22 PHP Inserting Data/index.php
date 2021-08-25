<?php

$servername="localhost";
$username="root";
$password="";
$database="php_tutorial";


$connection=mysqli_connect($servername,$username,$password,$database);

if ($connection){
    echo "Connection was Successful <br>";
}
else{
    die("Connection was not successul ".mysqli_connect_error());
}

$name="David Goggins";
$gender="Male";
$position="Director";

$sql="INSERT INTO `employee` (`Name`, `Gender`, `Position`) VALUES ('$name', '$gender', '$position');";

$result=mysqli_query($connection,$sql);

if ($result){
    echo "Data was inserted <br>";
}
else{
    echo "Data was not inserted-> ".mysqli_error($connection)."<br>";
}

?>