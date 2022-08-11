<?php
 include_once('include/session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
    <link rel="stylesheet"  href="register.css">
	<link rel="stylesheet" href="dashboard.staff.css">

       <style>
      .button{
          margin-right: 500px;
      }
            </style>
</head>



<body>
<?php include_once'menu.staff.php';?>

<div class="container">
	
<div style="margin-top:100px">
    <?php 
    //logedin user
    $email = $_SESSION['user'];
    include_once('include/connection.inc.php');
    
    $query = "SELECT * FROM customerdetails";

    $add_customer_serv_sub= mysqli_query($conn,$query) or die(mysqli_error($conn));
    $num=mysqli_num_rows($add_customer_serv_sub);
    ?>
     <center><h3 class="h3_profile">Client Subscription</h3></center>

<center>
 <form action="include/staff.subscription.inc.php" method="POST">
    <span class="profile_span">&nbsp;
            <label class="lbl_profile" name="firstname"> Select client to add </label>
            <select class="profile_update_form" name="customeremail">
    <?php 
    if($num==0){
        echo "No record found!";
    }else{
        while($get=mysqli_fetch_assoc($add_customer_serv_sub)){
             $id=$get['id'];
             $email=$get['email'];
             $firstname =$get['first_name'];
             $lastname =$get['last_name'];
            
            ?>
            <option value="<?php echo $email;?>">
            <?php echo $firstname;?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $lastname;?> 
            </option>
           
           
             <?php
        }
    }
    ?>
    </select>
   
    <br><br>
            
  <div class="container">
      <div class="chagua">
            <label >Service code</label><br>
            <select name="service_code" > 
                <?php
                $qry_service = "SELECT * FROM services";
                $qry= mysqli_query($conn, $qry_service) or die(mysqli_error($conn));
                while($row=mysqli_fetch_assoc($qry)){

                ?>
            	<option value="<?php echo $row['service_code'];?>"><?php echo  $row['service_code'] ." - ". $row['service_name'];?></option>
               
                <?php 
                     }
                ?>
            </select> </div>
<br>
            <label > Start Date</label> <br>
            <input type="date" name ="sub_start_date">
            <br/>
         
            <label > End Date</label> <br>
            <input type="date" name ="sub_end_date" > <br>
         
            <div class="chagua">
            <label >Status</label> <br>
            <select name="status" >  <br>
            	<option value="active">active</option>
                <option value="terminated">terminate</option>
               
            </select> </div>
  </div>
            <center><button name="create_subscription"> Create Subscription</button><center>
        </form>
          </center>

          
    
</div>

	</div>


</div>

</body>
</html>

