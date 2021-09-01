<?php

// COOKIE IS A TAG WHICH IS GIVEN TO A USER SO THAT USER CAN BE RECOGNIZED AGAIN

// if a user is accessing a ecommerce website, and your favourite content is browsing books so cookie is used to set the user preferences so that the same content can be shown when theuser visits again

// in short cookie is a short file which is stored on the computer of a user in order to recognize the user again

// Difference between COOKIE and SESSION is that cookie(on browser) is used to store user preference while more sensitive data like username password is stored in SESSIONS (on server) 

// parameters-> key, value, expireTime, domain (use / to use the cookie overall on the website)
setcookie("category","books",time()+86400,'/');

echo "The Cookie is set<br><br>";


//to retrieve a cookie we can use a superglobal variable $_COOKIE
$cat=$_COOKIE['category'];
echo "The cookie is set as ".$cat;

?>