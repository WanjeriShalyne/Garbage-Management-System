<?php include '../include/session.php';?>
<html>
<head>

    <title> Active Member Subscriptions</title>
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">

    <style>
    
/* styling the statement filter by */
      .container{
        margin-top: 20px;
        font-size:18px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */

/* drop down option for services and styling it  */
      .service{
       margin-left:300px;   /* space around an HTML element.*/
          }
      .service p{
       font-size:24px;   
      }
      /* styling drop down menu*/
      .chagua select{
	height: 45px;
    font-size: 18px;
    padding: 5px;
    width: 327px;
    background: darkgrey;
}
/* drop down option for services and styling it  */

.service1{
    font-size: 24px;
    padding-bottom: 200px; /*space between its content and its border.*/
}
.hidden{
    display: none;
}
.one{
    text-align: center;
  
}
  </style>
</head>


<body>
	<!-- CALLING MENU .ADMIN.PHP THAT HAS NAVIGATION LINKS -->
	<?php include "menu.reports.php";?>

    <!--navigation-->
<div class="side_menu">
<h3> <a href="../reports/all.registered.customer.php">Registered Customers</a></h3> <br>
   <h3> <a href="../reports/customers.active.subscription.php">Active Subscriptions</a></h3> <br>
   <h3> <a href="../reports/customers.terminated.subscription.php">Terminated subscriptions</a></h3> <br>
   
</div>
<div class="main_dashboard">

    <!--navigation-->

    <div class="one">
	<h1>Filter by:</h1>
   </div>
   <br>
   <br>

<!-- Form to filter by services offered. Form Data sent to detailed.reports/detailed.reports/
active_sub_service_filter.php upon clicking filter-->
<center>
    <form action="active_sub_service_filter.php" method="POST" >
    <select name="service_filter" style="width: 20%; height:7%; float:left; margin-left:300px; font-size:18px;
     margin-bottom:20px;">
    <option value=""> Select service to filter</option>
    <option value="1001">Residential Collections</option>
    <option value="1002">Commercial Collections</option>
    <option value="1003">Construction & Demolitions</option>
    </select>
   <button type="submit" name="active_sub" style="width: 20%; height:7%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;"> Filter </button>  <br> <br>
     </form>
     <br>
     <br>
     <br>


<!--  filter by service -->
        

 <!-- Form to filter by services based on location. Form Data sent to detailed.reports/detailed.reports/
active_sub_service_filter.php upon clicking filter-->

<form action="active_sub_location_date_filter.php" method="POST" >
 <select name="county_filter" style="width: 20%; height:7%; float:left; margin-left:300px; font-size:18px;
     margin-bottom:20px;">
<option value=""> Select county to filter</option>
 <option value=" Nairobi">Nairobi</option>
 <option value="Kajiado">Kajiado</option>
</select>
<button type="submit" name="active_sub_location" style="width: 20%; height:7%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">  Filter </button>  <br> <br>       
 </form>
<br>
<br>
<br>


 <form action="active_subscriptions.php" method="POST" >
<button type="submit" name="active_sub" style="width: 20%; height:7%; float:left; margin-left:300px; font-size:18px;
     margin-bottom:20px;"> Filter By Active Subscriptions </button>  
 </form>
</center>
 






<!-- filter by service id two-->
 <div class=" active" id=filter_by_service_div>
 
    <!--navigation-->
    <!-- Form to filter by count and service-->
    <?php include('../include/connection.inc.php');
        // active_sub -name of button from customers.active.subscription.php
        //'service_filter is from customers.active.subscription.php
     if(isset($_POST['active_sub'])){
     $service_filter =$_POST['service_filter']; 
     ?>

<div class="container">
     <h3 >  List of Subscripted Customers Per Service</h3>
</div>
            
    <form action="active_sub_service_date_filter.php" method="POST" ><br><br>
               
    <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; padding-bottom:50px">
                    Start Date:
     </div>
     <!-- div-used to group elements for styling purposes (using the class or id attributes), or
      because they share attribute value -->
                <div class="filter_form_inputes filter_name_county" style="width: 50%; float:left">
                <input name="startdate" id="StartDate" type="date">
                         
                        
                </div>
                <div class="filter_form_inputes filter_desc"  style="width: 18%; float:left">
                    End Date:
                </div>
                
                <div class="filter_form_inputes filter_name_county" style="width: 50%; float:left">
                <input name="enddate" id="EndDate" type="date">
                <input name="service_filter" id="county_code" type="text" value="<?php echo $county_filter;?>" style="display:none;">

                </div>
                
                <div class="filter_form_inputes filter_name_county" style="width: 85%; float:left">
         <button type="submit" name="active_cust_service_date" style="width: 50%; float:left">
                            Generate
                        </button>
                </div>
            </div>  
            </form>
 

    <table  id="customers"> 
    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>County</th>
                        <th>Subscription Date</th>
                        <th>Service Name  </th>
                        </tr>
    <!-- creating connection with DB  -->
  
     <?php      
//select data using sql statement            
$query = "SELECT * FROM list_of_subscribed_customers_active WHERE service_code ='$service_filter '";
//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
    //return number of rows in a result set
      $count = mysqli_num_rows($qry);
 //fetch all results from $qry,getting all data from db  and insert each row of data inside those rows as an array
      while($row=mysqli_fetch_assoc($qry))
  {
                        
  ?>
  <tr>

  <!-- customer_firstname is a table column in (list_of_subscribed_customers_active) table -->
<td><?php echo $row['customer_firstname'];?></td>
<td><?php echo $row['customer_lastname'];?></td>
 <td><?php echo $row['county'];?></td>
 <td><?php echo $row['date_of_subscription'];?> </td>
<td><?php echo $row['service_name'];?> </td>
</tr>
   <?php 
 }}
                    
 ?>

                        
                </table>

</div>
<!-- end of filter by service -->


 <div class="hidden" >Hello</div>
 <div class="hidden">heloo</div>
 <div class="hidden">Hi</div>
           
</div>
    
</body>
</html>