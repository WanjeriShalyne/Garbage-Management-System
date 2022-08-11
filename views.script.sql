1. Have added logout for staff & admin.
2. Admin dashboard - reports 
   - 1st report we want to create a view by the name list_of_subscribed_customers_active
	we shall display customer's first_name, last_name, county, service_name date_of_subscription, service_code
	we shall use 3 tables-:
				- customerdeatils unique key  -> email
				- serviceorder unique key -> customeremail & service_code
				- services unique key -> service_code

	first we create a view from customerdetails & serviceorder (as customersub) using email then create our intended view using the new 
	view's name and services table (reason the services table does not have email)
      
# -----start customersub view ----- 
CREATE VIEW customersub_active AS SELECT customerdetails.first_name, customerdetails.last_name,customerdetails.county,serviceorder.startdate AS date_of_subscription, 
serviceorder.service_code FROM customerdetails INNER JOIN serviceorder ON customerdetails.email = serviceorder.customeremail WHERE serviceorder.status='active';
#-----end customersub view ----- 

#---start list_of_subscripted_active_customers -----
CREATE VIEW list_of_subscribed_customers_active AS customersub.first_name AS customer_firstname, customersub.last_name AS customer_lastname, customersub.county, 
customersub.date_of_subscription, customersub.service_code, services.service_name FROM customersub INNER JOIN services ON customersub.service_code = services.service_code;

  #---end list_of_subscripted_active_customers 

  # -----start customersub_terminated view ----- 
  CREATE VIEW customersub_terminated AS SELECT customerdetails.first_name, customerdetails.last_name,customerdetails.county,serviceorder.startdate AS date_of_subscription, 
  serviceorder.service_code FROM customerdetails INNER JOIN serviceorder ON customerdetails.email = serviceorder.customeremail WHERE serviceorder.status='terminated';
    
  #-----end customersub_terminated view -----	

  #---start list_of_subscripted_terminated_customers -----
CREATE VIEW list_of_subscribed_customers_terminated AS customersub_terminated.first_name AS customer_firstname, customersub_terminated.last_name AS customer_lastname, customersub_terminated.county, 
customersub_terminated.date_of_subscription, customersub_terminated.service_code, services.service_name FROM customersub_terminated INNER JOIN services ON customersub_terminated.service_code = services.service_code;

  #---end list_of_subscripted_terminated_customers 

#----invoice merge customerdetails and invoicestatement tables---
create view invoice_cust_invoice as select customerdetails.first_name, customerdetails.last_name, customerdetails.mobile_number, invoicestatement.amount, invoicestatement.invoice_date,
invoicestatement.service_code, invoicestatement.staff_name from customerdetails inner join invoicestatement on
 customerdetails.email = invoicestatement.customeremail;
 #----!invoice merge customerdetails and invoicestatement tables---

 #---invoice merge invoice_cust_invoice and staff tables---
create view invoice_cust_invoice_staff as select invoice_cust_invoice.first_name as customer_firstname,
 invoice_cust_invoice.last_name as customer_lastname, invoice_cust_invoice.mobile_number, 
invoice_cust_invoice.amount, invoice_cust_invoice.invoice_date,
invoice_cust_invoice.service_code, invoice_cust_invoice.staff_name, staff.first_name AS staff_firstname, staff.surname AS staff_lastname,
 staff.staff_number
 from invoice_cust_invoice inner join staff on
 invoice_cust_invoice.staff_name = staff.email;

 #---invoice merge invoice_cust_invoice and staff tables---

 #---invoice merge invoice_cust_invoice_staff and services tables---
 create view invoice_cust_invoice_staff_services as select invoice_cust_invoice_staff.customer_firstname,
 invoice_cust_invoice_staff.customer_lastname, invoice_cust_invoice_staff.mobile_number, 
invoice_cust_invoice_staff.amount,invoice_cust_invoice_staff.invoice_date,
invoice_cust_invoice_staff.service_code, invoice_cust_invoice_staff.staff_name, invoice_cust_invoice_staff.staff_firstname, 
invoice_cust_invoice_staff.staff_lastname,
 invoice_cust_invoice_staff.staff_number,services.service_name
 from invoice_cust_invoice_staff inner join services on
 invoice_cust_invoice_staff.service_code = services.service_code;
 #---invoice merge invoice_cust_invoice_staff and services tables---


-- #customerdetails merge receiptsstatement
use garbage;
 CREATE VIEW county_receipts AS SELECT receiptsstatement.first_name, receiptsstatement.last_name, receiptsstatement.payment_description, 
 receiptsstatement.receipts_date, 
receiptsstatement.amount, receiptsstatement.reference_number, receiptsstatement.payment_mode, customerdetails.county,customerdetails.town,
customerdetails.roadname,
customerdetails.apartments,customerdetails.house_number FROM receiptsstatement INNER JOIN customerdetails ON receiptsstatement.customeremail = 
customerdetails.email;
-- #customerdetails merge receiptsstatement

