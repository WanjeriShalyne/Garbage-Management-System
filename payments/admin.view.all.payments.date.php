<?php
// start session and connection.ATtach php code from another file
 include '../include/session.php';
 include '../include/connection.inc.php';
?>

 <html>
 <head>
 
     <title>View All Payments by Date</title>
     <link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--style tables and nav bar-->
 
        <style>
   
 /* styling the statement filter by */
 .container{
         margin-top: 20px;/*create space around elements, outside of any defined borders */
         font-size:18px;
         text-align:center; /*position: */;
       }
 /* styling the statement filter by */
 
   .tarehe{
          text-align: center;
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

    <h3><a href="admin.view.all.payments.php">All Payments</a></h3> <br>
        <h3><a href="admin.payments.services.php">Payments per Service </a></h3> <br>
        <h3><a href="admin.payments.county.php">Payments per County </a></h3> <br>
        <h3><a href="admin.create.payment.php">Create Receipt </a></h3> <br>
</div>
<div class="main_dashboard">

 
<div class="container">
	<h1> Receipt Payment</h1> <br>
    
<?php
// view paymentby date ,name of GENERATE button
 //if(isset($_POST['view_payment_by_date'])){
     // startdate, input name from admin.all.payments.php
     $startdate = $_POST['startdate'];
     $enddate = $_POST['enddate'];

      //select data using sql statement data btwn specified dates
      $query ="SELECT * FROM receiptsstatement WHERE receipts_date BETWEEN '$startdate' AND '$enddate' ";

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
                        <th> First Name</th>
                        <th> Last Name</th>
                        <th> Service Name</th>
                        <th>Amount</th>
                        <th>Receipt Date</th>
                        <th>Reference Number</th>
                        <th> Mode of payment</th>

                        </tr>
    <?php
    //declaring incremental variable
    $i = 0;
    // fetch result row as an associative array. Arrays that use named keys that you assign to them 
    //eg $age['peter']="35";
    while($row=mysqli_fetch_assoc($qry)){
        ?>

                         <tr>
                           <!-- variable to increment by one -->
                           <td><?php echo $i =$i+1;?></td>
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
 // }
    ?>
    </table>
    <?php
 

?>
</div>
</body>
</html>