<html>
<head>

    <title>Register Staff Members</title>
    <link rel="stylesheet"  href="dashboard.admin.css">

    <style>
     .head{
	text-align: center; /*position*/
	padding-top: 20px; /*space btwn content and border*/
	font-size: 18px;
	padding-bottom: 20px;

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
    margin-top: 70px;/*create space around elements, outside of any defined borders.*/
    margin-bottom: 20px; 
	margin-left: 450px;/*create space around elements, outside of any defined borders.*/
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
<?php include "menu.admin.php";?>
    <!--navigation-->
    
    <div class="side_menu">
   
        <h3><a href="dashboard.admin.staff.php">List of Staff Members </a></h3> <br>
        <h3><a href="dashboard.admin.staff.create.php">Register Staff </a></h3> <br>
</div>

        <div class="head">
	    <h1>Register Staff Member</h1>
        </div>
    
<!-- to direct form data from website to db -->
<!-- Path to actual file that you want to run upon clicking submit button.Collecting form data after submitting HTML
form.Hide sentive data pwd -->
<form action="register.staff.inc.php" name="registerform" method="POST" onsubmit="return Validation()" >
<div class="container">
<div class="to-left">
	<!-- To check if user submitted data,we use name of button -->
	<!-- id to use in validation,name to use in include folder -->

	<!-- caption -->
		<label>National ID Number</label><br>
		<input type="number" name="id_number" id="id_number" placeholder="Enter National ID Number"><br>

		<label>First Name</label><br>
		<input type="text" name="firstname" id="firstname"  placeholder="Enter First Name"><br>

        <label>Middle Name</label><br>
		<input type="text" name="middlename" id="middlename"  placeholder="Enter Middle Name"><br>

        <label>Surname</label><br>
		<input type="text" name="surname" id="surname"  placeholder="Enter Surname"><br>
		
		<label>Email</label><br>
		<input type="text" name="email" id="email" placeholder="Enter Email"><br>
		
		<label>Mobile Number</label><br>
		<input type="text" name="mobilenumber" id="mobilenumber" placeholder="Enter Mobile Number"><br>

		<label>Start working date</label><br>
		<input type="date" name="work_date" id="work_date" placeholder="Enter Employee start work date"><br>

        <label>Staff Number</label><br>
		<input type="text" name="staff_number" id="staff_number" placeholder="Enter Staff Number"><br>

        <label> Staff Password</label><br>
		<input type="password" name="pwd" id="password1" placeholder="Enter Password"><br>

		<!-- caption -->
		 <!-- create a drop-down list.to collect input data -->
		<label for="staffrole">Staff Role</label><br>
		 <div class="chagua">
		<select name="staffrole" id="staffrole">
		<option value=""> Select Staff Role</option>
		 <option value="Admin"> Admin</option>
		 <option value="Staff"> Staff</option><br>
		</select>
		</div>

        
		</div> 
        <!--text to left -->
	    <button type="submit"  class="button" name="register" id="register" ><b>SUBMIT</b></button>

        </div>
         </div>
        </form> 
        <!-- end of form-->

<script>
function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
        id_number=document.registerform.id_number.value;
		FirstName=document.registerform.firstname.value;
		MiddleName=document.registerform.middlename.value;
        Surname=document.registerform.surname.value;
		EmailAddress=document.registerform.email.value;
		MobileNumber=document.registerform.mobilenumber.value;
		WorkDate=document.registerform.work_date.value;
        StaffNumber=document.registerform.staff_number.value;
		Password1=document.registerform.password1.value;
        Staffrole=document.registerform.staffrole.value;

        
//if fname empty,alert. Get element by id used to return element with the ID attribute
        if(id_number==""){
        alert("Please ID Number");
         document.getElementById("id_number").focus();
        return false;
         }

		if(FirstName==""){
		alert("Please enter your First Name");
		document.getElementById("firstname").focus();
		return false;
		}


		if(MiddleName==""){
		alert("Please enter your Middle Name");
		document.getElementById("middlename").focus();
		return false;
		}

        if(Surname==""){
		alert("Please enter your  Surname");
		document.getElementById("surname").focus();
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
		if(WorkDate==""){
		alert("Please enter staff Work Date");
		document.getElementById("work_date").focus();
		return false;
		}

        if(StaffNumber==""){
		alert("Please enter your Staff Number");
		document.getElementById("staff_number").focus();
		return false;
		}
		
        if(Password1==""){
        alert("Please Password");
        document.getElementById("password1").focus();
        return false;
        }

        if(Staffrole==""){
		alert("Please Staff Role");
		document.getElementById("staffrole").focus();
		return false;
		}

        //Ensuring the date components are integers(numbers)
        //NaN is a JavaScript reserved word indicating that a value is not a number.
        //The global JavaScript function isNaN() can be used to find out if a value is a number
		 //Validating numbers only and its length
		if(isNaN(MobileNumber) ||MobileNumber.length<10){
		alert("Enter a valid Mobile Number and should be 10 figures");
		document.getElementById("mobilenumber").focus();
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

//Matching the passwords
            if(Password1== "/^[0-9a-zA-Z]+$/"||Password1.length<8 ){
			alert("Please enter a password with 8 or more characters with a Capital Letter and Alpha numeric");
			document.getElementById("password1").focus();
			return false;
			}	
						

//If all of the arguments are false, we complete here with the return showing all is true(All is okay and its passed)
		
	} 
</script>
</body>
</html>