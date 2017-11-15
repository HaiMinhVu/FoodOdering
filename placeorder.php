<?php
  include_once "db_connect.php";
  $selectedproduct;
  $selectedtype;
  $selectedquantity;

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
     	<td>Select Product</td>
        <td><select name="protype", id="protype">
          <option>Select ...</option>
          	<?php
             $respro = $dbconnect->query("SELECT DISTINCT Pro_Type FROM product");
            while ($row = mysqli_fetch_array($respro)) {
          	?>
            <option value="<?php echo $row['Pro_Type']?>"><?php echo $row['Pro_Type'];?></option>
          <?php
            }
          ?>
        </select></td>
        <input type="submit" value="Confirm Product" name="addorder"><br><br>
    	<script type="text/javascript">
    		document.getElementById('protype').value = "<?php echo $_POST['protype']?>";
    	</script>
    
<?php
if (isset($_POST['addorder']) == "Confirm Product") {
    	$selectedproduct = $_POST['protype'];
    	
	}
?>
  	
    	<td>Select Type</td>
    	<td><select name="typeopt" id="typeopt">
     	<option>Select ...</option>
			<?php
			$restype = $dbconnect->query("SELECT Type_Opt FROM $selectedproduct");
		    while($row = mysqli_fetch_array($restype)){
			?>
			 <option value="<?php echo $row['Type_Opt']?>"><?php echo $row['Type_Opt']?></option>
			<?php  
			} 
			?>
    	</select></td>
    <input type="submit" value="Confirm Type" name="addorder"><br><br>
    <script type="text/javascript">
    		document.getElementById('typeopt').value = "<?php echo $_POST['typeopt']?>";
    </script>
	
<?php
	
	if (isset($_POST['addorder']) == "Confirm Type") {
    	$selectedtype = $_POST['typeopt'];
	}
?>
	<td>Quantity </td>
    <input type="number" name="quantity"><br><br>
    <input type="submit" value="Add to Cart" name="addorder"><br><br>

  	</form>
  </p>
<?php	
 	
 	if(isset($_POST['addorder']) == "Add to Cart"){
 		$selectedquantity = $_POST['quantity'];
 		$price = $dbconnect->query("SELECT Price FROM product WHERE Pro_ID = (SELECT Pro_ID FROM $selectedproduct WHERE Type_Opt = '$selectedtype')");
 		if($price){
 			echo $price;
 		}
 		
 		
 		$dbconnect->query("INSERT INTO cart VALUES('$selectedproduct', '$selectedtype', $selectedquantity)");
 	}
 	
 ?>
</div>
<div name="temp_order" class="column">

	<h1>Your Cart</h1>
	<table>
		<tr>
			<th>Product</th>
			<th>Type</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
<?php
		$result = $dbconnect->query("SELECT * FROM cart");

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
