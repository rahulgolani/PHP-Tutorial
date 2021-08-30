<?php


//WRITING THE CONTENT IN THE FILE
$fptr=fopen("myfile.txt",'w');
//if file does not exists php will create a new file if opened in write mode
// once opened a file the pointer will be pointing to the starting of the file and the content will be written again from here, no matter if the file was empty or had some content in it

fwrite($fptr,"My name is Rahul Golani.\n");
fwrite($fptr,"I am writing in this file.\n");
fclose($fptr);

//APPENDING THE CONTENT IN THE FILE
$fptr=fopen("myfile.txt",'a');

// IF OPENED IN THE APPEND MODE, THE POINTER POINTS TO THE END OF THE FILE AND FILE WRITING STARTS FROM HERE
fwrite($fptr,"This is appended the file");

fclose($fptr);
?>