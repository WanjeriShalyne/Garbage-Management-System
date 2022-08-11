<?php
// start session and include connection
        include '../include/session.php';
        include '../include/connection.inc.php';
?>
 <html>

<head>
    <title>View Staff Members</title>
    <link rel="stylesheet"  href="dashboard.admin.css">

    <style>

/* styling the statement filter by */
      .container{
        margin-top: 20px;
        font-size:18px;
        text-align:center; /*position: */;
      }
/* styling the statement filter by */

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
	<h1> Staff Members </h1> <br>

<!-- form data sent to dashboard.admin.staff.date.php -->
<form name = "RegisterForm" action="dashboard.admin.staff.date.php" method="POST" onsubmit="return Validate()"><br><br>
           
        <div class="tarehe"  style="width: 18%; float:left; margin-left:10px; font-size:18px">
                  START DATE: 
     </div>
     <input name="startdate" id="StartDate" type="date" style="width: 18%; float:left; font-size:18px">

     <div class="tarehe"  style="width: 18%; float:left; margin-left:50px; font-size:18px">
    END DATE:
     </div>
     <input name="enddate" id="EndDate" type="date" style="width: 18%; float:left; margin-left:50px; font-size:18px;
     margin-bottom:20px;">
     

  <button type="submit" name="admin_staff_date" style="width: 10%; height:5%; font-size:18px;float:right;
  margin-right:50px;">
                            Generate
                        </button> <br>
   
            </div>  
            </form>
            <br>

<table  id="customers"> 
                        <tr>
                        <th>S.No#</th>
                        <th>National ID Number</th>
                        <th> First Name</th>
                        <th> Middle Name</th>
                        <th> Surname</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Staff Number</th>
                        <th> Staff Role</th>
                        <th>Start Workdate </th>

                        </tr>
                       <?php include('../include/connection.inc.php');
                       $query = "SELECT * FROM staff ";
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
                        <td><?php echo $row['id_number'];?></td>
                        <td><?php echo $row['first_name'];?></td>
                        <td><?php echo $row['middle_name'];?></td>
                        <td><?php echo $row['surname'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['mobile_number'];?> </td>
                        <td><?php echo $row['staff_number'];?> </td>
                        <td><?php echo $row['staffrole'];?> </td>
                        <td><?php echo $row['start_work_date'];?> </td>
                        </tr>
                        <?php 
                       }
                    
                        ?>
   
                </table>

</div>
</body>
</html>



  