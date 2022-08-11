<?php
//calling connection file 
include "connection.inc.php";

//isset(function)-form method for submitting after post.Arguemnet register is the name attribute of submit button
//if(isset($_POST['register'])){

//Get the fields input values
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$mobilenumber=$_POST['mobilenumber'];
$password1=sha1($_POST['password1']);
$password2=$_POST['password2'];
$county=$_POST['county'];
$town=$_POST['town'];
$roadname=$_POST['roadname'];
$apartment=$_POST['apartment'];
$housenumber=$_POST['housenumber'];

// restrict registration
$query = "SELECT email FROM customerdetails WHERE  email = '$email'";

$qry = mysqli_query($conn, $query) or  die(mysqli_error($conn));

$checkIfEmailExist = mysqli_num_rows($qry);

if($checkIfEmailExist==0){
$sql= "INSERT into customerdetails(first_name,last_name,email,customerpassword,
mobile_number,county,town,roadname,apartments,house_number) 
values('$firstname','$lastname','$email','$password1','$mobilenumber',
'$county','$town','$roadname','$apartment','$housenumber')";

$result=mysqli_query($conn,$sql);//put values into the DB

header("Location:../login.php ");
}else 
{
    echo "Email exist";
}
//}
?>