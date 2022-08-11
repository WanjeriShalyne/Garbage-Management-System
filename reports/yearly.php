<?php
session_start();

?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../CSS/allan.css">
<title>Rongai's Real Estate System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--The viewport meta tag tells the browser that the width of the screen should be considered the  width of the device your using.
The website will follow the width of the device being used. -->
</head>
<div class="ThirdToolBar" >
	<a href="LandlordIndex.php"><img src="../Icons/Logo.png" class = "Logo"></a>
	<br>
<strong> WELCOME <?php echo strtoupper($_SESSION["FirstName"].' '.$_SESSION["LastName"]);?>	</strong>
		<br>

		<div class="FirstToolBar-dropdown">
			<a href="../PHP/LandlordLogOut.php" class="btn"> <img class ="img" src="../Icons/exit.png"><br> LOGOUT</a>		</div>
	&nbsp;&nbsp;&nbsp;
	<div class="FirstToolBar-dropdown">
	<button class="btn"> <img class ="img" src="../Icons/contact.png"><br> CONTACT </button>
	<div class="FirstToolBar-content">
		<a href="LandlordContact.php">Tenants</a>
	  </div>
		</div>
	&nbsp;&nbsp;&nbsp;
	<div class="FirstToolBar-dropdown">
	<a href="../Landlord/LandlordReports.php" class="btn"> <img class ="img" src="../Icons/application.png"><br> REPORTS</a>
	</div>
	&nbsp;&nbsp;&nbsp;
	<div class="FirstToolBar-dropdown">
	<button class="btn"> <img class ="img" src="../Icons/current.png"><br> MANAGE </button>
	<div class="FirstToolBar-content">
		<a href="LandlordReviewTenant.php">Tenants</a>
		<a href="LandlordRemoveTenant.php">Remove Tenant</a>
		<a href="LandlordReview.php">Property</a>
		<a href="LandlordSubscriptions.php">Subscriptions</a>
		<a href="LandlordAvailableHouses.php">Available Space</a>
		<a href="LandlordReportsEdit.php">Payments</a>
	  </div>
		</div>
		&nbsp;&nbsp;&nbsp;
		<div class="FirstToolBar-dropdown">
			<button class="btn"> <img class ="img" src="../Icons/add.png"><br> ADD </button>
			<div class="FirstToolBar-content">
				<a href="LandlordPropertyRegistration.php">Property</a>
				<a href="LandlordAddSubscription.php">Property Subscription</a>
				<a href="LandlordAddTenant.php">Tenant</a>
			  </div>
				</div>
</div>



<body class="body">
	<br><br><br><br>
	<h1 class="h1">MONTHLY PAYMENTS REPORTS<br> </h1>
 	

	<form name="RegForm" method="post"  action="../PHP/LandlordReportsMonthly.php" onsubmit="return Validation()" >
