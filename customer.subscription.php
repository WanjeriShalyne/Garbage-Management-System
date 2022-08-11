<?php
//connect to db and start session
 include 'include/session.php';
 include 'include/connection.inc.php';
?>

<html>
<head>
	
	<title>Customer Subscription</title>
	<link rel="stylesheet" href="dashboard.staff.css">

       <style>
           /* styling my subscriptions text */
      .container{
          text-align:left;
          margin-top: 30px; /*create space around elements, outside of any defined borders.*/
          font-size:18px;
        text-align:center;
      }
      .container h1{
          text-align:center;
      }
      /* styling user details i.e first name and last name */
      .dis1{
        font-size:20px;
        display:flex; /* expands items to fill available free space or shrinks them to prevent overflow*/
        margin-top:10px;   /*create space around elements, outside of any defined borders.*/   
               
      }
      .dis1 ul{
        list-style:none;
        display:flex; /* expands items to fill available free space or shrinks them to prevent overflow*/
        margin:auto;      /* calculates browser margin*/
      }
      .dis1 ul li{
        margin-right:1%;
      }


      .container {
	display: block; /*  start a new line, and takes up the whole width	*/
	line-height: 40px; /*property sets the height of a line box.*/
	
    }

    .container label{
	font-size: 20px;
	line-height:inherit; /*height of line from parent property*/
	color: darkgreen;

    }
    .container input{
	width: 30%;
	height: 45px;

    }   
    
.chagua select{
	height: 45px;
    font-size: 15px;
    width: 430px;
    background: #DCDCDC;
}
.subscription_button{
    margin-top: 70px;/*create space around elements, outside of any defined borders.*/
	margin-bottom: 50px;
    width: 30%;
    font-size: 16px;
    padding: 12px 10px; /*top-right*/
    background:	linear-gradient(#0bab64,#3bb78f);
    border-radius: 20px;  /*rounded corners of button*/
    margin-left:4px;
    
}

      </style>
</head>

<body>
    <!-- Link to naviagtion bar which is in the Menu.customer.php -->
<?php include 'menu.customer.php';?>


<div class="container">
	<h1>My Subcriptions</h1>
</div>

    <?php 
    //displaying currently logged in user in the session
    $email = $_SESSION['user'];

    //sql statement 
    $query = "SELECT * FROM customerdetails WHERE email ='$email'";

    //open new connection to mysql server
 //execute sql query i.e $query else if connection not found,it exits and displays an error from last mysqli function call
   
 $add_customer_serv_sub= mysqli_query($conn,$query) or die(mysqli_error($conn));

    //$num checks if we had results from  the select statement
    $num=mysqli_num_rows($add_customer_serv_sub);

    // get used to retrieve data from server 
 //fetches data from the DB using named keys assigned to them(associative arrays)
    while($get=mysqli_fetch_assoc($add_customer_serv_sub)){
        $id=$get['id'];
        $firstname =$get['first_name'];
        $lastname =$get['last_name'];
        $email=$get['email'];
        // assign variable using get method that fetches data from the DB variable email
    }
       ?>

       <!-- specify where to send form data upon submission upon clicking submit button  -->
 <form action="include/customer.subscription.inc.php" method="POST" name="registerform" onsubmit="return Validation()">
       
            <div class="dis1">
       <ul>
            <li> <b><?php echo $firstname; ?> </b>  </li>
            <li> <b> <?php echo $lastname;?> </b> </li>
        </ul>
      </div>        
            <div class=container>     

            <label name="status" >Service Name</label> <br>
            <div class= "chagua">
            <select  name="service_code" id="service_code" > 
            <option value="1001">Residential Collections| Kshs. 1000</option>
            <option value="1002">Commercial Collections | Kshs. 1500</option>
             <option value="1003">Construction & Demolition Services | Kshs. 10,000 per day</option> 
            </select> <br>
            </div>
            
            <label > Start Date</label> <br>
            <input type="date" name ="sub_start_date" id="startdate"  ><br>           
            
            <button class="subscription_button" name="create_subscription"> Create Subscription </button>
        </form>

        <script>
            
            function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
		service_code=document.registerform.service_code.value;
         startdate=document.registerform.startdate.value;
     

        //if servic_code is empty,alert. Get element by id used to return element with the ID attribute
		if(service_code==""){
		alert("Please select service code");
		document.getElementById("service_code").focus();
		return false;
		}
         if(startdate==""){
		 alert("Please select Start Date");
		document.getElementById("startdate").focus();
		 return false;
		 }

        }
        </script>
</body>
</html>






























































            // <!-- <!-- <label > End Date</label> <br>
            // <input type="text" name ="sub_end_date" id="enddate" onmouseout="valEndDate()" value="YYYY/MM/DD"  > <br>           
            // </div></div> end of class container -->

            <script>
// -----------------------------------------------------------------------------------------------------------------
// //DATE VALIDATION FUNCTION
// function valEndDate(){
// //Getting the date Entered
// cdate=document.getElementById("enddate").value;
// //Whether it is of the format yyyy-mm-dd and also if it is empty
// if(cdate.indexOf("/")==-1){
// alert("Date format to be entered is (YYYY/MM/DD)");
// document.getElementById("enddate").focus();
// return false;
// }



// comps=cdate.split("/");
// //Ensuring the date components are of correct length
// if(comps[0].length<4 || comps[1].length<1|| comps[2].length<1){
// alert("Please complete the Date of Birth (YYYY/MM/DD)");
// document.getElementById("enddate").focus();
// return false;
// }

// //Ensuring the date components are integers(numbers)
// //NaN is a JavaScript reserved word indicating that a value is not a number.
// //The global JavaScript function isNaN() can be used to find out if a value is a number
// if(isNaN(comps[0])||isNaN(comps[1])||isNaN(comps[2])){
// alert("Year/Month/Date should be in number and must be of the format(YYYY/MM/DD)");
// document.getElementById("enddate").focus();
// return false;
// }
// else return true;
// }
// // --------------------

// rtned2=valEndDate();
		// if(rtned2==false){
		// alert("Please rectify your end date. Data Not registered.");
		// }
		// return ; 
        </script>