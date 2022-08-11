<?php include "include/session.php";

// creating db connection
include "include/connection.inc.php";


$email=$_SESSION['user'];
$sql="SELECT * FROM staff WHERE email ='$email'";
$qry = mysqli_query($conn, $sql);
?>

<html>
    <head>
    <title>Staff Change Password</title>
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
/* styling form  */
.container label{
	font-size: 20px;

}
.container input{
	width: 500px;
	height: 45px;
}
        </style>
	

</head>

<body>

	<!--navigation-->
	<?php include 'menu.staff.php';?>;	
	<!--navigation-->
    <div class="profile">
    <h1>Staff Change Password</h1>
</div>


<?php
 //return number of rows in a result set
      $count=mysqli_num_rows($qry);
//fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array
      while ($row = mysqli_fetch_assoc($qry)) {
           
       ?>


      <center>
          <form action="staff.change.pass.success.php" method="POST" name="registerform" onsubmit="return Validation()">
          <div class="container">
          <label >Password</label><br> <br>
		<input type="password" name="password1" id="password1" placeholder="Enter Password"><br> <br>

		<label >Confirm Password</label><br> <br>
		<input type="password" name="password2" id="password2" placeholder="Confirm Password"><br> <br>
      
      <button type="submit" name="change_password"> SUBMIT </button> 
          </div>
      </form>
      </center>
<?php
      }
      ?>


<script>
function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
        Password1=document.registerform.password1.value;
		Password2=document.registerform.password2.value;

        if(Password1==""){
        alert("Please enter your Password");
        document.getElementById("password1").focus();
        return false;
        }

		if(Password2==""){
        alert("Please Confirm your Password");
        document.getElementById("password2").focus();
        return false;
            }
//Matching the passwords
if(Password1== "/^[0-9a-zA-Z]+$/"||Password1.length<8 ){
			alert("Please enter a password with 8 or more characters with a Capital Letter and Alpha numeric");
			document.getElementById("password1").focus();
			return false;
			}	
			if(Password2 !==Password1||Password2.length<8 ){
			alert("Passwords do not match. Please confirm the password ");
			document.getElementById("password2").focus();
			return false;
			}	

	} 
        </script>
</body>
</html