<div class="message">
<a href="LandlordReports.php" class="btn" style= "float:Left"><img class ="img" src="../Icons/doubleleft.png"> BACK TO REPORTS</a>
<br>
	 PROPERTY NAME:	<select name="PropertyName" id="PropertyName">
	 <option></option>
	<?php
					$serverName = "ALLANPAVILION"; //serverName
					$connectionInfo = array
					("Database"=>"REMSProject_LIVE2",
					"UID"=>"sa",
					"PWD"=>"Allan");
					// ConnectionInfo is an array where it saves the login info and runs the saved array
					$conn = sqlsrv_connect( $serverName, $connectionInfo);
					//argument stating what to say when one passes or fails
					
					if( $conn==FALSE) 
					{
					echo "Connection could not be established.";
					exit( print_r( sqlsrv_errors()));
						//^The above is a print where it saves error statements to a log file for the above connections made that have failed.
					
					}
					$PID=$_SESSION["NationalID"];  
					//creating variable PID, where it will get the token session NationalID that was saved

					$sql = "SELECT PropertyID, PropertyName FROM Properties where OwnerNatID = $PID ";
					//Create the query and save it in the created variable


					$stmt = sqlsrv_query( $conn, $sql );
					// Prepares and executes a query, passing the connection & the sql query

					if( $stmt == false) {
						exit( print_r( sqlsrv_errors()) );
					}
					//if the executed query is equal to false, 
					//kill the query execution and print in a human way
					//it will print and return
					//the last error and warning information about the last SQLSRV operation performed

					while( $row = sqlsrv_fetch_array( $stmt) )
							{
								echo "<option value='". $row['PropertyID'] ."'>" .$row['PropertyName'] ."</option>";  
								// displaying data in option menu
						}
							
			   
   		 ?>
	</select>
	House Number:		
			<select name="HouseName" id="HouseName">
            <option></option>
			<?php
			$serverName = "ALLANPAVILION"; //serverName
			$connectionInfo = array
			("Database"=>"REMSProject_LIVE2",
			"UID"=>"sa",
			"PWD"=>"Allan");
			// ConnectionInfo is an array where it saves the login info and runs the saved array
			$conn = sqlsrv_connect( $serverName, $connectionInfo);
			//argument stating what to say when one passes or fails
			
			if( $conn==FALSE) 
			{
			echo "Connection could not be established.";
			exit( print_r( sqlsrv_errors()));
				//^The above is a print where it saves error statements to a log file for the above connections made that have failed.
			
			}
			
			$PID=$_SESSION["PropertyID"];
            //creating variable PID, where it will get the token session PropertyID that was saved

			$sql = "SELECT HouseID, HouseName FROM Houses where PropertyID = $PID"; 
            //Create the query and save it in the created variable

			$stmt = sqlsrv_query( $conn, $sql );
			// Prepares and executes a query, passing the connection & the sql query

			if( $stmt == false) {
				exit( print_r( sqlsrv_errors()) );
			}
			//if the executed query is equal to false, 
            //kill the query execution and print in a human way
            //it will print and return
            //the last error and warning information about the last SQLSRV operation performed

			while( $row = sqlsrv_fetch_array( $stmt) )
					{
						echo "<option value='". $row['HouseName'] ."'>" .$row['HouseName'] ."</option>";  
						// displaying data in option menu
				}
					
					
				?>
			</select>
	<br>

	SELECT MONTH
    <select name="Month" id="Month">
	<option></option>
    <option value ='01'> JANUARY </option>
    <option value ='02'> FEBRUARY </option>
    <option value ='03'> MARCH </option>
    <option value ='04'> APRIL </option>
    <option value ='05'> MAY </option>
    <option value ='06'> JUNE </option>
    <option value ='07'> JULY </option>
    <option value ='08'> AUGUST </option>
    <option value ='09'> SEPTEMBER </option>
    <option value ='10'> OCTOBER </option>
    <option value ='11'> NOVEMBER </option>
    <option value ='12'> DECEMBER </option>
            </select>
	YEAR:	
	<select name="Year" id="Year"> 
	<option></option>
		<?php 
   		for($i = 2000 ;
		    $i <= date('Y');
			 $i++){
      		echo "<option>$i</option>";
	//given that variable i which has the year 2000
	//if i variable is less and equal to the current Year
	//echo the number with option output
	//++ is an increment operator and the loop will end at the current year
   }
		?>
	</select>
	<br>
	<button class="btn"><img class ="img" src="../Icons/refresh.png" ><br>Generate</button>	

	
	<br>
		
	
	<table class="table">
		<tr>
			<td class="cellHead" colspan="4">MONTH:<i> <?php echo strtoupper($_SESSION["Month"]);?></i> YEAR:<i> <?php echo strtoupper($_SESSION["Year"]);?></td>
			<td class="cellHead" colspan="7">PROPERTY NAME:<i> <?php echo strtoupper($_SESSION["PropertyName"]);?></i></td>
		</tr>
		<tr>
			<td class="cellHead">#</td>
			<td class="cellHead">PAYMENT ID</td>
			<td class="cellHead">PROPERTY NAME</td>
			<td class="cellHead">HOUSE NAME</td>
			<td class="cellHead">ITEM NAME</td>
			<td class="cellHead">ITEM COST</td>
			<td class="cellHead">AMOUNT PAID</td>
			<td class="cellHead">BALANCE</td>
			<td class="cellHead">PAID THROUGH</td>
			<td class="cellHead">ACCOUNT NO.</td>
			<td class="cellHead">REFERENCE NUMBER</td>
			<td class="cellHead">DATE BILLED</td>
			<td class="cellHead">STATUS</td>
		

		</tr>
		<tr>
		<?php
			
			$serverName = "ALLANPAVILION"; //serverName
			$connectionInfo = array
			("Database"=>"REMSProject_LIVE2",
			"UID"=>"sa",
			"PWD"=>"Allan");
			// ConnectionInfo is an array where it saves the login info and runs the saved array
			$conn = sqlsrv_connect( $serverName, $connectionInfo);
			//argument stating what to say when one passes or fails
			
			if( $conn==FALSE) 
			{
			echo "Connection could not be established.";
			exit( print_r( sqlsrv_errors()));
				//^The above is a print where it saves error statements to a log file for the above connections made that have failed.
			
			}  
			
		  
	 
			$Month = $_SESSION["Month"];
			$HouseNumber = $_SESSION["HouseName"];
			$PropertyID = $_SESSION["PropertyID"];
			$Year = $_SESSION["Year"];
            //creating variable Month,HouseNumber,PropertyID,Year
			// where it will get the 
			//token session Month,HouseNumber,PropertyID,Year that was saved
			
	 
	 
			$sql = "select 
					ROW_NUMBER() OVER(ORDER BY SubscriptionPaymentID ASC) AS RowNumber,
					SubscriptionPayments.SubscriptionPaymentID,
					SubscriptionPayments.PropertyID,
					Properties.PropertyName,
					SubscriptionPayments.HouseID,
					Houses.HouseName,
					SubscriptionPayments.SubscriptionAmount,
					SubscriptionPayments.MPESAREF,
					SubscriptionPayments.DateBilled,
					SubscriptionPayments.PaymentType,
					SubscriptionPayments.ProposedAmount,
					SubscriptionPayments.Balance,
					SubscriptionPayments.PaymentVia,
					SubscriptionPayments.PayBill,
					'SubscriptionPayments.Approved'=CASE when SubscriptionPayments.Approved='0' THEN 'Pending' ELSE 'Approved' END		
					From SubscriptionPayments
					JOIN 
					Houses
					ON
					Houses.HouseID = SubscriptionPayments.HouseID
					JOIN 
					Properties
					ON
					Properties.PropertyID = SubscriptionPayments.PropertyID
					Where MONTH (SubscriptionPayments.DateBilled) = '$Month'
					AND 
					YEAR (SubscriptionPayments.DateBilled) = '$Year'
					AND
					SubscriptionPayments.PropertyID = '$PropertyID'
					AND 
					SubscriptionPayments.HouseID =(Select HouseID from Houses where HouseName = '$HouseNumber' and PropertyID = $PropertyID)
					 ";
					//Create the query and save it in the created variable

			$stmt = sqlsrv_query( $conn, $sql );
			// Prepares and executes a query, passing the connection & the sql query

			if( $stmt == false) {
				exit( print_r( sqlsrv_errors()) );
			}          
			 //if the executed query is equal to false, 
            //kill the query execution and print in a human way
            //it will print and return
            //the last error and warning information about the last SQLSRV operation performed

			while( $row = sqlsrv_fetch_array( $stmt) )
					{
	 
						$SubscriptionPaymentID = $row['SubscriptionPaymentID'];
					   
	 
						echo "<tr>
						<td class='cellHead'>SUB".$row['RowNumber']."</td>
						<td class='cellHead'>".$row['SubscriptionPaymentID']."</td>
						<td class='cellHead'>".$row['PropertyName']."</td>
						<td class='cellHead'>".$row['HouseName']."</td>
						<td class='cellHead'>".$row['PaymentType']."</td>
						<td class='cellHead'>".$row['ProposedAmount']."</td>
						<td class='cellHead'>".$row['SubscriptionAmount']."</td>
						<td class='cellHead'>".$row['Balance']."</td>
						<td class='cellHead'>".$row['PaymentVia']."</td>
						<td class='cellHead'>".$row['PayBill']."</td>
						<td class='cellHead'>".$row['MPESAREF']."</td>
						<td class='cellHead'>".$row['DateBilled']->format('D d-M-Y')."</td>
						<td class='cellHead'>".$row['SubscriptionPayments.Approved']."</td>
						</tr>";
						// displaying data in option menu
					}
					sqlsrv_free_stmt($stmt);  
					sqlsrv_close($conn);
					
				 
				 ?>
		</tr>


		<tr>
		<?php
			
			$serverName = "ALLANPAVILION"; //serverName
			$connectionInfo = array
			("Database"=>"REMSProject_LIVE2",
			"UID"=>"sa",
			"PWD"=>"Allan");
			// ConnectionInfo is an array where it saves the login info and runs the saved array
			$conn = sqlsrv_connect( $serverName, $connectionInfo);
			//argument stating what to say when one passes or fails
			
			if( $conn==FALSE) 
			{
			echo "Connection could not be established.";
			exit( print_r( sqlsrv_errors()));
				//^The above is a print where it saves error statements to a log file for the above connections made that have failed.
			
			}  
			
		  
	 
			$Month = $_SESSION["Month"];
			$HouseNumber = $_SESSION["HouseName"];
			$PropertyID = $_SESSION["PropertyID"];
			$Year = $_SESSION["Year"];
			//creating variable Month,HouseNumber,PropertyID,Year
			// where it will get the 
			//token session Month,HouseNumber,PropertyID,Year that was saved

	 
	 
			$sql = "
					select 
					ROW_NUMBER() OVER(ORDER BY HousePaymentID ASC) AS RowNumber,
					HousePayments.HousePaymentID,
					HousePayments.PropertyID,
					Properties.PropertyName,
					HousePayments.HouseID,
					Houses.HouseName,		
					HousePayments.RentAmount,
					HousePayments.MPESAREF,
					HousePayments.DateBilled,
					HousePayments.PaymentType,
					HousePayments.ProposedAmount,
					HousePayments.Balance ,
					HousePayments.PaymentVia,
					HousePayments.PayBill,
					'HousePayments.Approved'=CASE when HousePayments.Approved='0' THEN 'Pending' ELSE 'Approve' END		
					From HousePayments
					JOIN 
					Houses
					ON
					Houses.HouseID = HousePayments.HouseID
					JOIN
					Properties
					ON
					Properties.PropertyID = HousePayments.PropertyID
					Where MONTH(HousePayments.DateBilled) = '$Month'
					AND
					YEAR(HousePayments.DateBilled) = '$Year'
					AND 
					HousePayments.PropertyID = '$PropertyID'
					AND
					HousePayments.HouseID = (Select HouseID from Houses where HouseName = '$HouseNumber' and PropertyID = $PropertyID)
					";
				//Create the query and save it in the created variable

			$stmt = sqlsrv_query( $conn, $sql );
            //Create a variable where you will  have a  inbuilt function sqlsrv_query
