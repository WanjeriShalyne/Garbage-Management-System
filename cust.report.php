<?php

include "include/session.php";

// creating db connection
include "include/connection.inc.php";


?>

<html>
    <head>
    <title>My Reports</title>
    <link rel="stylesheet"  href="cust.profile.css">
    <link rel="stylesheet"  href="dashboard.cust.css">
    
    <style>
button{
    margin-top: 40px;/*create space around elements, outside of any defined borders.*/
    margin-bottom: 20px;
    width: 30%;
    font-size: 16px;
    padding: 12px 10px;
    background:	linear-gradient(#0bab64,#3bb78f);
    border-radius: 20px; /*rounded corners of button*/
}
/* styling tables */
/* calling id customers */
#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;/*whether cells inside a <table> have shared or separate borders.Collapse-shared*/
    width: 100%;
  }
  
  #customers td, #customers th { /*styling both table data and table header to have same style*/
    border: 1px solid #ddd;
    padding: 8px;/*space btwn your content and border*/
  }
  
  #customers tr:nth-child(even){background-color: #f2f2f2;} /*styling table row .#customers is the parent,
  tr is the child.
  nth-child will count from the 1st row to the last row of even numbers to have the declared color*/
  
  #customers tr:hover {background-color: #ddd;}
  
  #customers th {
    padding-top: 12px;/*space btwn content and border*/
    padding-bottom: 12px;
    text-align: left;/*position*/
    background-color: #4682b4;
    color: white;
  }
 /* styling tables */
  
  /* styling tables */
        </style>
	

</head>

<body>

	<!--navigation-->
	<?php include 'menu.customer.php';?>;	
	<!--navigation-->
    <div class="profile">
    <h1>My Reports</h1>
    <h3>My Services</h3>
</div>

<table id="customers">
   <tr>
   <th>S.No#</th>
    <th>Service Subscription Code</th>
    <th>Service Code</th>
    <th>Service Name</th>
    <th>Start Date</th>
    <!-- <th>End Date</th> -->
    <th>Status</th>

  
  </tr>

  

<?php

$email=$_SESSION['user'];
$sql="SELECT * FROM services_and_serviceorder WHERE customeremail ='$email'";
$qry = mysqli_query($conn, $sql);
 //return number of rows in a result set
      $count=mysqli_num_rows($qry);
//fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array

            $i=0;
      while ($row = mysqli_fetch_assoc($qry)) {
           
       ?>

<tr>
    <!-- variable to increment by one -->
    <td><?php echo $i =$i+1;?></td>
    <td><?php echo $row['service_subscription_code'] ;?></td>
    <td><?php echo $row['service_code'] ;?></td>
    <td><?php echo $row['service_name'];?></td>
    <td><?php echo $row['startdate']; ?></td>
    <!-- <td><?php echo $row['enddate'];?></td> -->
    <td><?php echo $row['status'] ?></td> 
    
    
    
  </tr>
    

<?php
      }
      ?>
    </table>
<br> <br> <br>
    <!--customer statement-->
<?php
  // identify customer email 
   $sql="SELECT * FROM invoicestatement WHERE customeremail ='$email'";
   $qry = mysqli_query($conn, $sql);
       //return number of rows in a result set

        $count_invoice=mysqli_num_rows($qry);
        $sum_invoice =0; //calculate total invoices
        while ($row = mysqli_fetch_assoc($qry)) {
        $invoice_total =$row['amount'];
       $sum_invoice = $sum_invoice + $invoice_total;
         
       }


      //  payments
       $sql="SELECT * FROM receiptsstatement WHERE customeremail ='$email'";
         $qry = mysqli_query($conn, $sql);
        //return number of rows in a result set
             $count_receipt=mysqli_num_rows($qry);
             $sum_payment =0;
            while ($row = mysqli_fetch_assoc($qry)) {
              $payment_receipt =$row['amount'];
               $sum_payment = $sum_payment + $payment_receipt;
               
            }

            $defecit = $sum_invoice - $sum_payment;
 ?>
    <h3>My statement</h3>
   <table id="customers">
   <tr>
    <th>S.No#  </th>
     <th>Receipts count</th>
     <th>Invoice Count</th>
    <th>Credit</th>
     <th>invoice</th>
     <th>Defecit</th> 
 </tr>
  
 <tr>
    <td><?php echo 1;?></td>
    <td><?php echo $count_invoice ;?></td>
     <td><?php echo  $count_receipt ; ?></td>
     <td><?php echo  $sum_invoice; ?></td>
     <td><?php echo $sum_payment;?></td>
    <td><?php echo $defecit; ?></td> 
    </tr>
        </table> 
</body>
</html