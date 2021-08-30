<?php

// Opening a file
// filename and mode
$fptr=fopen("myfile.txt",'r');
// returns the file pointer if the resource is found else will return false


// fread reads the content of the file
$content=fread($fptr,filesize("myfile.txt"));

echo $content;

// release the resources to use the resources optimally
fclose($fptr);


?>