-- #customerdetails merge invoicestatement
CREATE VIEW  invoice_cust_all AS SELECT  customerdetails.first_name, customerdetails.last_name, customerdetails.email, customerdetails.mobile_number, customerdetails.county,
customerdetails.town, customerdetails.roadname, customerdetails.apartments, customerdetails.house_number, invoicestatement.amount,
invoicestatement.invoice_date, invoicestatement.invoice_desc,invoicestatement.staff_name, invoicestatement.customeremail, invoicestatement.service_code FROM customerdetails
INNER JOIN invoicestatement	 ON customerdetails.email=invoicestatement.customeremail;
-- #customerdetails merge invoicestatement

-- #services merge serviceorder
use garbage;
CREATE VIEW services_and_serviceorder AS SELECT services.service_name, services.service_code, serviceorder.service_subscription_code,serviceorder.customeremail,
 serviceorder.status, serviceorder.startdate, serviceorder.enddate FROM
services INNER JOIN serviceorder ON services.service_code = serviceorder.service_code;
-- #services merge serviceorder

.////////////////////////////////
<?php
 include_once('include/session.php');
?>
<!DOCTYPE html>
<html>
<head>

	<title>Generate Member Receipt</title>
    <link rel="stylesheet"  href="register.css">
	<link rel="stylesheet" href="dashboard.staff.css">
    <style>
            .container{
    text-align:left;
    margin-top: 30px;
    font-size:18px;
    text-align:center;
    margin-bottom:30px;
      }
      .container1{
          font-size: 20px;
          line-height: 1.5;
      }
      .container1 input{
          width: 500px;
          height: 50px;
          font-size: 18px;
             }
    button{
    margin-top: 40px; /*create space around elements, outside of any defined borders.*/
    margin-bottom: 200px;
	margin-left: 300px;
    width: 30%;
    font-size: 16px;
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
<?php include_once'menu.staff.php';?>
<!-- navigation bar -->

<div class="container">
	<h1> Customer Receipt</h1>
</div>

    <?php 
    //logedin user
    $email = $_SESSION['user'];
    include_once('include/connection.inc.php');
    
    $query = "SELECT * FROM serviceorder";

    $customer_serv_sub= mysqli_query($conn,$query) or die(mysqli_error($conn));
    $num=mysqli_num_rows($customer_serv_sub);
    ?>
     

<center>
 <form action="include/staff.create.payment.inc.php" method="POST" name="registerform" method="POST" onsubmit="return Validation()">
    
    <!-- caption -->
    <div class="container1">
        <div class="chagua">
            <label>Generate Payment Receipt to: </label>   <br>

            <form action="staff.view.all.receipts.php" method="$_POST">
<a href="staff.view.receipts.php"><p type="submit" style="width: 12%; height:10%; font-size:16px;float:left;margin-left:10px;">
                         <b> VIEW RECEIPTS </b> </p> <br></a>
</div>
</form>
            <!-- <select  name="service_sub_code" id="receipt">
</div>

    <?php 
    //if($num==0){
      //  echo "No record found!";
   // }else{
        while($get=mysqli_fetch_assoc($customer_serv_sub)){
            //  $id=$get['id'];
            //  $email=$get['customeremail'];
            //  $service_subscription_code=$get['service_subscription_code'];
            //  $service_code=$get['service_code']; 
            //  $start_date =$get['startdate'];
            // ?>
            <option value="<?php // echo $service_subscription_code;?>">
            <?php //echo $email;?>&nbsp;&nbsp;|&nbsp;&nbsp;Service Code<?php //echo $service_code;?>
            &nbsp;&nbsp;|&nbsp;&nbsp;sub.Code<?php //echo $service_subscription_code;?>&nbsp;&nbsp;|&nbsp;&nbsp; <?php echo $start_date ;?></option>
           
           
             <?php
        }
    // }
    ?>
    </select> -->
   
   
             <label> First Name</label> <br>
            <input  type="text" name ="firstname" id="firstname" placeholder="Please input First Name"><br> <br>

            <label> Last Name</label> <br>
            <input  type="text" name ="lastname" id="lastname" placeholder="Please input Last Name"><br> <br>

            <label> Amount</label> <br>
            <input  type="text" name ="payment_amount" id="amount" placeholder="In KShs."> <br> <br>
             
            <label> Payment Date</label> <br>
            <input type="date" name ="payment_date" id="payday">
            <br/><br>
           
            <label> Payment Service Description</label>
            <br>
            <input  type="text" name ="payment_desc" id="pay_desc"  placeholder="Payment Description">
            <br/> <br>

            <label>Payment Reference No#:</label> <br>
            <input  type="text" name ="payment_reference" id="pay_ref" placeholder="Payment Reference No#"><br> <br>

            <label>Payment Mode:</label> <br>
            <input  type="text" name ="payment_mode" id="pay_mode" placeholder="Payment Mode"><br> <br>
            </div>

  <!-- name of button submit is used by isset() function in php to get the targeted form i.e admin.create.payment.inc.php -->
            <button name="create_payment" id="register"> Create Receipt</button>
    
        </form>
</center>
  
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

//////////////////////////////////////////