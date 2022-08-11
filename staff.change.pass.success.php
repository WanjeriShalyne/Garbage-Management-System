<?php 
include_once("include/session.php");
include_once("include/connection.inc.php");
$email = $_SESSION['user'];


if(isset($_POST['change_password'])){
    $password=$_POST['password1'];
    $query = "UPDATE staff SET staffpassword='$password' WHERE email='$email'";
    $qry = mysqli_query($conn,$query) or die(mysqli_error($conn));

    echo "Success";

}

?>