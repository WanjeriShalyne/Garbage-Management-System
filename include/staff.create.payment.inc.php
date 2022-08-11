<?php 
include_once 'session.php';
include_once "connection.inc.php";

//isset(function)-form method for submitting after post.Arguemnet register is the name attribute of submit button
// create_payment is the name of button from staff.create.payment.php
if(isset($_POST['create_payment'])){
    $service_sub_code = $_POST['subscription_code_service'];
	$payment_amount=$_POST['payment_amount'];
	$payment_date=$_POST['payment_date'];
    $payment_desc = $_POST['payment_desc'];
    $staff_name = $_SESSION['user'];
    $payment_reference_no = $_POST['payment_reference'];
    $payment_mode = $_POST['payment_mode'];
		//Select customer email from serviceorders table where service_subscription = $customer_subscribed_service
		$query_details= "SELECT * FROM serviceorder WHERE service_subscription_code='$service_sub_code'";
   //open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
		$qry_details=mysqli_query($conn, $query_details) or die(mysqli_error($conn));
    // fetch result row as an associative array. Arrays that use named keys that you assign to them 
    //eg $age['peter']="35";
		while($row=mysqli_fetch_assoc($qry_details)){
			$customer_email= $row['customeremail'];
            //$row['service_code']; service code db variable
            $service_code = $row['service_code'];
            $service_status =$row['status'];
            $query = "SELECT first_name, last_name FROM customerdetails WHERE email = '$customer_email'";
            $qry =mysqli_query($conn,$query) or mysqli_error($conn);
                // fetch result row as an associative array. Arrays that use named keys that you assign to them 
    //eg $age['peter']="35";
    // While condition is true,it will output the following:
            while($get =mysqli_fetch_assoc($qry)){
              $firstname=$get['first_name'];
              $lastname=$get['last_name'];
            }
		}
        
		$insert_query= "INSERT INTO receiptsstatement (`id`,
                                                      `first_name`,
                                                      `last_name`,
                                                        `payment_description`,
                                                         `amount`,
                                                        `receipts_date`,
                                                         `reference_number`,
                                                         `service_subscription_code`, 
                                                         `service_code`, 
                                                         `customeremail`, 
                                                         `service_status`,
                                                         `payment_mode` )
                                                                  VALUES ('',         
                                                                  '$firstname',
                                                                  '$lastname',
                                                                '$payment_desc',
                                                                '$payment_amount',
                                                                '$payment_date',
                                                                '$payment_reference_no',
                                                                '$service_sub_code',
                                                                '$service_code',
                                                                '$customer_email',
                                                                '$service_status',
                                                                '$payment_mode')";
		$qry_insert=mysqli_query($conn,$insert_query) or die(mysqli_error($conn));
       echo "Receipt created successful";
       ?>
      <a href="../dashboard.staff.receipt.php"><p> Back to payment</p></a> 
       <?php
	// }
	// else
	// 	echo "All field must be field";
	// }
	
}
else{
	echo "An error occurred";
}
?>