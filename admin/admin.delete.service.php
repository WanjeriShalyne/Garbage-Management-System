<?php
 include '../include/session.php';
?>

<html>
<head>
	
	<title>Delete Service</title>
	<link rel="stylesheet" href="../dashboard.staff.css">

       <style>
 /* styling form  */
 .container {
	line-height: 40px;
}
.chagua select{
	height: 45px;
    font-size: 15px;
    width: 500px;
    background: #DCDCDC;
}
/* styling submit button  */
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
<?php include 'menu.admin.php';?>

<div class="container">
	
<div style="margin-top:100px">
    <?php 
    //logedin user
    $email = $_SESSION['user'];
    include '../include/connection.inc.php';
    ?>
    

          <div class="hidden">
          <center><h3 class="h3_profile">Delete service</h3></center>

<center>
 <form action="delete.php" name="registerform" method="POST" onsubmit="return Validation()">
  <div class="container">
     
            <div class="chagua">
            <label >Select service</label> <br>
            <select name="service_code" >  <br>
            <option value=""> Select Service to delete</option>
    <?php
    $query =  "SELECT * FROM services";
    $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
       while($row=mysqli_fetch_assoc($qry)){
    ?>
    <!-- stating the service code id to be deleted -->
     <option value=<?php echo $row['service_code'];?>>
     <!-- what is displayed in the drop down menu that is service code and service name -->
     <!-- concatination, joining two variables -->
     <?php echo $row['service_code'] ." - ". $row['service_name'];?>

     </option>
               <?php } ;?>
            </select> </div>
  </div>
            <center><button name"delete" id="delete_service"> Delete Service</button><center>
        </form>
          </center>
          </div>

          <!-- <center > <p><a href="admin.delete.service.php"> Delete Service</a></p></center>      -->
    
</div>

	</div>


</div>
<script>
function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
        ServiceCode=document.registerform.service_code.value;
		
        
//if fname empty,alert. Get element by id used to return element with the ID attribute
		if(ServiceCode==""){
		alert("Please enter service code");
		document.getElementById("service_code").focus();
		return false;
		}

    }

</script>
</body>
</html>

