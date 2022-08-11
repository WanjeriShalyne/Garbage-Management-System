<?php
 include '../include/session.php';
?>

<html>
<head>

	<title>Payments per County</title>
	<link rel="stylesheet"  href="../admin/dashboard.admin.css"> <!--style tables and nav bar-->

       <style>
  
/* styling the statement filter by */
.container{
        margin-top: 20px;
        font-size:16px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */

  /* drop down option for services and styling it  */
  .service{
       margin-left:20px; /* space around an HTML element.*/
       text-align:center; /*position: */;  
       margin-top: -90px; 
       
          }
      .service p{
       font-size:18px;   
      }
        /* styling drop down menu*/
        .chagua select{
	height: 35px;
    font-size: 18px;
    margin-bottom: 40px;
    padding: 5px;
    width: 327px;
    background: darkgrey;
}
/* drop down option for services and styling it  */
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
<!--navigation-->
    <?php 
    //connection to db
    include '../include/connection.inc.php';
    
    //select data using sql statement   
    $query = "SELECT * FROM county_receipts";

//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $customer_county_receipts= mysqli_query($conn,$query) or die(mysqli_error($conn));

      //return number of rows in a result set
    $num=mysqli_num_rows($customer_county_receipts);
    ?>

<div class="container">
	<h1>Payment filter by County</h1> <br>

  <BR> <BR> <BR>

<!-- Form to filter by county. Form Data sent to admin.payments.county.date.php upon clicking filter-->
<form action="admin.payments.county.date.php" method="POST" ><br><br>
<div class=service>
    <p>Filter By Location:</p>
    <div class="chagua">
 <select name="county_filter">
<option value=""> Select a filter option</option>
 <option value=" Nairobi">Nairobi</option>
 <option value="Kajiado">Kajiado</option>
</select>
</div>
</form>
<!--  filter by county -->
           
        <div  style="width: 18%; float:left; margin-left:10px; font-size:18px">
                  START DATE: 
     </div>
     <input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

     <div   style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
     </div>
     <input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">
                     
  <button type="submit" name="filter_county_receipts" style="width: 10%; height:5%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate
                        </button> <br>
   
            </div>  
            </form>
            <br>

<table id="customers"> 
                        <tr>
                        <th>S.No#</th>
                        <th>Reference Number</th>
                        <th>Receipt Date</th>
                        <th> First Name</th>
                        <th> Last Name</th>
                        <th> Service Name</th>
                        <th>County</th>
                        <th>Town</th>
                        <th>Roadname</th>
                        <th>Estate/Building Name</th>
                        <th>Room/House Number</th>
						            <th>Amount</th>
                        <th> Mode of payment</th>

                        </tr>
                       <?php include '../include/connection.inc.php';
                       //select data using sql statement data
                       $query = "SELECT * FROM county_receipts ";
                        //open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                       //return number of rows in a result set
                       $count = mysqli_num_rows($qry);
//declaring incremental variable
 $i = 0;
 // While condition is true,it will output the following:
                       while($row=mysqli_fetch_assoc($qry))
                       {
                       ?>
                        <tr>
                      <!-- variable to increment by one -->
                        <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['reference_number'];?> </td>
                        <td><?php echo $row['receipts_date'];?> </td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?></td>
                        <td><?php echo $row['payment_description'];?></td>
                        <td><?php echo $row['county'];?></td>
                        <td><?php echo $row['town'];?></td>
                        <td><?php echo $row['roadname'];?></td>
                        <td><?php echo $row['apartments'];?></td>
                        <td><?php echo $row['house_number'];?></td>
                        <td><?php echo $row['amount'];?></td>           
                        <td><?php echo $row['payment_mode'];?> </td>
                      
                        </tr>
                        <?php 
                       }
                    
                        ?>

                        
                </table>
                      </div>

</body>
</html>

