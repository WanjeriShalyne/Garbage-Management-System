<?php include '../include/session.php';?>
<html>
<head>

    <title>Admin Active Subscriptions</title>

    <link rel="stylesheet"  href="reports.admin.css">
    <link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--styling nav bar-->

    <style>
      .container{
          text-align:left;
          margin-top: 30px;
          font-size:18px;
        text-align:center;
        margin-bottom:30px;
      }

      .service{
       margin-left:30px;   
      }
      .service p{
       font-size:20px;   
      }
      .chagua select{
	height: 45px;
    font-size: 15px;
    width: 327px;
    background: #DCDCDC;
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

    <div class="container">
	<h1>Active Subscriptions</h1>
</div>

<div class="list">
<h3 >List of Customer with Active Subscription</h3>
</div><br>
                <table id="customers"> 
                        <tr>
                            <th>S.No#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Service Name </th>
                        <th>Subscription Date </th>
                        </tr>
                       <?php include('../include/connection.inc.php');
                       $query = "SELECT * FROM list_of_subscribed_customers_active";
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                       $count = mysqli_num_rows($qry);
                       $i=0;
                       while($row=mysqli_fetch_assoc($qry))
                       {
                       ?>
                        <tr>
                                      <!-- variable to increment by one -->
                            <!-- print data of column firstname,etc -->
                            <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['customer_firstname'];?></td>
                        <td><?php echo $row['customer_lastname'];?></td>
                        <td><?php echo $row['county'];?></td>
                        <td><?php echo $row['service_name'];?> </td>
                        <td><?php echo $row['date_of_subscription'];?> </td>
                        </tr>
                        <?php 
                       }
                    
                        ?>
                        
                </table>
             
            </div>
             
        </div>

    </div>
</span>
</body>
</html>