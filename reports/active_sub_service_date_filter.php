<?php include '../include/session.php';?>
<html>

<head>
    
    <title>Service Subscriptions by date</title>  
    <link rel="stylesheet"  href="reports.admin.css"> <!--styling table-->
    <link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--styling nav bar-->
    <style>
      .container{
    text-align:left;
    margin-top: 30px;
    font-size:18px;
    text-align:center;
    margin-bottom:30px;
      }

      .tarehe{
          text-align: center;
          font-weight: bold;
          font-size: 18px;
      }
    </style>
</head>


<body>
 	<!-- CALLING MENU .ADMIN.PHP THAT HAS NAVIGATION LINKS -->
     <?php include "menu.reports.php";?>

<!--navigation-->
<div class="side_menu">
<h3> <a href="../reports/all.registered.customer.php">Registered Customers</a></h3> <br>
   <h3> <a href="../reports/customers.active.subscription.php">Active Subscriptions</a></h3> <br>
   <h3> <a href="../reports/customers.terminated.subscription.php">Terminated subscriptions</a></h3> <br>
   
</div>
    </div>
    <span class="main_dashboard">
    <!-- Form to filter by count and service-->
    <?php include '../include/connection.inc.php';
    // active_cust_service_date is the name of button from active_sub_service_filter.php
    //'service_filter is from active_sub_service_date_filter.php
 //if(isset($_POST['active_cust_service_date'])){
 $service_filter =$_POST['service_filter'];
 $startdate =$_POST['startdate'];
 $enddate =$_POST['enddate']; 
 ?>
    
          

    <div class="container">
     <h3 >  List of Customer Subscripted between:</h3>
</div>

    <table  id="customers"> 
    <tr>
    <th>S.No#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Service Name</th>
                        <th>Subscription Date</th>
                        <th>End Date </th>
                        </tr>
    <!-- creating connection with DB  -->
  
     <?php       
        
     // condition to check if service_filter is selected 
                               
     //select data using sql statement   
     $query = "SELECT * FROM list_of_subscribed_customers_active WHERE service_name ='$service_filter' AND
     date_of_subscription BETWEEN '$startdate' AND '$enddate'";
//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
     //return number of rows in a result set
      $count = mysqli_num_rows($qry);?>
      <!-- <div class="tarehe">
         <?php  ?> -->
        </div> 
        <?php
         //declaring incremental variable
         $i = 0;
//fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array
      while($row=mysqli_fetch_assoc($qry))
  {
                        
  ?>
  <tr>
      <!-- customer_firstname is a table column in (list_of_subscribed_customers_active) table -->
                 <!-- variable to increment by one -->
                            <!-- print data of column firstname,etc -->
                            <td><?php echo $i =$i+1;?></td>
<td><?php echo $row['customer_firstname'];?></td>
<td><?php echo $row['customer_lastname'];?></td>
 <td><?php echo $row['county'];?></td>
 <td><?php echo $row['service_name'];?> </td>
 <td><?php echo $row['date_of_subscription'];?> </td>
 <td><?php echo $row['enddate'];?> </td>

</tr>
   <?php 
 } 
//}
                    
 ?>
  <tr>


                </table>
             
            </div>
             
        </div>

    </div>
    </span>
    
</body>
</html>