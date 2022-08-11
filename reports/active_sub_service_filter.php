<?php include '../include/session.php';?>
<html>

<head>
    
    <title>Service Subscriptions</title>
    <link rel="stylesheet"  href="reports.admin.css"> <!--styling table-->
    <link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--styling nav bar-->
    <style>
      .container{
    text-align:left;
    margin-top: 30px;
    font-size:18px;
    text-align:center; /*position*/
    margin-bottom:30px; /*defines the space around an HTML element*/
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
    <?php include('../include/connection.inc.php');
        // active_sub -name of button from customers.active.subscription.php
        //'service_filter is from customers.active.subscription.php
     if(isset($_POST['active_sub'])){
     $service_filter =$_POST['service_filter']; 
     ?>

<div class="container">
     <h3 >  List of Subscripted Customers Per Service</h3>
</div>
            
    <form action="active_sub_service_date_filter.php" method="POST" ><br><br>
    <input value="<?php echo $service_filter;?>" name="service_filter" style="display:none">
               
    <div class="tarehe"  style="width: 18%; float:left; margin-left:10px; font-size:18px">
                  START DATE: 
     </div>
     <input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

     <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
     </div>
     <input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;"> 

     <button type="submit" name="active_cust_service_date" style="width: 10%; height:5%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate
                        </button>  <br>
                
                
            </div>  
            </form>
            <br>
 <br>

                        <table  id="customers"> 
                        <tr>
                        <th>S.No#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Subscription Date</th>
                        <th>Service Name  </th>
                        </tr>
    <!-- creating connection with DB  -->
  
     <?php      
//select data using sql statement            
$query = "SELECT * FROM list_of_subscribed_customers_active WHERE service_code ='$service_filter '";
//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //return number of rows in a result set
      $count = mysqli_num_rows($qry);
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
                            <td><?php echo $row['date_of_subscription'];?> </td>
                            <td><?php echo $row['service_name'];?> </td>
</tr>
   <?php 
 }}
                    
 ?>

                        
                </table>
             
            </div>
             
        </div>

    </div>
</span>
</body>
</html>