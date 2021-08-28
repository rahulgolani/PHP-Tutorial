<?php

$servername='localhost';
$username='root';
$password='';
$database='php_tutorial';

$connection=mysqli_connect($servername,$username,$password,$database);

if ($connection){
    echo "Connection Successful! <br>";
}
else{
    die("Connection Failed ".mysqli_connect_error()."<br>");
}

$sql="SELECT * FROM employee";
$result=mysqli_query($connection,$sql);

$numRows=mysqli_num_rows($result);
echo $numRows."<br>";

while ($row=mysqli_fetch_assoc($result)){
    echo "Name: ".$row['Name']. " || Position: ". $row['Position']. " || Gender: ".$row['Gender'];
    echo "<br>";

}

?>