<?php
	include_once "db_connect.php"

?>


<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>
<body style="background-color: lightblue">
<h1 style="text-align: center;padding-top: 50px">Add New Customer</h1>
<p>

	<form action="" method="POST">
		<div>
			<h3 style="margin-left: 518px">Name:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getname" required><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 500px">Address:
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
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getemail" required><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 485px">Username:
				<input style="font-size: 15px;height: 20px;width: 200px" type="text" value ="" name="getusername" required><br>
			</h3>
		</div>
		<div>
			<h3 style="margin-left: 489px">Password:
				<input style="font-size: 15px;height: 20px;width: 200px" type="password" value ="" name="getpassword" required><br>
			</h3>
		</div>

		<div style="text-align: center;">
  			<input style="font-size: 30px; width: 80px;height: 40px" type="submit" name="addcustomer" value = "Add">

  		</div>
		
	</form>
	<form action="" method="POST">
		<div style="text-align: center;">
			<input style="font-size: 30px; width: 80px;height: 40px" type="submit" name="cancel" value = "Cancel">
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

	if($dbconnect->query($sqlinsert)){
		echo "Add Successfully";
	}
	else{
		echo "Cannot Add Customer<br>";
		echo $dbconnect->error;
	}

	
}
if(isset($_POST['cancel'])){
    header("Location: index.php");
  }


?>

</body>

</html>
