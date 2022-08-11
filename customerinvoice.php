<?php
//start session and connection
  include 'include/session.php';
  include 'include/connection.inc.php';
?>


<html>
<head>
	<title>Customer Invoice</title>
	<link rel="stylesheet" href="dashboard.cust.css">

  <style>
      .container{
          text-align:left;
          margin-top: 30px;
          font-size:18px;
        text-align:center;
        margin-bottom:30px;
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

</style>

</head>

<body>

	<!--navigation-->
	<?php include 'menu.customer.php';?>;	
	<!--navigation-->

    <?php 
    $email = $_SESSION['user'];

     $query = "SELECT * FROM invoice_cust_all WHERE customeremail = '$email'";

    $customer_invoice_statement= mysqli_query($conn,$query) or die(mysqli_error($conn));
    $num=mysqli_num_rows($customer_invoice_statement);
    
            ?>

<div class="container">
	<h1>My Invoices</h1>
</div>


<table id="customers">
   <tr>
   <th>S.No#</th>
    <th>Invoice date</th>
    <th>Invoice Description</th>
    <th>Amount</th>
    <th>County</th>
    <th>Town</th>
    <th>Road Name</th>
    <th>Estate/Building Name</th>
     <th>House/Room Number</th>
  
  </tr>
  <?php
  if($num==0){
        echo "No record found!";
    }else{
      //declaring incremental variable
      $i = 0;
                       
      // While condition is true,it will output the following:
        while($get=mysqli_fetch_assoc($customer_invoice_statement)){
            // $id=$get['id'];
            $invoice_date = $get['invoice_date'];
            $invoice_desc = $get['invoice_desc'];
            $amount = $get['amount'];
            $county = $get['county'];
            $town = $get['town'];
            $roadname = $get['roadname'];
            $apartments = $get['apartments'];
            $house_number= $get['house_number'];
           
            
  ?>
  
  <tr>
    <!-- variable to increment by one -->
    <td><?php echo $i =$i+1;?></td>
    <td><?php echo $invoice_date ;?></td>
    <td><?php echo $invoice_desc  ;?></td>
    <td><?php echo $amount; ?></td>
    <td><?php echo $county; ?></td>
    <td><?php echo $town ;?></td>
    <td><?php echo $roadname; ?></td>
    <td><?php echo $apartments; ?></td>
    <td><?php echo $house_number; ?></td>
    
    
  </tr>
    <?php
        }
    }
    ?>
</table>
      
    
</div>

	</div>


</div>

</body>
</html>
