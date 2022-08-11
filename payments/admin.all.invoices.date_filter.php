<?php include_once('../include/session.php');?>
<!DOCTYPE html>

<head>
    
    <title>Service Subscriptions by date</title>  
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">
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
<!--navigation-->
<div class="navbar"> 
		<ul >
		<li><a href="../admin/dashboard.admin.php">  Home </a></li>
        <li><a href="admin.all.invoices.php"> All Invoices</a></li>
		<li><a href="admin.cust.invoices.service_filter.php">Invoices filter by service</a></li>
        <li><a href="admin.cust.invoices.county_filter.php">Invoices filter by county</a></li>
        <li><a href="admin.create.invoice.php"> Create Invoice</a></li>
		<li><a href="../admin/admin.php">Logout </a></li>

		</ul>
	</div>
    <!--navigation-->

    <!-- Form to filter by count and service-->
    <?php include('../include/connection.inc.php');
        // active_cust_service_date is the name of button from active_sub_service_filter.php
        //'service_filter is from active_sub_service_date_filter.php
     if(isset($_POST['admin.all.invoices.date_filter'])){
    $service_filter=$_POST['service_filter'];
     $startdate =$_POST['startdate'];
     $enddate =$_POST['enddate']; 
     ?>
            
    
            <div class="container">
	<h1> Invoices</h1> <br>
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

<table class="active_sub_table" id="customers"> 
                        <tr>
                        <th>Invoice Date</th>
                        <th>Service Name</th>
                        <th>Customer First Name</th>
                        <th>Customer Last Name</th>
                        <th>Amount </th>
                        <th> Mobile Number </th>
                        <th> County </th>
                        <th>Town </th>
                        <th>Roadname </th>
                        <th>Estate/Building Name </th>
                        <th>House/Room Number </th>
                        <th>Serviced by: </th>
                        </tr>
    <!-- creating connection with DB  -->
  
     <?php       
// condition to check if service_filter is selected 
                          
//select data using sql statement   
$query = "SELECT * FROM invoice_cust_all WHERE service_code ='$service_filter' AND
date_of_subscription BETWEEN '$startdate' AND '$enddate'";
//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
     //return number of rows in a result set
      $count = mysqli_num_rows($qry);?>
      <div class="tarehe">
        <?php echo $startdate ."   and   ".$enddate; ?>
        </div>
        <?php
//fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array
      while($row=mysqli_fetch_assoc($qry))
  {
                        
  ?>
  
      <!-- customer_firstname is a table column in (list_of_subscribed_customers_active) table -->
<tr>
                        <td><?php echo $row['invoice_date'];?></td>
                        <td><?php echo $row['service_name'];?></td>
                        <td><?php echo $row['customer_firstname'];?></td>
                        <td><?php echo $row['customer_lastname'];?> </td>
                        <td><?php echo $row['amount'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['county'];?> </td>
                        <td><?php echo $row['town'];?> </td>
                        <td><?php echo $row['roadname'];?> </td>
                        <td><?php echo $row['apartments'];?> </td>
                        <td><?php echo $row['house_number'];?> </td>
                        <td><?php echo $row['staff_firstname'];?> </td>
                        </tr>
   <?php 
 }}
                    
 ?>
  <tr>
                        <td colspan=""></td><!-- defines the number of columns a cell should span. -->
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