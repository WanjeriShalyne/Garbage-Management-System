<?php
//calling connection file 
require_once "include/connection.inc.php";
require_once "include/session.php";

//isset(function)-form method for submitting after post.Arguemnet register is the name attribute of submit button
if(isset($_POST['update_cust_details'])){

//Get the fields input values of name
$email = $_SESSION['user'];
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$mobilenumber=$_POST['mobilenumber'];
$county=$_POST['county'];
$town=$_POST['town'];
$roadname=$_POST['roadname'];
$apartment=$_POST['apartment'];
$housenumber=$_POST['housenumber'];


$sql="UPDATE customerdetails SET first_name = '$firstname',last_name ='$lastname',
mobile_number = '$mobilenumber',county = '$county',town ='$town', roadname='$roadname',apartments='$apartment',
house_number= '$housenumber' WHERE email = '$email'"; 


$result=mysqli_query($conn,$sql);//put values into the DB

header("Location:cust.profile.php ");

}
?>