<!-- start of php -->
<?php 

// specify hostname,specify mysql username etc
$servername="localhost"; //local computer
$username="root"; //by default grant access all commands and files
$password=""; //no password
$database = "garbage"; //reference to the garbage db

// open new connection to mysql server using the parameters listed below. Open connection to mysql server
$conn = mysqli_connect($servername,$username,$password,$database);

//check connection
if(!$conn)
{
    die("connection failed" .mysqli_connect_error());
    //return error description from last connection error if any
}


 
?>
<!-- end of php -->