//which executes a query by passing the connection & the sql query


			if( $stmt == false) {
				exit( print_r( sqlsrv_errors()) );	
					}
			//if the executed query is equal to false, 
            //kill the query execution and print in a human way
            //it will print and return
            //the last error and warning information about the last SQLSRV operation performed



			while( $row = sqlsrv_fetch_array( $stmt) )
					{
	 
						$HousePaymentID = $row['HousePaymentID'];
					   
	 
						echo "<tr>
						<td class='cellHead'>PAY".$row['RowNumber']."</td>
						<td class='cellHead'>".$row['HousePaymentID']."</td>
						<td class='cellHead'>".$row['PropertyName']."</td>
						<td class='cellHead'>".$row['HouseName']."</td>
						<td class='cellHead'>".$row['PaymentType']."</td>
						<td class='cellHead'>".$row['ProposedAmount']."</td>
						<td class='cellHead'>".$row['RentAmount']."</td>
						<td class='cellHead'>".$row['Balance']."</td>
						<td class='cellHead'>".$row['PaymentVia']."</td>
						<td class='cellHead'>".$row['PayBill']."</td>
						<td class='cellHead'>".$row['MPESAREF']."</td>
						<td class='cellHead'>".$row['DateBilled']->format('D d-M-Y')."</td>
						<td class='cellHead'>".$row['HousePayments.Approved']."</td>
						</tr>";
						// displaying data in option menu
					}
					sqlsrv_free_stmt($stmt);  
					sqlsrv_close($conn);
					
				 
				 ?>
		</tr>

