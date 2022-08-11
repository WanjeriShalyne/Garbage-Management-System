<?php 
//start of session
include '../include/session.php';?>
<html>
<head>

    <title>Invoice Filter by County</title>
    <link rel="stylesheet"  href="../admin/dashboard.admin.css">

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

    <h3><a href="admin.all.invoices.php"> All Invoices</a></h3> <br>
		<h3><a href="admin.cust.invoices.service_filter.php">Invoices filter by service</a></h3> <br>
        <h3><a href="admin.cust.invoices.county_filter.php">Invoices filter by county</a></h3> <br>
        <h3><a href="admin.create.invoice.php">Create Invoice</a></h3> <br>
</div>
<div class="main_dashboard">


    <div class="container">
	<h1>Invoice filter by County</h1> <br>

<br> <br> <br>

<!-- Form to filter by services offered. Form Data sent to admin_invoices_county_date.php clicking filter-->
<form action="admin_invoices_county_date.php" method="POST" ><br><br>
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
           
        <div class="tarehe"  style="width: 18%; float:left; margin-left:10px; font-size:18px">
                  START DATE: 
     </div>
     <input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

     <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
     </div>
     <input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">
     
  <button type="submit" name="invoice_county" style="width: 10%; height:5%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate
                        </button> <br>
   
            </div>  
            </form>
            <br>
    <table  id="customers"> 
                          <tr>
                        <th>S.No#</th>
                        <th>Invoice Date</th>
                        <th>Service Name</th>
                        <th>Customer First Name</th>
                        <th>Customer Last Name</th>
                        <th>Amount </th>
                        <th> Mobile Number </th>
                        <th> County </th>
                        <th>Town </th>
                        <th>Roadname </th>
                        <th>Estate/Building Name </th>
                        <th>House/Room Number </th>
                        <th>Serviced by: </th>
                        </tr>
                       <?php include('../include/connection.inc.php');
                       $query = "SELECT * FROM invoice_cust_all ";
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
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
                        <td><?php echo $row['invoice_date'];?></td>
                        <td><?php echo $row['invoice_desc'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['last_name'];?> </td>
                        <td><?php echo $row['amount'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['county'];?> </td>
                        <td><?php echo $row['town'];?> </td>
                        <td><?php echo $row['roadname'];?> </td>
                        <td><?php echo $row['apartments'];?> </td>
                        <td><?php echo $row['house_number'];?> </td>
                        <td><?php echo $row['staff_firstname'];?> </td>
                        </tr>
                        <?php 
                       }
                    
                        ?>
             </table>
     </form>

<!--  filter by county -->
</form>
                      </div>  
</body>
</html>