<?php
//calling connection file 
require_once "include/connection.inc.php";

//isset(function)-form method for submitting after post.Arguemnet register is the name attribute of submit button
if(isset($_POST['update_cust_details'])){

//Get the fields input values
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];;
$email=$_POST['email'];
$mobilenumber=$_POST['mobilenumber'];
$password1=$_POST['pwd'];
$county=$_POST['county'];
$town=$_POST['town'];
$roadname=$_POST['roadname'];
$apartment=$_POST['apartment'];
$housenumber=$_POST['housenumber'];

//select data using sql statement 
$sql="UPDATE customerdetails SET first_name='$firstname', last_name='$lastname', email='$email',
mobile_number='$mobilenumber', customerpassword='$password1', county='$county', town='$town', roadname='$roadname',
apartments='$apartment', house_number='$housenumber'WHERE email='$email' ";

//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
$result=mysqli_query($conn,$sql);//put values into the DB

header("Location: cust.profile.php ");

}
?>