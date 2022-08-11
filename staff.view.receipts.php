<?php
 include_once 'include/session.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>View All Payments</title>
	<link rel="stylesheet"  href="admin/dashboard.admin.css">

       <style>
  
/* styling the statement filter by */
.container{
        margin-top: 20px;
        font-size:18px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */

/* styling tables */
#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  
  #customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;}
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4682b4;
    color: white;
  }
  
  /* styling tables */
     </style>
</head>

<body>
    
<!--navigation-->
<div class="navbar"> 
		<ul >
		<li><a href="dashboard.staff.php">  Home </a></li>
        <li><a href="payments/admin.view.all.payments.php">All Payments</a></li>
        <li><a href="payments/admin.payments.services.php">Payments per Service </a></li>
        <li><a href="payments/admin.payments.county.php">Payments per County </a></li>
		<li><a href="include/staff.logout.inc.php">Logout </a></li>

		</ul>
</div>
<!--navigation-->
    <?php 
    //logedin user
    $email = $_SESSION['user'];
    //connection to db
    include_once 'include/connection.inc.php';
    
    //select data using sql statement   
    $query = "SELECT * FROM serviceorder";

//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $customer_serv_sub= mysqli_query($conn,$query) or die(mysqli_error($conn));

      //return number of rows in a result set
    $num=mysqli_num_rows($customer_serv_sub);
    ?>

<div class="container">
	<h1> Receipts</h1> <br>
<form action="" method="$_POST">
<button type="submit" style="width: 12%; height:10%; font-size:16px;float:right;margin-right:10px;">
                           FILTER BY MONTH </button> <br> <br>
 <button type="submit" style="width: 12%; height:10%; font-size:16px;float:right;margin-right:10px;">
                           FILTER BY YEAR </button> <br>
  
</div>
</form>


<form name = "RegisterForm" action="#" method="POST" onsubmit="return Validate()"><br><br>
           
        <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
                  START DATE: 
     </div>
     <input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

     <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
     </div>
     <input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">
     
<input name="service_filter" id="service_code" type="text" value="<?php echo $service_filter;?>" style="display:none;">
                
  <button type="submit" name="admin.all.invoices.date_filter" style="width: 10%; height:10%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate
                        </button> <br>
   
            </div>  
            </form>
            <br>

<table class="active_sub_table" id="customers"> 
                        <tr>
                        <th> First Name</th>
                        <th> Last Name</th>
                        <th> Service Name</th>
                        <th>Amount</th>
                        <th>Receipt Date</th>
                        <th>Reference Number</th>
                        <th> Mode of payment</th>

                        </tr>
                       <?php include('../include/connection.inc.php');
                       $query = "SELECT * FROM receiptsstatement ";
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                       $count = mysqli_num_rows($qry);
                       while($row=mysqli_fetch_assoc($qry))
                       {
                       ?>
                        <tr>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['payment_description'];?></td>
                        <td><?php echo $row['amount'];?></td>
                        <td><?php echo $row['receipts_date'];?> </td>
                        <td><?php echo $row['reference_number'];?> </td>
                        <td><?php echo $row['payment_mode'];?> </td>
                      
                        </tr>
                        <?php 
                       }
                    
                        ?>
                         <tr>
                        <td colspan=""></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?> </td>
                        <td>Totals Number invoices : <?php echo $count;?> </td>
                        </tr>
                        
                </table>




</body>
</html>

