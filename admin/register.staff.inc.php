<?php
//calling connection file 
include '../include/connection.inc.php';

//isset(function)-form method for submitting after post.Arguemnet register is the name attribute of submit button
//if(isset($_POST['register'])){

//Get the fields input values
$idnumber=$_POST['id_number'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$surname=$_POST['surname'];
$email=$_POST['email'];
$mobilenumber=$_POST['mobilenumber'];
$staffnumber=$_POST['staff_number'];
$staffpassword=sha1($_POST['pwd']);
$staffrole=$_POST['staffrole'];

$sql="INSERT INTO staff(id_number,first_name,middle_name,surname,email,mobile_number,staff_number,staffpassword,
staffrole) 
values('$idnumber','$firstname','$middlename','$surname','$email','$mobilenumber',
'$staffnumber','$staffpassword','$staffrole');";

$result=mysqli_query($conn,$sql);//put values into the DB

header("Location:dashboard.admin.staff.php ");
//}
?>