<?php
include_once "db_connect.php";
session_start();
?>

<!DOCTYPE html>
<html>
<style>
table {border-collapse: collapse; width: 100%;}
table, th, td{border: 1px solid black; height: 25px; text-align: center;}
table, p{font-size: 17px;}
.column {float: left; width: 50%;}
.row:after {content: ""; display: table; clear: both;}
select, p{font-size: 15px;}
input, p{font-size: 15px;}
</style>

<body style="background-color: lightblue">
<div style="text-align: center; font-size: 17px">
  <p>
  	<form action="" method="POST">
  		Username:
  		<input type="text" name="username"><br>
  		Password:
  		<input type="Password" name="password"><br>
  		<input type="submit" name="login" value="Log In">
  		<input type="submit" name="cancel" value="Cancel">

  	</form>
  </p>

  <?php


  	if(isset($_POST['login'])){
  		$username = trim($_POST['username']);
  		$password = trim($_POST['password']);

  		$validateQuery = $dbconnect->query("SELECT ID_No FROM customer WHERE Username = '$username' AND Password = '$password'");
  		$row = mysqli_fetch_array($validateQuery);
  		$_SESSION["cusID"] = $row['ID_No'];
  		$numrow = mysqli_num_rows($validateQuery);
  		if($numrow == 1){
  			header('location:placeorder.php');
  		}
  		
  		else{
  			echo "wrong username or password";
  		}
  	}
  	if(isset($_POST['cancel'])){
  		header('location:index.php');
  	}

  ?>



</div>
</body>
</html>
