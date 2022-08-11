<?php
//start session
include '../include/session.php';
include '../include/connection.inc.php';
?>

<html>
<head>
 
    <title>All Registered Clients List</title>
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">

    <style>
        /* styling the statement filter by */
.container{
        margin-top: 20px;
        font-size:18px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */

  </style>

</head>


<body>
 
	<!-- CALLING MENU .ADMIN.PHP THAT HAS NAVIGATION LINKS -->
	<?php include "menu.reports.php";?>

    <!--navigation-->
<div class="side_menu">
    <h3> <a href="../reports/all.registered.customer.php">Registered Customers</a></h3>  <br>
   <h3> <a href="../reports/customers.active.subscription.php">Active Subscriptions</a></h3>  <br>
   <h3> <a href="../reports/customers.terminated.subscription.php">Terminated subscriptions</a></h3>  <br>
   
</div>
<div class="main_dashboard">



    <div class="container">
	<h2>List of all registered customers</h2> <br>
  
                <br>
                <table  id="customers"> 
                        <tr>
                        <th>S.No#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email </th>
                        <th>Mobile Number </th>
                        <th>County </th>
                        <th>Town </th>
                        <th>Road Name </th>
                        <th>Estate/Building Name</th>
                        <th>House/Room Number </th>
                        
                        </tr>
                       <?php include '../include/connection.inc.php';
   //    sql statement to get data from table customerdetails presented in db
                       $query = "SELECT * FROM customerdetails ";
 //execute SQL query.mysqli_error() function returns the last error description for the most recent function call
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                        //return number of rows i a result set
                       $count = mysqli_num_rows($qry);
                       //declaring incremental variable
                       $i = 0;
                       
                      // While condition is true,it will output the following://collecting resulted data in $row
                       while($row=mysqli_fetch_assoc($qry))
                       {
                       ?>
                        <tr>
                          <!-- variable to increment by one -->
                           <!-- print data of column firstname,etc -->
                        <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['email'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['county'];?></td>
                        <td><?php echo $row['town'];?></td>
                        <td><?php echo $row['roadname'];?></td>
                        <td><?php echo $row['apartments'];?></td>
                        <td><?php echo $row['house_number'];?></td>

                        </tr>
                        <?php 
                       }
                    
                        ?>

                        
                </table>
             
            </div>
             
        </div>

    </div>
  
  </div>
</body>
</html>