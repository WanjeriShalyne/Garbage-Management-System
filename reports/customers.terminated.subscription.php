<?php include '../include/session.php';?>
<html>
<head>

    <title>Terminated Members</title>
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">

    <style>
 /* styling the statement filter by */
.container{
        margin-top: 20px;
        font-size:16px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */
</style>
</head>


<body>
 <!--navigation-->
<?php include "menu.reports.php";?>
    <!--navigation-->
    <div class="side_menu">
    <h3> <a href="../reports/customers.active.subscription.php">Active Subscriptions</a></h3> <br>
    <h3> <a href="../reports/all.registered.customer.php">Registered Customers</a></h3> <br> 
   <h3> <a href="../reports/customers.terminated.subscription.php">Terminated subscriptions</a></h3> <br>
    </div>

<div class="main_dashboard">
            <div class="container">
	        <h2>List of customers with Termninated subscriptions</h2> <br>
            <br> <br> <br>

<form name = "RegisterForm" action="terminated_services_by_date.php" method="POST" ><br><br>
           
 <div class="tarehe"  style="width: 18%; float:left; margin-left:10px; font-size:18px">
                  START DATE: 
</div>
<input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

<div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
</div>
<input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">
                     
<button type="submit" name="admin.all.invoices.date_filter" style="width: 10%; height:5%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate<br>
                        </button> <br>
   
            </div>  
            </form>
                <table  id="customers"> 
                        <tr>
                        <th>S.No#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Service Name </th>
                        <th>Subscription Date </th>
                        </tr>
                       <?php include '../include/connection.inc.php';
  //    sql statement to get data from table list_of_subscribed_customers_terminated presented in db
                       $query = "SELECT * FROM list_of_subscribed_customers_terminated ";
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
                            <!-- print data of column firstname,etc -->
                                 <!-- variable to increment by one -->
                        <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['customer_firstname'];?></td>
                        <td><?php echo $row['customer_lastname'];?></td>
                        <td><?php echo $row['county'];?></td>
                        <td><?php echo $row['date_of_subscription'];?> </td>
                        <td><?php echo $row['service_name'];?> </td>
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
