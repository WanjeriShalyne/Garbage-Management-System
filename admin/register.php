<?php 
include "../include/connection.inc.php";
$service_code = $_POST['service_code'];
$service_name = $_POST['service_name'];
if ($service_code!=="" OR $service_name!=""){ 
$query = "INSERT INTO services ( service_code,service_name) 
VALUES( '$service_code', '$service_name')";
$qry = mysqli_query($conn, $query) or die("Error occured");
echo "service registered";

}
?>
