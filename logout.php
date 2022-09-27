<?php

session_start();
session_destroy();
//Cookies entfernen
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));
// Redirect to the login page:
header('Location: generator.php');
