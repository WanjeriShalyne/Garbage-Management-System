<?php 
// adding customer subscription - data goes to serviceorder table
include_once'session.php';
include_once'connection.inc.php';
if(isset($_POST['create_subscription'])){
	$customeremail=$_POST['customeremail'];
    $status =$_POST['status'] ;
	$service_code=$_POST['service_code'];
    $sub_start_date= $_POST['sub_start_date'];
    $sub_end_date= $_POST['sub_end_date'];
    $staff_name = $_SESSION['user'];
    
  
	if($customeremail!="" && $service_code!="" && $sub_start_date!="" && $sub_end_date!="")
    {

		//To check if customer has an existing subscription
		$query_service= "SELECT * FROM serviceorder WHERE customeremail='$customeremail' && service_code='$service_code' && status='$status'";
		include_once"../include/connection.inc.php";
		$qry_service=mysqli_query($conn, $query_service) or die(mysqli_error($conn));
        $service_count=mysqli_num_rows($qry_service);
        if($service_count==0){
        $service_subscription_code=rand(0,9999999) .$sub_start_date;
        
		
    $query ="INSERT INTO serviceorder (`id`,
                                     `service_code`,
                                      `service_subscription_code`,
                                      `customeremail`,
                                        `startdate`,
                                        `enddate`,
                                         `status`) 
                                         VALUES(
                                             '',
                                          '$service_code',
                                          '$service_subscription_code',
                                          '$customeremail',
                                          '$sub_start_date',
                                          '$sub_end_date',
                                          '$status'
                                         )";
  $qry = mysqli_query($conn,$query) or die(mysqli_query($conn));
                                         echo "successful";
       ?>
        <a href="../dashboard.staff.subscription.php"><p> Back to invoice</p></a>
       <?php
	}
    else{
        echo "customer has an activee subscription";
        ?>
        <a href="../dashboard.staff.subscription.php"><p> Back to subscription</p></a>
       <?php

    }
}

	else{
		echo "All field must be field";
        ?>
        <a href="../dashboard.staff.subscription.php"><p> Back to subscription</p></a>
       <?php
	}
	
}
}

?>