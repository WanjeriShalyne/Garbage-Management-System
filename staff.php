
<html>
<head>

	<title>Staff Login </title>
	<link rel="stylesheet" href="index.css"> <!--style navbar-->
	<link rel="stylesheet" href="login.css">  <!--style input fields and labels-->

</head>



<body>
<!--navigation-->
<div class="navbar">
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="staff.php">Staff Login</a></li>

</ul>	
</div>
<!--navigation-->


<div class="head">
	<h1>Staff Login</h1>
	
</div>

<!--form-->
<form action="include/staff.inc.php" method="POST" name="registerform" onsubmit="return Validation()" >
	<div class="container">

		<label class="email_lbl">Email</label><br>
		<input type="text" name="email" id="email" placeholder="Enter Email"><br>


		<label class="password_lbl">Password</label><br>
		<input type="password" name="pwd" id="password1" placeholder="Enter Password"><br>

		<div class="forgot"><a href="password.php">Forgot Password?</a></div>

		<button class="button" name="submit" type="submit"><b>LOGIN</b></button>

		<!-- <div class="register">Not a member? <a href="register.php"> Register Here</a></div> -->

	</div>
</form>
<!-- end of form-->

<script>
	
function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
		EmailAddress=document.registerform.email.value;
		Password1=document.registerform.password1.value;

		//if email is empty,alert. Get element by id used to return element with the ID attribute
		if(EmailAddress==""){
		alert("Please enter your Email Address");
		document.getElementById("email").focus();
		return false;
		}

		if(Password1==""){
        alert("Please enter your Password");
        document.getElementById("password1").focus();
        return false;
        }

		//Validating Email to have atleast @ and a dot		
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
	}
	</script>
</body>

</html>




