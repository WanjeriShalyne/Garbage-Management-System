<?php
include  "include/session.php";
include "include/connection.inc.php";
$email=$_SESSION['user'];
$sql="select * from customerdetails where email ='$email'";
$qry = mysqli_query($conn, $sql);
?>


<html>
    <head>
    <title>Staff Member Homepage</title>
    <link rel="stylesheet" href="dashboard.cust.css">
	

</head>

<body>
<div class="banner">
	<?php include 'menu.staff.php';?>

<!--content-->
<div class="content">
<h1>North Garbage Collectors</h1>	
<p>Welcome to North Garbage Collectors</p>
</div>
</div>
<!--content-->


</body>
</html>