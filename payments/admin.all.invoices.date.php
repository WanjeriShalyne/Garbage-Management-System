<?php
// start session and connection
 include '../include/session.php';
 include '../include/connection.inc.php';
?>
 <html>
 <head>
 
     <title>View All Invoices by  Date</title>
     <link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--style tables and nav bar-->
 
        <style>
   
 /* styling the statement filter by */
 .container{
         margin-top: 20px;/*create space around elements, outside of any defined borders.*/
         font-size:18px;
         text-align:center; /*position: */;
       }
 /* styling the statement filter by */
 
   .tarehe{
          text-align: center; /*position*/
          font-weight: bold;
          font-size: 18px;
      }
     
      </style>
 </head>
 
 <body>
<!--navigation-->
<?php include "menu.payments.php";?>
    <!--navigation-->
    
    <div class="side_menu">

        <h3><a href="admin.all.invoices.php"> All Invoices</a></h3> <br>
		<h3><a href="admin.cust.invoices.service_filter.php">Invoices filter by service</a></h3> <br>
        <h3><a href="admin.cust.invoices.county_filter.php">Invoices filter by county</a></h3> <br>
        <h3><a href="admin.create.invoice.php">Create Invoice</a></h3> <br>

    </div>
    <!--navigation-->

    <div class="main_dashboard">
 
<div class="container">
	<h1> Invoices by date</h1> <br>
    
<?php
// admin_invoices,name of GENERATE button
// if(isset($_POST['admin_invoices'])){
  // startdate, input name from admin.all.invoices.php
     $startdate = $_POST['startdate'];
     $enddate = $_POST['enddate'];

      //select data using sql statement data btwn specified dates
    $query ="SELECT * FROM invoice_cust_all WHERE invoice_date BETWEEN '$startdate' AND '$enddate' ";
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
                        <th> County </th>
                        <th>Town </th>
                        <th>Roadname </th>
                        <th>Estate/Building Name </th>
                        <th>House/Room Number </th>
                       
                        </tr>
    <?php
    //declaring incremental variable
    $i = 0;
            //While condition is true,it will output the following:collecting resulted data in $row
    while($row=mysqli_fetch_assoc($qry)){
        ?>
                        <tr>
                            <!-- variable to increment by one -->
                             <!-- print data of column firstname,etc -->
                        <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['invoice_date'];?></td>
                        <td><?php echo $row['invoice_desc'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?> </td>
                        <td><?php echo $row['amount'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['county'];?> </td>
                        <td><?php echo $row['town'];?> </td>
                        <td><?php echo $row['roadname'];?> </td>
                        <td><?php echo $row['apartments'];?> </td>
                        <td><?php echo $row['house_number'];?> </td>

                        </tr>
        <?php
    }
    ?>
    </table>
    <?php
 

?>
</div>
</body>
</html>