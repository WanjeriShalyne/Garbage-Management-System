<script>
//DATE VALIDATION FUNCTION
function valDate(){
//Getting the date Entered
cdate=document.getElementById("dob").value;
//Whether it is of the format yyyy-mm-dd and also if it is empty
if(cdate.indexOf("/")==-1){
alert("Date format to be entered is (YYYY/MM/DD)");
document.getElementById("dob").focus();
return false;
}



comps=cdate.split("/");
//Ensuring the date components are of correct length
if(comps[0].length<4 || comps[1].length<1|| comps[2].length<1){
alert("Please complete the Date of Birth (YYYY/MM/DD)");
document.getElementById("dob").focus();
return false;
}

//Ensuring the date components are integers(numbers)
//NaN is a JavaScript reserved word indicating that a value is not a number.
//The global JavaScript function isNaN() can be used to find out if a value is a number
if(isNaN(comps[0])||isNaN(comps[1])||isNaN(comps[2])){
alert("Year/Month/Date should be in number and must be of the format(YYYY/MM/DD)");
document.getElementById("dob").focus();
return false;
}
else return true;
}
//End of Date Validation

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
             
			

//If all of the arguments are false, we complete here with the return showing all is true(All is okay and its passed)
		rtned=valDate();
		if(rtned==false){
		alert("Please rectify your Date of Birth. Data Not registered.");
		}
		return ;
		  return ; 

	} 
</script>
</body>
</html>