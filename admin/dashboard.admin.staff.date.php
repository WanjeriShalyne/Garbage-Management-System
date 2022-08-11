<?php
// start session and connection
 include '../include/session.php';
 include '../include/connection.inc.php';
?>

 <html>
 <head>
 
    <title>View Staff Members by Date</title>
    <link rel="stylesheet"  href="dashboard.admin.css">
 
        <style>
   
 /* styling the statement filter by */
 .container{
         margin-top: 20px;
         font-size:18px;
         text-align:center; /*position: */;
       }
 /* styling the statement filter by */
 
    .tarehe{
          text-align: center;
          font-weight: bold;
          font-size: 18px;
      }
   
      </style>
 </head>
 
 <body>
<!--navigation-->
<?php include "menu.admin.php";?>
    <!--navigation-->
    
    <div class="side_menu">
   
        <h3><a href="dashboard.admin.staff.php">List of Staff Members </a></h3> <br>
        <h3><a href="dashboard.admin.staff.create.php">Register Staff </a></h3> <br>
</div>

<div class="main_dashboard">
<div class="container">
	<h1> Staff Members Start Work Date</h1> <br>
    
<?php
// admin_staff_date,name of GENERATE button
 //if(isset($_POST['admin_staff_date'])){
  // startdate, input name from dashboard.admin.staff.php
     $startdate = $_POST['startdate'];
     $enddate = $_POST['enddate'];

      //select data using sql statement data btwn specified dates
    $query ="SELECT * FROM staff WHERE start_work_date BETWEEN '$startdate' AND '$enddate' ";
//open new connection to mysql server
//querying the sql and calling for db connection else exit execution of query and display a connection error
    $qry = mysqli_query($conn, $query) or die(mysqli_error($conn));
  //return number of rows in a result set
    $count= mysqli_num_rows($qry);
    
    
  ?>
  <div class="tarehe">
   <?php echo $startdate ."   and   ".$enddate; ?>
  </div>
  <br>
<table  id="customers"> 
                        <tr>
                          <th>S.No#</th>
                         <th>Staff Number</th>
                        <th> First Name</th>
                        <th> Middle Name</th>
                        <th> Surname</th>
                        <th> Email</th>
                        <th>Mobile Number</th>
                        <th>Start Work Date</th>

                        </tr>
    <?php
    //declaring incremental variable
    $i = 0;
    while($row=mysqli_fetch_assoc($qry)){
        ?>

                         <tr>
                           <!-- variable to increment by one -->
                        <td><?php echo $i =$i+1;?></td>
                        <td><?php echo $row['staff_number'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['middle_name'];?></td>
                        <td><?php echo $row['surname'];?></td>
                        <td><?php echo $row['email'];?> </td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['start_work_date'];?> </td>
                      
                        </tr>
        <?php
    }
    ?>
    </table>
    <?php
 //}

?>
</div>
</body>
</html>