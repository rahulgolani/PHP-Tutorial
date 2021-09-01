<?php

session_start();
if (isset($_SESSION['username'])){
    echo "HELLO ".$_SESSION['username']."<br>";
    echo "Current Organization: ".$_SESSION['company']."<br>";
}
else{
    echo "PLEASE LOGIN TO CONTINUE<br>";
}

?>