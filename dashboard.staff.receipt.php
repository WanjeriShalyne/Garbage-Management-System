<?php
 include 'include/session.php';
?>

<html>
<head>

	<title>Generate Member Receipt</title>
	<link rel="stylesheet"  href="admin/dashboard.admin.css"> <!--style tables and nav bar-->
    <style>
            .container{
    text-align:left;
    margin-top: 30px;
    font-size:18px;
    text-align:center;
    margin-bottom:30px;  /*create space around elements, outside of any defined borders */
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
    width: 500px;
    background: #DCDCDC;
}
     </style>
</head>



<body>
    <!-- navigation bar -->
<?php include 'menu.staff.php';?>
<!-- navigation bar -->

<?php 
    //logedin user
    $email = $_SESSION['user'];
    //connection to db
    include 'include/connection.inc.php';
    
    ?>

    <div class="container">
     <h1 >  Customer Receipt</h1>
     <p>Input customer subscription code</p>
</div>


    <!-- search -->
    <form  action="" id="form1" method="post" >
         <label style="margin-left:480px; font-size:22px;">Search</label> 
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

       if($searchq!=""){
              //LIKE- used to find matches between a character string and a specified pattern. 
        $sql="SELECT * FROM serviceorder WHERE service_subscription_code
         LIKE '%$searchq%'";
         //open connection to mysql server
        $result=mysqli_query($conn,$sql);
        //returns number of rows in a result set
        $count  = mysqli_num_rows($result);
        if($count>0){
        //check for any result select query
        $queryResults=mysqli_num_rows($result);
        // fetch result row as an associative array. Arrays that use named keys that you assign to them 
    //eg $age['peter']="35";
            while($row=mysqli_fetch_assoc($result)){
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

<center>
 <form action="include/staff.create.payment.inc.php" name="registerform" method="POST" onsubmit="return Validation()" >
 
    <div class="container1">
 
    </select>
   
            <label><b> Customer to receipt:</b></label>
            <input  type="text" style="display:none" name ="subscription_code_service"  value ="<?php echo $service_subscription_code;?>"  > <br> <br>   
             <input  type="text" name ="firstname" id="firstname"  value ="<?php echo "$firstname $lastname | $service_subscription_code ";?>"  disabled="disable"> <br> <br> 
            <label> Amount</label> <br>
            <input  type="text" name ="payment_amount" id="amount" placeholder="In KShs."> <br> <br>
             
            <label> Payment Date</label> <br>
            <input type="text"  name ="payment_date" id="payment_date" onmouseout="valDate" >
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
     }
     else{
     echo "Enter customer service subscription code";
     }
    }

    ?>
  
</div>
</div>
</div>

<script>
    function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
		Receipt=document.registerform.receipt.value;
		Amount=document.registerform.amount.value;
		Payday=document.registerform.payday.value;
		Pay_desc=document.registerform.pay_desc.value;
		Pay_ref=document.registerform.pay_mode.value;
		Pay_mode=document.registerform.pay_mode.value;
        
//if fname empty,alert. Get element by id used to return element with the ID attribute
		if(Receipt==""){
		alert("Please  enter receipt details");
		document.getElementById("receipt").focus();
		return false;
		}

		if(Amount==""){
		alert("Please enter amount");
		document.getElementById("amount").focus();
		return false;
		}

		if(Payday==""){
		alert("Please enter payment date");
		document.getElementById("payday").focus();
		return false;
		}

		if(Pay_desc==""){
		alert("Please enter payment service description");
		document.getElementById("pay_desc").focus();
		return false;
		}

		if(Pay_ref==""){
		alert("Please enter payment refence number");
		document.getElementById("pay_ref").focus();
		return false;
		}

		if(Pay_mode==""){
		alert("Please enter mode of payment");
		document.getElementById("pay_mode").focus();
		return false;
		}

	} 
</script>
</body>
</html>

