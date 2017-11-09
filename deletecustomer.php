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
	<form action="" method="POST">
		<input type="text" Placeholder="ID_NO"  name="cus_id"><br>
		<input type="submit" name="deletecus" value="Delete">
		<input type="submit" name="cancel" value="Cancel">
	</form>
</p>

<?php
	if(isset($_POST['deletecus'])){
		$cusid = $_POST['cus_id'];
		$deleteQuery = $dbconnect->query("DELETE FROM customer WHERE ID_No = '$cusid'");
	}
	if(isset($_POST['cancel'])){
	header("Location: index.php");
	}

?>


<div name="DataBase" class="column">
	<h1>List Customers</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Username</th>
			<th>Email</th>
			<th>Created_Date</th>
		</tr>
<?php
		$result = $dbconnect->query("SELECT ID_No, Name, Username, Email, CreatedDate FROM customer");

		while($row = $result->fetch_assoc()){
			echo "<tr>";

			$keys = array_keys($row);
			foreach($keys as $key){
				echo "<td>".$row[$key]."</td>";
			}

			echo "</tr>";
		}
?>
	</table>
</div>


</body>
</html>