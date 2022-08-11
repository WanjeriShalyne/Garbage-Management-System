<?php
  //checking whether variable is set to 'reset_password"
	if(isset($_POST['reset_password']))
	{
		$email = $_POST['email'];
		
		$query = "SELECT email FROM customerdetails WHERE email = '$email'";
		include('include/connection.inc.php');
		$qry = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$count =mysqli_num_rows($qry);
		if($count==1){
			$newpassword =rand(0,999999);

			//sendmail code
			$copy ="Copright 2021: All rights reserved.";
			$newpassword = rand( 100 , 99999999 );
			$to = $email;
			$subject = 'Password Reset - North Garbage Management';
			$message = "Dear Customer,\n\nWe Noted that you requested for password reset. \n\nYour new password is $newpassword \n\nRemember to change your password once logined\n\n\nBest | $copy www.northgarbagemanagement.com\nnorthgarbage.service@gmail.com";
			$header = "From:northgarbage.service@gmail.com\r\nReply-To: northgarbage.service@gmail.com";
			$mail_sent = mail($to,$subject,$message,$header);
			if($mail_sent ==true)
			{
				echo "Mail Sent";
				$query = "UPDATE customerdetails SET customerpassword = '$newpassword' WHERE email ='$email'";
				$qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
				

				//begin insert to database
			$query = "UPDATE customerdetails SET customerpassword = '$newpassword' WHERE email
			= $email";
			$qry =mysqli_query($conn,$query) or die(mysqli_error($conn));
			}
			else
			{
			echo "The recipient email could not be reached";
			}
			//end sendmail

			
			
		}
		else{
			echo  "We couldn't find a customer in a record with similar email" ."$email";
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password -GMS</title>
	<link rel="stylesheet"  href="password.css">
	<link rel="stylesheet" href="index.css">
</head>

<body>
<!--navigation-->
<div class="navbar">
<ul>
	<li><a href="home.php">HOME</a></li>
	<li><a href="login.php">LOGIN</a></li>
</ul>	
</div>
<!--navigation-->


<div class="head">
	<h1>Forgot Password</h1>
	
</div>

	
<form action="" method="post" name="registerform" onsubmit="return Validation()" >
	<div class="container">
	
	<p>To reset your password, submit your email address below. If we can find you in the database,an email will be sent to your email address, with instructions how to get access again.</p>
</div>

	<div class="container1">
	<label>Email</label><br>
	<input  name="email" placeholder="email"><br>

	<button class="button" name="reset_password" type="submit" value="SUBMIT"><b>SUBMIT</b></button>
	
	</div>
</form>
<script>
	
function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
		EmailAddress=document.registerform.email.value;
		
		//if email is empty,alert. Get element by id used to return element with the ID attribute
		if(EmailAddress==""){
		alert("Please enter your Email Address");
		document.getElementById("email").focus();
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