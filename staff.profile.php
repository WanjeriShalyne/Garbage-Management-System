<?php

include "include/session.php";

// creating db connection
include  "include/connection.inc.php";


$email=$_SESSION['user'];
$sql="SELECT * FROM staff WHERE email ='$email'";
$qry = mysqli_query($conn, $sql);
?>


<html>
    <head>
    <title>Staff Profile</title>
    <link rel="stylesheet"  href="cust.profile.css">
    <link rel="stylesheet"  href="dashboard.cust.css">
    
    <style>
button{
    margin-top: 40px;
    margin-bottom: 20px;/*create space around elements, outside of any defined borders.*/
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
    <div class="profile">
    <h1>Staff Profile</h1>
</div>


<?php
 //return number of rows in a result set
      $count=mysqli_num_rows($qry);
//fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array
      while ($row = mysqli_fetch_assoc($qry)) {
           
       ?>

    <div class="dis1">
       <ul>
            <li>  <b> First Name:  </b> <?php echo$row['first_name'];?></li>
            <li>  <b> Middle Name:  </b> <?php echo$row['middle_name'];?></li>
            <li>  <b> Surname:  </b> <?php echo$row['surname'];?></li>
            <li>  <b> National ID Number:  </b> <?php echo$row['id_number'];?></li>
            <li>  <b> Email:  </b> <?php echo$row['email'];?></li>
            <li>  <b> Mobile Number:  </b> <?php echo$row['mobile_number'];?></li>
            <li>  <b> Staff Number:  </b> <?php echo$row['staff_number'];?></li>
            <li>  <b> Start Work:  </b> <?php echo$row['start_work_date'];?></li>

        </ul>
      </div>

      <center>
      <a href="staff.change.password.php"><button name="update_cust_details"> CHANGE PASSWORD </button> </a>
      </center>
<?php
      }
      ?>

      


</body>
</html