<?php
 include_once 'include/session.php';
include_once 'include/connection.inc.php';
?>

<!DOCTYPE html>
<head>

    <title> List of all Invoices</title>
    <link rel="stylesheet"  href="admin/dashboard.admin.css">

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


  </style>
</head>


<body>
<!--navigation-->
<?php include_once"menu.staff.php"; ?>
    <!--navigation-->

    
    <div class="container">
	<h1> Invoices</h1> <br>
<!-- <form action="admin.all.invoices.date.php" method="$_POST">
<button type="submit" style="width: 12%; height:10%; font-size:16px;float:right;margin-right:10px;">
                           FILTER BY MONTH </button> <br> <br>
 <button type="submit" style="width: 12%; height:10%; font-size:16px;float:right;margin-right:10px;">
                           FILTER BY YEAR </button> <br>
  
</div>
</form> -->


<form action="admin.all.invoices.date.php" name ="invoice_date" method="POST" onsubmit="return Validate()"><br><br>
           
        <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
                  START DATE: 
     </div>
     <input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

     <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
     </div>
     <input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">
     
<input name="invoice_date" id="service_code" type="text" value="<?php echo $invoice_date;?>" style="display:none;">
                
  <button type="submit" name="admin_invoices" style="width: 10%; height:10%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate
                        </button> <br>
   
            </div>  
            </form>
            <br> 

               
    <table class="active_sub_table" id="customers"> 
                        <tr>
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
                       <?php include('include/connection.inc.php');
                       $query = "SELECT * FROM invoice_cust_all ";
                       $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
                       $count = mysqli_num_rows($qry);
                       while($row=mysqli_fetch_assoc($qry))
                       {
                       ?>
                        <tr>
                        <td><?php echo $row['invoice_date'];?></td>
                        <td><?php echo $row['service_name'];?></td>
                        <td><?php echo $row['customer_firstname'];?></td>
                        <td><?php echo $row['customer_lastname'];?> </td>
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
                         <tr>
                        <td colspan=""></td>
                        <td><?php ?></td>
                        <td><?php ?></td>
                        <td><?php ?> </td>
                        <td>Totals Number invoices : <?php echo $count;?> </td>
                        </tr>
                        
                </table>


<!--  filter by service -->
</form>  
</body>

<script> 

    function Validate()
            { 

		        StartDate=document.RegisterForm.StartDate.value;				
                EndDate=document.RegisterForm.EndDate.value;


	if(StartDate==""){
            alert("Please select Start Date");
            document.getElementById("StartDate").focus();
            return false;
            } 
	if(EndDate==""){
            alert("Please select End Date");
            document.getElementById("EndDate").focus();
            return false;
            } 

            

         return; 
        }

</script> 

</html>