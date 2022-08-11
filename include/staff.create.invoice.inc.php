<?php 
include_once'session.php';
if(isset($_POST['create_invoice'])){
	$service_sub_code=$_POST['customer_sub_code'];
	$service_code=$_POST['service_code'];
	$invoice_amount=$_POST['invoice_amount'];
	$service_status=$_POST['service_status'];
	$invoice_date=$_POST['invoice_date'];
    $invoice_desc = $_POST['invoice_desc'];
    $staff_name = $_SESSION['user'];


		//Select customer email from serviceoders table where service_subscriptio = $customer_subscribed_service
		$query_email= "SELECT customeremail FROM serviceorder WHERE service_subscription_code='$service_sub_code'";
		include_once"../include/connection.inc.php";
		$qry_email=mysqli_query($conn, $query_email) or die(mysqli_error($conn));
		while($row=mysqli_fetch_assoc($qry_email)){
			$customer_email= $row['customeremail'];
		}
        
		$insert_query= "INSERT INTO invoicestatement (`id`, 
                                                    `amount`, 
                                                    `invoice_date`, 
                                                    `invoice_desc`, 
                                                    `customeremail`,
                                                    `service_subscription_code`, 
                                                    `service_status`, 
                                                    `service_code`, 
                                                    `staff_name`)
                                                VALUES ('',
                                                '$invoice_amount',
                                                '$invoice_date',
                                                '$invoice_desc',
                                                '$customer_email',
                                                '$service_sub_code',
                                                '$service_status',
                                                '$service_code',
                                                '$staff_name')";
		$qry_insert=mysqli_query($conn,$insert_query) or die(mysqli_error($conn));
       echo "Invoice created successful";
       ?>
        <a href="../dashboard.staff.invoice.php"><p> Back to invoice</p></a>
       <?php
	}
	else{
		echo "All field must be field";
	}
	


?>