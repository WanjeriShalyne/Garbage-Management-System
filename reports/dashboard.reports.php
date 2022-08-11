<?php include '../include/session.php';?>
<html>
<head>
    <title>Different Reports</title>
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">
    <style> 
    button{
        margin-top: 50px;/*create space around elements, outside of any defined borders.*/
        margin-bottom: 30px;
        padding: 20px;/*space btwn content and border*/
        background-color: lightgrey;
        font-size: 22px;
        color: darkgreen;
    }
     </style>
</head>


<body>
	<!-- CALLING MENU.ADMIN.PHP THAT HAS NAVIGATION LINKS -->
	<?php include "menu.reports.php";?>

    <!--navigation-->
<div class="side_menu">
<h3> <a href="../reports/customers.active.subscription.php">Active Subscriptions</a></h3> <br>
<h3> <a href="../reports/all.registered.customer.php">Registered Customers</a></h3> <br>
<h3> <a href="../reports/customers.terminated.subscription.php">Terminated subscriptions</a></h3> <br> 
</div>

<div class="main_dashboard">
   <center>
<!-- list of reports to be generated -->
<!--display a list of all customers with active
subscription then provide a more detailed filter per  county and service. -->
<a href="../reports/customers.active.subscription.php"> <button type="submit" name="submit" > 
Customers with active subscription </button> </a> <br>

<!--This page will display a list of all customers with terminated
subscription then provide a more detailed filter per  county and service. -->
<a href="../reports/customers.terminated.subscription.php"> <button type="submit" name="submit"> 
Customers with terminated subscription  </button> </a> <br>

     <!-- list of all registered customers -->
     
 <a href="../reports/all.registered.customer.php">  <button type="submit" name="submit">List of all registered
     customers </button> </a> 
    </center>-->
     
</div>
</body>
</html>