<?php

//Where Clause Example

$servername="localhost";
$username="root";
$password="";
$database="php_tutorial";

$connection=mysqli_connect($servername,$username,$password,$database);

if ($connection){
    echo "Connection Successful <br>";
}
else{
    die("Failed to Connect ".mysqli_connect_error());
}

$sql="SELECT * FROM employee WHERE position='Associate Consultant'";

$result=mysqli_query($connection,$sql);
// echo var_dump($result);
while ($row=mysqli_fetch_assoc($result)){
    echo "Name: ".$row['Name']. " Position: ".$row['Position'];
    echo "<br>";
}

//Update Clause Example

$sql="UPDATE employee SET position='Senior Associate Consultant' WHERE sno='1`='";
$result=mysqli_query($connection,$sql); //returns boolean for updation
// To print number of affected rows use mysqli_affected_rows($connection)
// echo var_dump($result);
echo "<br><br>";
//Getting Records
$sql="SELECT * FROM employee";
$result=mysqli_query($connection,$sql);
// echo var_dump($result);
while ($row=mysqli_fetch_assoc($result)){
    echo "Name: ".$row['Name']. " Position: ".$row['Position'];
    echo "<br>";
}




?>