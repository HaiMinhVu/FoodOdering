<?php
	$servername = "localhost";
	$username = "root";
	$password = "mysql";
	$dbname = "FoodorderingFinal";

//create connection
	$dbconnect = mysqli_connect($servername,$username,$password,$dbname);
	if(mysqli_connect_errno()){
		echo "Failed to connect: ".mysqli_connect_errno();
	}

?>