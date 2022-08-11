<?php
// remove all global session variables and destroy session
session_destroy();
header("Location:../login.php");

//logs out customer 
?>