<?php
 include '../include/session.php';
?>

<html>
<head>
	
	<title>Management of services</title>
    <!-- <link rel="stylesheet"  href="../register.css"> -->
	<link rel="stylesheet" href="../dashboard.staff.css">

       <style>
 /* styling form  */
.container {
	line-height: 40px;
}

.container label{
	font-size: 20px;
	line-height:inherit; /*height of line from parent property*/
	
}
.container input{
	width: 500px;
	height: 45px;
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


	
<div style="margin-top:100px">
    <?php 
    //logedin user
    $email = $_SESSION['user'];
    include '../include/connection.inc.php';
    ?>
    
    <div class="hidden active">
     <center><h3 class="h3_profile">Register New Service</h3></center>

<center>

 <form action="register.php" name="registerform" method="POST" onsubmit="return Validation()">
  <div class="container">
     
            <label > Service Code</label> <br>
            <input type="text" name ="service_code" id="service_code">
            <br/>
         
            <label >Service Name</label> <br>
            <input type="text" name ="service_name" id="service_name"> <br>
       
  </div>
            <center><button class="reg" name="register" id="register_service"> Register Service</button><center>
        </form>
          </center>
    </div>

          <center > <p><a href="admin.delete.service.php"> Delete Service</a></p></center>

	</div>

    
</div>

<script>
    function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
        ServiceCode=document.registerform.service_code.value;
		ServiceName=document.registerform.service_name.value;
        
//if fname empty,alert. Get element by id used to return element with the ID attribute
		if(ServiceCode==""){
		alert("Please enter service code");
		document.getElementById("service_code").focus();
		return false;
		}


		if(ServiceName==""){
		alert("Please enter service name");
		document.getElementById("service_name").focus();
		return false;
		}
    }
</script>
</body>
</html>





