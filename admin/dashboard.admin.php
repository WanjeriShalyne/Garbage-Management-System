<?php
include "../include/session.php";
include "../include/connection.inc.php";
// start of session
$email=$_SESSION['user'];
$sql="select * from customerdetails where email ='$email'";
$qry = mysqli_query($conn, $sql);
?>

<!-- ADMIN LANDING PAGE -->
<html>
    <head>
    <title>Admin Landing Page</title>

    <link rel="stylesheet"  href="dashboard.admin.css">

</head>

<body>
<div class="banner">
    <!-- CALLING MENU .ADMIN.PHP THAT HAS NAVIGATION LINKS -->
	<?php include "menu.admin.php";?>

<!--content-->
<div class="content">
<h1>North Garbage Collectors</h1>	
<p>Welcome to North Garbage Collectors</p>
</div>
</div>
<!--content-->

</body>
</html>