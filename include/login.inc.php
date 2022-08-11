<?php 
 //resume/starts session. store info in variables until user closes the browser
  session_start();

  //check if variable is declared using post method.Works if input type submit has a name attribute matching name of button
	if(isset($_POST['submit'])){

	//get data from the form
    //1st email is php variable,2nd is form value
	$email = $_POST['email'];
//pwd is name input from form
	$password =sha1( $_POST['pwd']);
  

    //Sql statement .Select data using sql statement
    //1st email that aint quoted is a db variable
    $sql ="SELECT * FROM customerdetails WHERE email = '$email' AND customerpassword = '$password'";
  
    //connect to db
    include 'connection.inc.php';

    //sql query.performs a query against a database.Check connection else terminate and return error description from
    // last connection error

    $qry = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    // rows matching the passed parameters/values
    $count = mysqli_num_rows($qry);
    if ($count==1)
    {
      //session start -> assigned varriable $_SESSION['user']
      $_SESSION['user'] = $email;
     
        // ../ to move one folder backword
      header("location:../dashboard.cust.php");
    }
    else
    {
      echo "Sorry login unsuccessful";
    }


  }
?>

