<?php

include "include/session.php";

// creating db connection
include "include/connection.inc.php";


?>

<html>
    <head>
    <title>Customer Reports</title>
    <link rel="stylesheet"  href="cust.profile.css">
    <link rel="stylesheet"  href="admin/dashboard.admin.css"> <!--style tables and nav bar-->
    
    <style>
button{
    margin-top: 40px;
    margin-bottom: 20px; /*create space around elements, outside of any defined borders.*/
    width: 30%;
    font-size: 16px;
    padding: 12px 10px;
    background:	linear-gradient(#0bab64,#3bb78f);
    border-radius: 20px; /*rounded corners of button*/
}

        </style>
	

</head>

<body>

	<!--navigation-->
	<?php include 'menu.staff.php';?>;	
	<!--navigation-->

    <center><h3>Enter Customer email to view Customer Statement</h3></center>
    <!-- search -->
    <form  action=" "  method="post" >
        <label style="margin-left:25%; font-size:22px;">Search</label> 
         <input type="text" name="search" style="height: 30px; width:20%">   
         <button class="button1" type="submit" name="submit" >Search</button>   
</div> <br>  
    <?php 
    //fetch email of logged in user to enable querry.Retu

    include 'include/connection.inc.php';
    //select data using sql statement
    $query = "SELECT * FROM serviceorder";
   //open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $customer_serv_sub= mysqli_query($conn,$query) or die(mysqli_error($conn));
        // fetch result row as an associative array. Arrays that use named keys that you assign to them 
    //eg $age['peter']="35";
    $num=mysqli_num_rows($customer_serv_sub);
    
//executing withing the file
    if(isset($_POST['submit'])){
 // escapes special characters in a string for use in an SQL query, 
//  before inserting a string in a database, as it removes any special characters that may interfere 
//with the query operations.
//select data using sql statement
        $searchq=mysqli_real_escape_string($conn,$_POST['search']);

       if($searchq!=""){
           //LIKE- used to find matches between a character string and a specified pattern. 
        $sql="SELECT email FROM customerdetails WHERE email LIKE '%$searchq%'";
        //open connection to mysql server
        $result=mysqli_query($conn,$sql);
         //returns number of rows in a result set
        $count  = mysqli_num_rows($result);
        if($count>0){
        //check for any result select query
       // $queryResults=mysqli_num_rows($result);
    
            while($row=mysqli_fetch_assoc($result)){
                $email=$row ['email'];
               
                  
            }  

        
        ?>
</form>

    <div class="profile">
    <h1>Customer Reports</h1>
    <h3>Subscribed Services</h3>
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

//know how many services customer subscribed to
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
    <td><?php echo $row['status'] ?></td> 
    
    
    
  </tr>
    

<?php
      }
      ?>
    </table>
<br> <br> <br>
   
<?php
//   //customer statement
//   //sum of invoice per customer email in the table invoice statement
//   //'$email' from search variable
//    $sql="SELECT * FROM invoicestatement WHERE customeremail ='$email'";
//    $qry = mysqli_query($conn, $sql);
//        //return number of rows in a result set ,numeral
//         $count_invoice=mysqli_num_rows($qry);
//         //calculate total invoices.Initialize 
//         $sum_invoice =0; 
//         while ($row = mysqli_fetch_assoc($qry)) {
//         $invoice_total =$row['amount'];
//        $sum_invoice = $sum_invoice + $invoice_total;
         
//        }


//        //payments
//        $sql="SELECT * FROM receiptsstatement WHERE customeremail ='$email'";
//          $qry = mysqli_query($conn, $sql);
//         //return number of rows in a result set
//              $count_receipt=mysqli_num_rows($qry);
//              $sum_payment =0;
//             while ($row = mysqli_fetch_assoc($qry)) {
//               $payment_receipt =$row['amount'];
//                $sum_payment = $sum_payment + $payment_receipt;
               
//             }

//             $defecit = $sum_invoice - $sum_payment;
//  ?>
<!-- //     <h3>Customer statement</h3>
//    <table id="customers">
//    <tr>
//     <th>S.No#  </th>
//      <th>Receipts count</th>
//      <th>Invoice Count</th>
//     <th>Credit</th>
//      <th>invoice</th>
//      <th>Defecit</th> 
//  </tr> -->
    <tr>
<!-- //     <td><?php echo 1;?></td>
//     <td><?php echo $count_invoice ;?></td>
//      <td><?php echo  $count_receipt ; ?></td>
//      <td><?php echo  $sum_invoice; ?></td>
//      <td><?php echo $sum_payment;?></td>
//     <td><?php echo $defecit; ?></td> 
//     </tr> -->
         </table> 
   <?php
        }
        else{
            echo "<center> <p>We could find a customer with such emaiil $searchq</p></center>";
        }
        
   }
    // else{
    //     echo "<center> <p>You not enter customer email</p></center>";
    //  }
 }
    ?>
</body>
</html