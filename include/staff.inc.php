<?php 
  session_start();
	if(isset($_POST['submit'])){

	//get data from the form
    //1st email is php variable,2nd is form value
	$email = $_POST['email'];
//pwd is name input from form
	$password =sha1($_POST['pwd']);

	//checking if all field have value
    if($email == "" && $password==""){
      echo "All fileds are required!";
    }

    //Sql statement
    //1st email that aint quoted is a db variable
    $sql ="SELECT * FROM staff WHERE email = '$email' AND staffpassword = '$password'";

    //connect to db
    include_once('connection.inc.php');

    //sql query
    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // rows matching the passed parameters/values
    $count = mysqli_num_rows($qry);
    if ($count==1)
    {
      $_SESSION['user'] = $email;
      header("location:../dashboard.staff.php");
    }
    else
    {
      echo "Sorry login unsuccessful";
    }


  }
?>

