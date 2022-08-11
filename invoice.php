<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>
<body>
    <form method="POST" action="include/invoice.inc.php">
    <label for="fname">First name:</label>
  <input type="text" id="fname" name="fname"><br><br>

  <label for="lname">Last name:</label>
  <input type="text" id="lname" name="lname"><br><br>
 

  <label for="estate">Estate/Apartments/Court:</label>
  <input type="text" id="estate" name="estate"><br><br>

  <label for="town">Town:</label>
  <input type="text" id="town" name="town"><br><br>

  <label for="county">County:</label>
  <input type="text" id="county" name="county"><br><br>

  <label for="housenumber">House number/Room Number:</label>
  <input type="text" id="housenumber" name="housenumber"><br><br>

  <label for="invoicedate">Invoice Date:</label>
  <input type="date" id="invoicedate" name="invoicedate"><br><br>

  <label for="invoicenumber">Invoice Number:</label>
  <input type="number" id="invoicenumber" name="invoicenumber"><br><br>

  <label for="services " >Services</label><br>
		 <div class="chagua">
		<select name="services">
		 <option value="commercial"> Commercial Collection</option>
		<option value="residential"> Residential Collection</option>
		<option value="debris"> Construction & demolition debris</option><br>
		</select>
		</div>

  <label for="amount">Amount:</label>
  <input type="number" id="amount" name="amount"><br><br>

  <button input="submit" id="btn" name="submit">SUBMIT</button>

    </form>
</body>
</html>