</table>

<br>




</div>
		
		
</body>
<br>

<script> 
//Begining of validation
    function Validation()
            { 
//First we check if the input types are empty, giving them a name and calling it using document.
//And the form name is connected to link its path followed to the id we gave and calling its value

				PropertyName=document.RegForm.PropertyName.value;				
                Month=document.RegForm.Month.value;				
                HouseName=document.RegForm.HouseName.value;
				Year=document.RegForm.Year.value;

//if argument, if empty, we return the below alert. And we focus on the certain element ID we gave connected to.
            if(PropertyName==""){
            alert("Please select a property name");
            document.getElementById("PropertyName").focus();
            return false;
            } 
			if(Month==""){
            alert("Please select Month");
            document.getElementById("Month").focus();
            return false;
            } 
			if(HouseName==""){
            alert("Please select House Number");
            document.getElementById("HouseName").focus();
            return false;
            } 
			if(Year==""){
            alert("Please select Year");
            document.getElementById("Year").focus();
            return false;
            } 

            
//If all of the arguments are false, we complete here with the return showing all is true(All is okay and its passed)        
         return; 
        }

</script> 
<a href="LandlordIndex.php" class="btn">BACK TO YOUR PAGE</a>
<br>
<br>	

<br><br><p class="p" style="text-align: center;">Made by Allan Munene &#169; 1028503</p>
</html>
