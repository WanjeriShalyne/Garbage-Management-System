<?php include_once('../../../include/session.php');?>
<!DOCTYPE html>

<head>
    
    <title>Admin Active_sub_location</title>
    <link rel="stylesheet"  href="../../../dashboard.admin.css">
    <link rel="stylesheet"  href="../../reports.admin.css">

    <style>

</style>
</head>


<body>

<!-- CALLING MENU .ADMIN.PHP THAT HAS NAVIGATION LINKS -->
	<?php include "../../menu.reports.php";?>

    <!--navigation-->
<span class="side_menu">
<h3> <a href="../reports/all.registered.customer.php">Registered Customers</a></h3>
   <h3> <a href="../reports/customers.active.subscription.php">Active Subscriptions</a></h3>
   <h3> <a href="../reports/customers.terminated.subscription.php">Terminated subscriptions</a></h3>
   
</span>
<span class="main_dashboard">


<div class="report_side_menu" >
<div class="reports_sidenav_menu"> 
		</div>
        </div>
        <div class="report_dashaboard">
          <!-- Form to filter by count and service-->
         
    
           
            <div><br><br><br><br>
                <h3 >  List of Registered Customers Between-:</h3>
               
                <table class="active_sub_table" id="customers"> 
                        <tr>
                        <th>First Name </th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Subscription Date</th>
                        <th>Service Name  </th>
                        </tr>
                       <?php include('../../../include/connection.inc.php');
                       if(isset($_POST['active_sub_location'])){
                           $start_date =$_POST[''];
                     
                       
                            // condition to check if service_filter is selected and county_filter is not selected
                          
                            $query = "SELECT * FROM customerdetails WHERE county ='$county_filter'";
                            $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                            $count = mysqli_num_rows($qry);
                            
                            echo "Filter name : $county_filter   Total  $count";
                            
                            while($row=mysqli_fetch_assoc($qry))
                       {
                        
                       ?>
                        <tr>
                        <td><?php echo $row['customer_firstname'];?></td>
                        <td><?php echo $row['customer_lastname'];?></td>
                        <td><?php echo $row['county'];?></td>
                        <td><?php echo $row['date_of_subscription'];?> </td>
                        <td><?php echo $row['service_name'];?> </td>
                        </tr>
                        <?php 
                      
                       }}
                    
                        ?>
                         <tr>
                        <td colspan=""></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?> </td>
                    <td> Totals Number of customers ----------------------- <?php echo $count; ?> </td>
                        </tr>
                        
                </table>
             
            </div>
             
        </div>

    </div>
    
</body>
</html>