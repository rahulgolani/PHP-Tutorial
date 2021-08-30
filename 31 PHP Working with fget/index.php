<?php

// fgets reads file content line by line
$fptr=fopen("myfile.txt",'r');
if (!$fptr){
    die("Unable to Open the file. Please Try Again!");
}

while($content=fgets($fptr)){
    echo $content;
}
fclose($fptr);
echo "<br><br>";

$fptr=fopen("myfile.txt",'r');
// fgetc reads file character by character
while($content=fgetc($fptr)){
    echo $content;
}


fclose($fptr);


?>