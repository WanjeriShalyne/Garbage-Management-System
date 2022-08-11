<?php 
session_start();
      //connect to db
      include_once('../include/connection.inc.php');

	if(isset($_POST['submit'])){

	//get data from the form,'email' is from admin.php,input (name)
	$email = $_POST['email'];
  //pwd is name input from form
	$password = sha1($_POST['pwd']);


	//checking if all field have value using php
    if($email == "" || $password==""){
      echo "All fileds are required!";
    }

    //Sql statement
    $admin = 'admin';
    $sql ="SELECT * FROM staff WHERE email = '$email' AND staffpassword = '$password'
     AND staffrole= '$admin'";

     //sql query
    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // rows matching the passed parameters/values
    $count = mysqli_num_rows($qry);
    if ($count==1)
    {
      $_SESSION['user'] = $email;
      header("location:dashboard.admin.php");
    }
    else
    {
      echo "Sorry login unsuccessful";
    }


  }
?>

