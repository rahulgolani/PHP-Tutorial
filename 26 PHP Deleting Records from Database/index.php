<?php

$servername='localhost';
$username="root";
$password='';
$databse='php_tutorial';

$connection=mysqli_connect($servername,$username,$password,$databse);

if ($connection){
    echo "Connecton Successful <br>";
}
else{
    die("Connection Failed "). mysqli_connect_error();
}


$sql= "SELECT * FROM employee";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)){
    echo "Name: ".$row['Name']." Position: ".$row['Position'];
    echo "<br>";
}

$sql= "DELETE FROM employee WHERE sno='1'";

$result=mysqli_query($connection,$sql);
$rowsAffected=mysqli_affected_rows($connection);
echo "<br>";
echo $rowsAffected."<br><br>";

$sql= "SELECT * FROM employee";
$result=mysqli_query($connection,$sql);
while ($row=mysqli_fetch_assoc($result)){
    echo "Name: ".$row['Name']." Position: ".$row['Position'];
    echo "<br>";
}

//LIMIT Clause-> Limits the records to be affected

?>