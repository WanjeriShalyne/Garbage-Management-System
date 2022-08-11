<?php
// start session
 include '../include/session.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title>Payment Receipts Receipt</title>
	<link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--style tables and nav bar-->

       <style>
            .container{
    text-align:left;
    margin-top: 30px;/*create space around elements, outside of any defined borders */
    font-size:18px;
    text-align:center;
    margin-bottom:10px; /*create space around elements, outside of any defined borders */
      }
      .container1{
          font-size: 20px;
          line-height: 1.5;/*A number that will be multiplied with the current font-size to set the line height	*/

      }
      .container1 input{
          width: 500px;
          height: 50px;
          font-size: 18px;
             }

    button{
    margin-top: 40px; /*create space around elements, outside of any defined borders.*/
    margin-bottom: 5px;
    width: 10%;
    font-size: 16px;
    color: white;
    padding: 12px 10px;
    background:	linear-gradient(#0bab64,#3bb78f);
    border-radius: 20px; /*rounded corners of button*/
}
.chagua select{
	height: 45px;
    font-size: 15px;
    width: 800px;
    background: #DCDCDC;
}
.search_list{
    text-align: center;
}

     </style>
</head>

<body>
    
<!--navigation-->
<?php include "menu.payments.php";?>
    <!--navigation-->
    
    <div class="side_menu">
   
    <h3><a href="admin.view.all.payments.php">All Payments</a></h3> <br>
        <h3><a href="admin.payments.services.php">Payments per Service </a></h3> <br>
        <h3><a href="admin.payments.county.php">Payments per County </a></h3> <br>
        <h3><a href="admin.create.payment.php">Create Receipt </a></h3> <br>
</div>
<div class="main_dashboard">
<!-- navigation -->
    <?php 
    //logedin user
    $email = $_SESSION['user']; // getting session email
    //connection to db
    include '../include/connection.inc.php';
    
    ?>

    <div class="container">
     <h1 >  Customer Receipt</h1>
</div>


    <!-- search -->
    <form  action="" id="form1" method="post" >
         <label style="margin-left:300px; font-size:22px;">Search</label> 
         <input type="text" name="search" style="height: 30px; width:20%">    
         <button class="button1" type="submit" name="submit" >Search</button>   
</div>       
  
    <?php
    

  if(isset($_POST['submit'])){
 // escapes special characters in a string for use in an SQL query, 
//  before inserting a string in a database, as it removes any special characters that may interfere 
//with the query operations.
//select data using sql statement
        $searchq=mysqli_real_escape_string($conn,$_POST['search']);

       if($searchq!=""){ //if search isnt empty
           //LIKE- used to find matches between a character string and a specified pattern. 
        $sql="SELECT * FROM serviceorder WHERE service_subscription_code
         LIKE '%$searchq%'";
        //open connection to mysql server
        $result=mysqli_query($conn,$sql);
        //returns number of rows in a result set
        $count  = mysqli_num_rows($result);
        if($count>0)// if count is greater than 0 - condition is true
        {
        $queryResults=mysqli_num_rows($result);
    
            while($row=mysqli_fetch_assoc($result)){

                //fetch column data
                $email=$row ['customeremail'];
                $service_subscription_code =$row['service_subscription_code'];
                $service_status =$row['status'];
                $query = "SELECT first_name, last_name FROM customerdetails WHERE email ='$email'";
                $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                // nested while 
                while($get=mysqli_fetch_assoc($qry)){
                    $firstname = $get['first_name'];
                    $lastname = $get['last_name'];
                }
                  
            }  

        
        ?>

</form>
<br>

<center>
 <form action="admin.create.payment.inc.php" name="registerform" method="POST" onsubmit="return Validation()" >
 
    <div class="container1">
 
    </select>
   
            <label> <b>Customer to receipt:</b> </label> 
<!--  removes the element from the layout flow. visibility:hidden hides it but leaves the space. 
Then the child div will be visible whereas the parent div will not be shown -->
            <input  type="text" style="display:none" name ="subscription_code_service" id="subscription_code_service"  value ="<?php echo $service_subscription_code;?>"  > <br> <br>   
             <input  type="text" name ="firstname" id="firstname"  value ="<?php echo "$firstname $lastname | $service_subscription_code ";?>"  disabled="disable"> <br> <br> 
            <label> Amount</label> <br>
            <input  type="text" name ="payment_amount" id="amount" placeholder="In KShs."> <br> <br>
             
            <label> Payment Date</label> <br>
            <input type="date"  name ="payment_date" id="payment_date" onmouseout="valDate" >
            <br/><br>
           
            <label> Service Description</label>   <br>
            <input  type="text" name ="payment_desc" id="payment_desc" placeholder="Service Description">
            <br/> <br>

            <label> Payment Reference No#:</label> <br>
            <input  type="text" name ="payment_reference" id="payment_ref" placeholder="Payment Reference No#"><br> <br>

            <label>Payment Mode:</label> <br>
            <input  type="text" name ="payment_mode" id="payment_mode"  placeholder="Payment Mode"><br> <br>
            </div>

  <!-- name of button submit is used by isset() function in php to get the targeted form i.e admin.create.payment.inc.php -->
            <button name="create_payment"> CREATE RECEIPT</button>
        </form>
</center>    
 <?php
        }
        else{
            echo "The search results did not match any customer subscrption code ";
        }
     }// 99 line
     else{
     echo "Enter customer service subscription code";
     }
    }

    ?>
</div>
	</div>
</div>
</div>
<!-- ........................JS -->
<script>

function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
        //value returns the value of the value atribute of a text field
		FirstName=document.registerform.firstname.value;
		LastName=document.registerform.lastname.value;
		Amount=document.registerform.amount.value;
		PaymentDate=document.registerform.payment_date.value;
		PaymentDesc=document.registerform.payment_desc.value;
		PaymentRef=document.registerform.payment_ref.value;
		PaymentMode=document.registerform.payment_mode.value;
        
//if fname empty,alert. Get element by id used to return element with the ID attribute
//focus- makes sure field has details before you move onto the nxt input field
//getElementById returns element whose id property matches the specified string
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

		if(Amount==""){
		alert("Please the Amount");
		document.getElementById("amount").focus();
		return false;
		}

		if(PaymentDate==""){
		alert("Please Payment Date");
		document.getElementById("payment_date").focus();
		return false;
		}


		if(PaymentDesc==""){
		alert("Please enter Service Description");
		document.getElementById("payment_desc").focus();
		return false;
		}

		if(PaymentRef==""){
		alert("Please enter Payment Reference Number");
		document.getElementById("payment_ref").focus();
		return false;
		}

		if(PaymentMode==""){
		alert("Please enter Mode of Payment");
		document.getElementById("payment_mode").focus();
		return false;
		}

	} 
</script>
</body>
</html>

