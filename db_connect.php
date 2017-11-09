<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "FoodOrdering";

//create connection
	$dbconnect = new mysqli($servername,$username,$password,$dbname) or die(mysql_error());

?>
