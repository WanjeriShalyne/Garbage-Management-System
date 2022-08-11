<?php include_once('../include/session.php');?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Admin Users</title>
    <link rel="stylesheet"  href="../dashboard.admin.css">
    <link rel="stylesheet"  href="reports.admin.css">
</head>


<body>
    <!--navigation-->
		<!--navigation-->
<div class="navbar"> 
		<ul >
		<li><a href="../dashboard.admin.php">  Home </a></li>
        <li><a href="../dashboard.admin.reports.php">Reports </a></li>
		<li><a href="dashboard.admin.staff.php"> Add Staff </a></li>
		<li><a href="../include/admin.logout.php">Logout </a></li>

		</ul>
	</div>


        </div>
        <div class="report_dashaboard">
          <!-- Form to filter by count and service-->
         
            
          <form action="detailed.reports/detailed.reports/active_sub_filter.php" method="POST" ><br><br>
            <div>
                <span class="filter_form_inputes filter_desc"  style="width: 18%; float:left">
                    Start Date:
                </span>
                <span class="filter_form_inputes filter_name_county" style="width: 50%; float:left">
                <input name="StartDate" id="StartDate" type="date">
                         
                        
                </span>
                <span class="filter_form_inputes filter_desc"  style="width: 18%; float:left">
                    End Date:
                </span>
                
                <span class="filter_form_inputes filter_name_county" style="width: 50%; float:left">
                <input name="EndDate" id="EndDate" type="date">
                         
                        
                </span>
                
                <span class="filter_form_inputes filter_name_county" style="width: 85%; float:left">
                        <button type="submit" name="active_sub" style="width: 50%; float:left">
                            Generate
                        </button>
                </span>
            </div>  
            </form>
            <div><br><br><br><br>
                <h3 >List of All Registered Customers</h3>
               
                <table class="active_sub_table" id="customers"> 
                        <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Email </th>
                        <th>Mobile Number </th>
                        </tr>
                       <?php include('../include/connection.inc.php');
                       $query = "SELECT * FROM customerdetails ";
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                       $count = mysqli_num_rows($qry);
                       while($row=mysqli_fetch_assoc($qry))
                       {
                       ?>
                        <tr>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['county'];?></td>
                        <td><?php echo $row['email'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        </tr>
                        <?php 
                       }
                    
                        ?>
                         <tr>
                        <td colspan=""></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?> </td>
                        <td>Totals Number of customers ----------------------- <?php echo $count;?> </td>
                        </tr>
                        
                </table>
             
            </div>
             
        </div>

    </div>
    
</body>
</html>