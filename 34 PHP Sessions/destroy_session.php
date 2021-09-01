<?php

//logout

session_start();
session_unset();//free all session variables
session_destroy();
echo "YOU HAVE BEEN LOGGED OUT!<br>";


?>