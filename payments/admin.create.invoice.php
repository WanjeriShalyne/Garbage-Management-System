<?php
 include '../include/session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Client Invoice</title>
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">
       <style>

 .container{
    text-align:left;
    margin-top: 30px;/*create space around elements, outside of any defined borders.*/
    font-size:18px;
    text-align:center;
    margin-bottom:30px; /*create space around elements, outside of any defined borders.*/
      }
      .container1{
          font-size: 20px;
          line-height: 1.5; /*property sets the height of a line box.*/
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
    <!--navigation-->
<?php include "menu.payments.php";?>
    <!--navigation-->
    
    <div class="side_menu">

    <h3><a href="admin.all.invoices.php"> All Invoices</a></h3> <br>
		<h3><a href="admin.cust.invoices.service_filter.php">Invoices filter by service</a></h3> <br>
        <h3><a href="admin.cust.invoices.county_filter.php">Invoices filter by county</a></h3> <br>
        <h3><a href="admin.create.invoice.php">Create Invoice</a></h3> <br>

    </div>
<div class="main_dashboard">

<div class="container">
	<h2> <b> Create  Invoice</b> </h2>
</div>

<div style="margin-top:10px">

    <!-- search -->
    <form  action=""  method="post" >
        <label style="margin-left:300px; font-size:22px;">Search</label> 
         <input type="text" name="search" style="height: 30px; width:20%">   
         <button class="button1" type="submit" name="submit" >Search</button>   
</div> <br>  
    <?php 
    //fetch email of logged in user to enable querry.Return user email
    $email = $_SESSION['user'];

    include '../include/connection.inc.php';
    //select data using sql statement
    $query = "SELECT * FROM serviceorder";
   //open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $customer_serv_sub= mysqli_query($conn,$query) or die(mysqli_error($conn));
        // fetch result row as an associative array. Arrays that use named keys that you assign to them 
    //eg $age['peter']="35";
    $num=mysqli_num_rows($customer_serv_sub);
    

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
       // $queryResults=mysqli_num_rows($result);
    
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
 <form action="admin.create.invoice.inc.php" method="POST" name="registerform" onsubmit="return Validation()">
        <!-- caption -->
        <div class="container1">
        <div class="chagua">
        <input style="display:none" type="text" value="<?php echo $service_subscription_code?>" name ="customer_sub_code" p> 
            <label>Customer details to be invoiced</label>   <br>
         <!--This field is for display only, to guide the user-->
         <input type="text" value="<?php echo "  $firstname $lastname | $service_subscription_code";?>" name ="customer_details" p>   <br>
    
   
   <br><br>
   
            <label >Service Code</label>   <br>
            <select  name="service_code" id="service_code"> 
            	<option>1001</option>
            	<option>1002</option>
            	<option>1003</option>
            </select>
            <br>

            <label>Amount</label>   <br>
            <input type="text" name ="invoice_amount" id="amount" placeholder="In KShs.">   <br>
   
            <label >Service Status</label>   <br>
            <select name="service_status" id="service_status" > 
            	<option>active</option>
            	<option>terminated</option>	
            </select>
<br>
            <label >Invoice Date</label>   <br>
            <input type="date" name ="invoice_date" id="tarehe">   <br>
            <br>
           
            <label >Invoice Description</label>   <br>
            <input  type="text" name ="invoice_desc" id="invoice_desc" placeholder="Invoice description">   <br>
            <br>
            
            <button name="create_invoice"> Invoice customer</button>
        </form> 
          </center>

     <?php 
        }
        else{
        echo "The code doesn't match any customer subscription account";
        }
       }
       else{
       echo "Enter customer subscription code to be invoiced";
       }
    }
    ?>

    
</div>
</div>

</div>
</div>
<script>
    function Validation() 
	{ 
		//Checks out for empty input	
		// js variable,doc,name of form,id name.Get value of firstname.
        Service_code=document.registerform.service_code.value;
		Amount=document.registerform.amount.value;
		Service_status=document.registerform.service_status.value;
		Tarehe=document.registerform.tarehe.value;
		Invoice_desc=document.registerform.invoice_desc.value;
        
//if fname empty,alert. Get element by id used to return element with the ID attribute
        if(Service_code==""){
		alert("Please enter service code");
		document.getElementById("service_code").focus();
		return false;
		}

		if(Amount==""){
		alert("Please enter amount");
		document.getElementById("amount").focus();
		return false;
		}

		if(Service_status==""){
		alert("Please enter service status");
		document.getElementById("service_status").focus();
		return false;
		}

		if(Tarehe==""){
		alert("Please enter date");
		document.getElementById("tarehe").focus();
		return false;
		}

		if(Invoice_desc==""){
		alert("Please enter invoice description");
		document.getElementById("invoice_desc").focus();
		return false;
		}

	} 
</script>
</body>
</html>

