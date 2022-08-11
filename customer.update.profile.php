<?php
  include 'include/session.php';
?>

<html>
<head>

	<title>Member Update Profile</title>
 
    <link rel="stylesheet"  href="cust.profile.css">
    <link rel="stylesheet"  href="dashboard.cust.css">
    <style>
.head{
	text-align: center; /*position*/
	font-size: 18px;
	padding-bottom: 20px;
	margin-top: -7%;/*create space around elements, outside of any defined borders.*/

}
/* styling form  */
.container {
	line-height: 40px;
}

.container label{
	font-size: 20px;
	line-height:inherit; /*height of line from parent property*/
	color: darkgreen;
}
.container input{
	width: 500px;
	height: 45px;
}
.to-left{
padding-left:30%;

}
/* styling form  */

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
	margin-left: 450px;
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


<div style="margin-top:100px">
    <?php 
    $email = $_SESSION['user'];
    include ('include/connection.inc.php');
    
    $query = "SELECT * FROM customerdetails WHERE email = '$email'";

    $customer_profile= mysqli_query($conn,$query) or die(mysqli_error($conn));
    $num=mysqli_num_rows($customer_profile);
    if($num==0){
        echo "No record found!";
    }else{
        while($get=mysqli_fetch_assoc($customer_profile)){
             $id=$get['id'];
             $email=$get['email'];
             $customerfirstname = $get['first_name'];
             $customerlastname = $get['last_name'];
            $email = $get['email'];
            $mobilenumber = $get['mobile_number'];
            $county = $get['county'];
            $roadname = $get['roadname'];
            $apartment = $get['apartments'];
            $housenumber = $get['house_number'];
            $customerpassword = $get['customerpassword'];
        }}
            ?>
           <div class="head">
	<h1>Update profile details</h1>
</div>

<!-- to direct form data from website to db -->
<!--form-->
<!-- Path to actual file that you want to run upon clicking submit button.Collecting form data after submitting HTML
form.Hide sentive data pwd -->
        <form action="cust.update.details.php" method="POST" name="registerform" onsubmit="return Validation()">
        <div class="container">
<div class="to-left">
	<!--text to float left-->
	<!-- To check if user submitted data,we use name of button -->
	<!-- id to use in validation,name to use in include folder -->

	<!-- caption -->
           <!-- caption -->
		<label>First Name</label><br>
		<input type="text" name="firstname" id="firstname" placeholder="Enter First Name"><br>

		<label>Last Name</label><br>
		<input type="text" name="lastname" id="lastname"  placeholder="Enter Last Name"><br>
		
		<label>Mobile Number</label><br>
		<input type="text" name="mobilenumber" id="mobilenumber" placeholder="Enter Mobile Number"><br>

		<!-- caption -->
		 <!-- create a drop-down list.to collect input data -->
		<label for="county">County</label><br>
		 <div class="chagua">
		<select name="county" id="county">
		<option value=""> Select County</option>
		 <option value="Nairobi"> Nairobi</option>
		 <option value="Kajiado"> Kajiado</option><br>
		</select>
		</div>

		<label >Town Name</label><br>
		<input type="text" name="town" id="town" placeholder="Enter Name of town"><br>

		<label >Street/Road Name</label><br>
		<input type="text" name="roadname" id="roadname" placeholder="Enter Name of street/roadname"><br>

		<label>Estate/Apartment/Building Name</label><br>
		<input type="text" name="apartment" id="apartment" placeholder="Enter Name of Estate/Apartment/Building name"><br>

		<label>House/Room Number</label><br>
		<input type="number" name="housenumber" id="housenumber" placeholder="Enter House Number"><br>


		</div> 
<!--text to left -->
	<button type="submit"  class="button" name="update_cust_details" id="register" ><b>SUBMIT</b></button>
</div>
</div>
</form> -->
<!-- end of form-->


<script>
function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
		FirstName=document.registerform.firstname.value;
		LastName=document.registerform.lastname.value;
		MobileNumber=document.registerform.mobilenumber.value;
		County=document.registerform.county.value;
		Town=document.registerform.town.value;
		Roadname=document.registerform.roadname.value;
		Apartment=document.registerform.apartment.value;
		Housenumber=document.registerform.housenumber.value;
        
//if fname empty,alert. Get element by id used to return element with the ID attribute
		if(FirstName==""){
		alert("Please enter your First Name");
		document.getElementById("firstname").focus();
		return false;
		}


		if(LastName==""){
		alert("Please enter your Last Name");
		document.getElementById("lastname").focus();
		return false;
		}

		if(MobileNumber==""){
		alert("Please enter your Phone Number");
		document.getElementById("mobilenumber").focus();
		return false;
		}


		if(County==""){
		alert("Please select your County");
		document.getElementById("county").focus();
		return false;
		}

		if(Town==""){
		alert("Please enter your Town");
		document.getElementById("town").focus();
		return false;
		}

		if(Roadname==""){
		alert("Please enter Road Name");
		document.getElementById("roadname").focus();
		return false;
		}
		  
		if(Apartment==""){
		alert("Please enter Apartment");
		document.getElementById("apartment").focus();
		return false;
		}

		if(Housenumber==""){
		alert("Please enter your House/Room Number");
		document.getElementById("housenumber").focus();
		return false;
		}


		 //Validating numbers only and its length

		if(isNaN(MobileNumber) ||MobileNumber.length<10){
		alert("Enter a valid Mobile Number and should be 10 figures");
		document.getElementById("mobilenumber").focus();
		return false;
		}
	}

</script>
</body>
</html>