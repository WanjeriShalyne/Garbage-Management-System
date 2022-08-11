<?php

include "include/session.php";

// creating db connection
include "include/connection.inc.php";


$email=$_SESSION['user'];
$sql="SELECT * FROM customerdetails WHERE email ='$email'";
$qry = mysqli_query($conn, $sql);
?>


<html>
    <head>
    <title>Customer Profile</title>
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
        </style>
	

</head>

<body>

	<!--navigation-->
	<?php include 'menu.customer.php';?>;	
	<!--navigation-->
    <div class="profile">
    <h1>Customer Profile</h1>
</div>


<?php
 //return number of rows in a result set
      $count=mysqli_num_rows($qry);
      
//fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array
      while ($row = mysqli_fetch_assoc($qry)) {
         
       
       ?>

    <div class="dis1">
       <ul>
            <li>  <b> First Name:  </b> <?php echo $row['first_name'];?></li>
            <li>  <b> Last Name:  </b> <?php echo $row['last_name'];?></li>
            <li>  <b> Email:  </b> <?php echo $row['email'];?></li>
            <li>  <b> Contacts:  </b> <?php echo $row['mobile_number'];?></li>
            <li>  <b> County:  </b> <?php echo $row['county'];?></li>
            <li>  <b> Road Name:  </b> <?php echo $row['roadname'];?></li>
            <li>  <b> Estate/Apartments/Court: </b> <?php echo $row['apartments'];?></li>
            <li>  <b> House Number:  </b> <?php echo $row['house_number'];?></li>
        </ul>
        <?php } ?>
      </div>

      <center>
      <a href="customer.update.profile.php"><button name="update_cust_details"> UPDATE PROFILE </button> </a>
      </center>
<?php
      
      ?>

      


</body>
</html