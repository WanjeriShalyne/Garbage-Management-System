<?php
// start session and connection
 include '../include/session.php';
 include '../include/connection.inc.php';
?>
 <!DOCTYPE html>
 <html>
 <head>
 
     <title>View All Invoices By Services</title>
     <link rel="stylesheet"  href="../admin/dashboard.admin.css">
 
        <style>
   
 /* styling the statement filter by */
 .container{
         margin-top: 20px;
         font-size:18px;
         text-align:center; /*position: */;
       }
 /* styling the statement filter by */
 

   .tarehe{
          text-align: center;
          font-weight: bold;
          font-size: 18px;
      }
   
   /* styling tables */
      </style>
 </head>
 
 <body>
 <?php include "menu.payments.php";?>
    <!--navigation-->
    
    <div class="side_menu">
    <h3><a href="admin.all.invoices.php"> All Invoices</a></h3> <br>
		<h3><a href="admin.cust.invoices.service_filter.php">Invoices filter by service</a></h3> <br>
        <h3><a href="admin.cust.invoices.county_filter.php">Invoices filter by county</a></h3> <br>
        <h3><a href="admin.create.invoice.php">Create Invoice</a></h3> <br>

    </div>
<div class="main_dashboard">

 
<div class="container">
	<h1> Invoices per Services</h1> <br>
    
<?php
//invoice_services_date ,name of GENERATE button in admin.payments.services.php
//if(isset($_POST['invoice_services_date'])){
  // service_filter,startdate, input name from admin.view. payments.php
    $service_filter=$_POST['service_filter'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];

     //select data using sql statement data btwn specified dates
   $query ="SELECT * FROM invoice_cust_all WHERE invoice_date BETWEEN '$startdate' AND '$enddate' 
   AND service_code ='$service_filter' ";
   //open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
   $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //return number of rows in a result set
   $count= mysqli_num_rows($qry);
   
 ?>
 <div class="tarehe">
  <?php echo $startdate ."   and   ".$enddate; ?>
 </div>
 <br>
<table  id="customers"> 
<tr>
                        <th>S.No#</th>
                        <th>Invoice Date</th>
                        <th>Service Name</th>
                        <th>Customer First Name</th>
                        <th>Customer Last Name</th>
                        <th>Amount </th>
                        <th> Mobile Number </th>
                        <th>Serviced by: </th>
                        </tr>
   <?php
    //declaring incremental variable
    $i = 0;
   while($row=mysqli_fetch_assoc($qry)){
     
       ?>
                        <tr>
                       <!-- variable to increment by one -->
                        <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['invoice_date'];?></td>
                        <td><?php echo $row['invoice_desc'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?> </td>
                        <td><?php echo $row['amount'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['staff_name'];?> </td>
                        </tr>
       <?php
   }
   ?>
   </table>
   <?php
//}

?>

</div>
</body>
</html>