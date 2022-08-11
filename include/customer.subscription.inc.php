<?php 
//START SESSION AND CONNECTION TO MYSQL SERVER
include 'session.php';
include 'connection.inc.php';


//inserting from website to DB
//check if variable is declared. Form data collected during input in customer.subscription.php is passed into this document upon clicking submit thru create_subscription
//if(isset($_POST['create_subscription'])){
    $service_code =$_POST['service_code'];
    $start_date=$_POST['sub_start_date'];
    // $end_date=$_POST['sub_end_date'];
    //display user name of user logged into the session
    $email = $_SESSION['user'];
    //Generate service_subscription_code randomly and includes start date too of subscription
    $service_subscription_code = rand(0, 9999999)."/".$start_date;
    //display if customer is active/terminated
    $status ='active';


		//To check if customer has an existing subscription
        //sql statement
		$query_service= "SELECT * FROM serviceorder WHERE customeremail='$email' && 
        service_code='$service_code' && status='$status'";

        //execute sql query i.e $query_service else if connection not found,it exits and displays an error from last mysqli function call
		$qry_service=mysqli_query($conn, $query_service) or die(mysqli_error($conn));

        //$num checks if we had results from  the select statement
        $service_count=mysqli_num_rows($qry_service);

        if($service_count==0){
        $service_subscription_code=rand(0,9999999);

 $query ="INSERT INTO serviceorder (`id`, `service_code`, `service_subscription_code`,
 `customeremail`, `startdate`,  `enddate`, `status`) 
 VALUES('',  '$service_code', '$service_subscription_code','$email',  '$start_date',  '$end_date','$status')";
 //execute query after user has input data and its connected to db to display success if well executed
 $qry = mysqli_query($conn,$query) or die(mysqli_error($conn));
                                         echo "successful";

        
}
else{
    echo "You currently have an active subscription for the selected service";
    ?>
    <a href="../customer.subscription.php"><p> Back to subscription</p></a>
    <?php
}
//}
// else{
// 		echo "All field must be field";
//         ?>
   <!-- <a href="../customer.subscription.php"><p> Back to subscription</p></a> -->
  <?php     
// }

?>