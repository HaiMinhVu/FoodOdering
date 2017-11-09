<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "FoodOrdering";

//create connection
	$dbconnect = new mysqli($servername,$username,$password,$dbname) or die(mysql_error());

?>
<!DOCTYPE html>
<html>
<body style="background-color: lightblue">


<p>
Select Product?
<select name="addProduct">
  <option value="">Select...</option>
  <option value="M">Appetizer</option>
  <option value="F">Salad</option>
  <option value="F">Beverage</option>
  <option value="F">MainDish</option>
  <option value="F">Desert</option>
</select>

</p>
</body>
</html>

