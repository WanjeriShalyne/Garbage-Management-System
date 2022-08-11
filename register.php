<html>
<head>
	<title>Register -GMS</title>
	<link rel="stylesheet"  href="index.css">
	<link rel="stylesheet"  href="register.css">

</head>


<body>
<!--navigation-->

<div class="navbar">
<ul>
	<li><a href="index.php">HOME</a></li>
	<li><a href="register.php">REGISTER</a></li>
</ul>	
</div>
<!--navigation-->


<div class="head">
	<h1>Register</h1>
</div>


<!-- to direct form data from website to db -->
<!--form-->
<!-- Path to actual file that you want to run upon clicking submit button.Collecting form data after submitting HTML
form.Hide sentive data pwd -->
<form action="include/register.inc.php" name="registerform" method="POST" onsubmit="return Validation()" >
<div class="container">
<div class="to-left">
	<!--text to float left-->
	<!-- To check if user submitted data,we use name of button -->
	<!-- id to use in validation,name to use in include folder -->

	<!-- caption -->
		<label>First Name</label><br>
		<input type="text" name="firstname" id="firstname" placeholder="Enter First Name"><br>

		<label>Last Name</label><br>
		<input type="text" name="lastname" id="lastname"  placeholder="Enter Last Name"><br>
		
		<label>Email</label><br>
		<input type="text" name="email" id="email" placeholder="Enter Email"><br>
		
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
		<input type="text" name="housenumber" id="housenumber" placeholder="Enter House Number"><br>

		<label>Password</label><br>
		<input type="password" name="password1" id="password1" placeholder="Enter Password"><br>

		<label>Confirm Password</label><br>
		<input type="password" name="password2" id="password2" placeholder="Confirm Password"><br>

		</div> 
<!--text to left -->
	<button type="submit"  class="button" name="register" id="register" ><b>SUBMIT</b></button>
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
		EmailAddress=document.registerform.email.value;
		MobileNumber=document.registerform.mobilenumber.value;
		County=document.registerform.county.value;
		Town=document.registerform.town.value;
		Roadname=document.registerform.roadname.value;
		Apartment=document.registerform.apartment.value;
		Housenumber=document.registerform.housenumber.value;
		Password1=document.registerform.password1.value;
		Password2=document.registerform.password2.value;
        
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

		if(EmailAddress==""){
		alert("Please enter your Email Address");
		document.getElementById("email").focus();
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

        if(Password1==""){
        alert("Please enter your Password");
        document.getElementById("password1").focus();
        return false;
        }

		if(Password2==""){
        alert("Please Re-enter your Password");
        document.getElementById("password2").focus();
        return false;
            }


		 //Validating numbers only and its length

		if(isNaN(MobileNumber) ||MobileNumber.length<10){
		alert("Enter a valid Mobile Number and should be 10 figures");
		document.getElementById("mobilenumber").focus();
		return false;
		}

//Validating Email to have atleast @ and a dot
//indexof checks if it has @	
		if(EmailAddress.indexOf("@")<1){
		alert("Your email has no @.    Please enter a valid Email Address");
		document.getElementById("email").focus();
		return false;
		}

		if(EmailAddress.indexOf(".com")<1){
		alert("Your email has no (.com) Please enter a valid Email Address");
		document.getElementById("email").focus();
		return false;
		
}

//Matching the passwords
            if(Password1== "/^[0-9a-zA-Z]+$/"||Password1.length<8 ){
			alert("Please enter a password with 8 or more characters with a Capital Letter and Alpha numeric");
			document.getElementById("password1").focus();
			return false;
			}	
			if(Password2 !==Password1||Password2.length<8 ){
			alert("Passwords do not match. Please re-enter the password ");
			document.getElementById("password2").focus();
			return false;
			}	

	} 
</script>
</body>
</html>