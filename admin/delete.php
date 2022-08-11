<?php 
include "../include/connection.inc.php";
 $service_code = $_POST['service_code'];

 $delete = "DELETE FROM services WHERE service_code = '$service_code'";

 $qry = mysqli_query($conn, $delete) or die("Error occured");
  echo "service deleted successfully";
?>