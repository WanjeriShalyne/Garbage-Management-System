<?php
include_once "connection.inc.php";
if(isset($_POST['submit'])){
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$estate=$_POST['estate'];
$town=$_POST['town'];
$county=$_POST['county'];
$housenumber=$_POST['housenumber'];
$invoicedate=$_POST['invoicedate'];
$invoicenumber=$_POST['invoicenumber'];
$services=$_POST['services'];
$amount=$_POST['amount'] ??"";

$sql="insert into invoicestatement (first_name,last_name,
estate,town,county,house_number,invoice_date,invoice_number,service_description,amount)
values('$firstname','$lastname','$estate','$town','$county',
'$housenumber','$invoicedate','$invoicenumber','$services','$amount')";

$result=mysqli_query($conn,$sql);
}
else{
    echo"error";
}

?>
