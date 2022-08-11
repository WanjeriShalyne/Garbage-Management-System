<!DOCTYPE html>
<html>
<head>
	
	<title> Member Login</title>
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="login.css">

</head>

<body>
<!--navigation-->
<div class="navbar">
<ul>
	<li><a href="index.php">Home</a></li>

	<li><a href="login.php">Customer Login</a></li>

</ul>	
</div>
<!--navigation-->


<div class="head">
	<h1>Customer Login</h1>
</div>

<!-- to direct form data from website to db -->
<!--form-->
<!-- Path to actual file that you want to run upon clicking submit button.Collecting form data after submitting HTML
form.Hide sentive data pwd -->
<!-- name used in Validation -->
<form action="include/login.inc.php" method="POST" name="registerform" onsubmit="return Validation()" >
	<div class="container">
	<!-- caption -->
		<label class="email_lbl">Email</label><br>

		<input  name="email"  id="email" placeholder="Enter Email"><br>


		<label class="password_lbl">Password</label><br>
		<input type="password" name="pwd"  id="password1" placeholder="Enter Password"><br>

		<div class="forgot"><a href="password.php">Forgot Password?</a></div>

		<button class="button" name="submit" type="submit"><b>LOGIN</b></button>

		<div class="register">Not a member? <a href="register.php"> Register Here</a></div>

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




