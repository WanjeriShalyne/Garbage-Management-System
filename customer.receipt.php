<?php
//start session
include 'include/session.php';?>
<html>
<head>

    <title>Customer Payment</title>
    <link rel="stylesheet" href="dashboard.cust.css">

    <style>

/* styling the statement filter by */
      .container{
        margin-top: 20px;
        font-size:18px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */

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

  <div class="container">
	<h1> My Receipts</h1>
</div>

<?php 
//DB connection
 include('include/connection.inc.php');

$email = $_SESSION['user'];

$query = "SELECT * FROM receiptsstatement WHERE customeremail= '$email' ";

$qry = mysqli_query($conn, $query) or die(mysqli_error($conn));

$count = mysqli_num_rows($qry);
?>
	

<br>
			<table  id="customers"> 
                        <tr>
                        <th>First Name</th>
                        <th> Last Name</th>
						            <th>Reference Number </th>
						            <th>Service Name</th>
                        <th> Receipt Date</th>
                        <th>Mode of payment </th>
						            <th>Amount </th>

                        </tr>
<?php
  if($count==0){
    echo "No record found!";
}else{
  //declaring incremental variable
  $i = 0;
                   
  // While condition is true,it will output the following:
                       while($get=mysqli_fetch_assoc($qry))  {
                        $firstname = $get['first_name'];
                        $lastname= $get['last_name'];
                        $reference_number = $get['reference_number'];
                        $payment_description= $get['payment_description'];
                        $receipts_date = $get['receipts_date'];
                        $payment_mode = $get['payment_mode'];
                        $amount = $get['amount'];

                       ?>

                        <tr>
                        <td><?php echo $firstname;?></td>
                        <td><?php echo $lastname;?></td>
                        <td><?php echo $reference_number;?></td>
                        <td><?php echo $payment_description;?> </td>
                        <td><?php echo $receipts_date;?> </td>
                        <td><?php echo $payment_mode ;?> </td>
                        <td><?php echo $amount;?> </td>
                        </tr>
                        <?php 
                       }
                      }
                    
                        ?>
 
                        
                </table>


</body>
</html>


  