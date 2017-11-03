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
<h1 style="text-align: center;padding-top: 50px">Add New Customer</h1>
<p>
	<form action="" method="POST">
		<div>
			<h3 style="margin-left: 518px">Name:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getname"><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 501px">Address:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getaddress"><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 516px">Phone:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getphone"><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 518px">Email:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getemail"><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 485px">Username:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getusername"><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 489px">Password:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getpassword"><br>
			</h3>
		</div>

		<div style="margin-left: 550px">
  			<input style="font-size: 30px; width: 80px;height: 40px" type="submit" name="addcustomer" value = "Add"></button>
  			<input style="font-size: 30px; width: 80px;height: 40px" type="submit" name="cancel" value ="Cancel"></button>
  		</div>
		
	</form>
</p>

<?php
if(isset($_POST['addcustomer'])){
	$name = $_POST['getname'];
	$phone = $_POST['getphone'];
	$email = $_POST['getemail'];
	$address = $_POST['getaddress'];
	$username = $_POST['getusername'];
	$password = $_POST['getpassword'];

	$sqlinsert = "INSERT INTO customer (Name,Address,Phone,Email,Username,Password,CreatedDate) VALUES ('".$name."','".$address."','".$phone."','".$email."','".$username."','".$password."',NOW())";
	$dbconnect->query($sqlinsert);

}
?>

</body>

</html>
