<?php

// SESSION-> is a way to use the information across different pages

// ANALOGY-> suppose you open facebook with your login credentials and then open facebook/kpmg, then to access this page facebook should not ask you the credential again, so this reusability of information across different pages is achieved by sessions


// verify username and password
session_start();//keep it always at the top of html
$_SESSION['username']="Rahul Golani";
$_SESSION['company']="KPMG";
echo "YOU ARE LOGGED IN!<br>";

?>