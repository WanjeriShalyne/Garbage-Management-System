<?php
// starts the session
session_start();


session_destroy();
header("Location:../staff.php");
//logs out staff
?>