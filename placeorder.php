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
     	<td>Select Product</td>
        <td><select name="protype", id="protype">
          <option>Select ...</option>
          	<?php
             $respro = $dbconnect->query("SELECT DISTINCT Type FROM product");
            while ($row = mysqli_fetch_array($respro)) {
          	?>
            <option value="<?php echo $row['Type']?>"><?php echo $row['Type'];?></option>
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
			$restype = $dbconnect->query("SELECT Description FROM product WHERE Type = '$selectedproduct'");
		    while($row = mysqli_fetch_array($restype)){
			?>
			 <option value="<?php echo $row['Description']?>"><?php echo $row['Description']?></option>
			<?php  
			} 
			?>
    	</select></td>
    <input type="submit" value="Confirm Type" name="addorder"><br><br>
    <script type="text/javascript">
    	document.getElementById('typeopt').value = "<?php echo $_POST['typeopt']?>";
    </script>
	<td>Quantity </td>
    <input type="number" name="quantity"><br><br>
    <input type="submit" value="Add to Cart" name="addorder"><br><br>
	<script type="text/javascript">
    	document.getElementById('quantity').value = "<?php echo $_POST['quantity']?>";
    </script>
  	</form>
  </p>
<?php

    if (isset($_POST['addorder']) == "Confirm Type") {
    $selectedtype = $_POST['typeopt'];
    $price;
    $priceQuery = $dbconnect->query("SELECT Price FROM product WHERE Type = '".$selectedproduct."' AND Description = '".$selectedtype."'");
    while ($row = $priceQuery->fetch_assoc()) {
    $price = (double)$row['Price'];
    }
    }
    if(isset($_POST['addorder']) == "Add to Cart") {
        $selectedquantity = $_POST['quantity'];

        /*********** CHECK IF ENOUGH QUANTITY IN DATABASE
         *
         * $available = $dbconnect->query("SELECT Available_Qty FROM product WHERE Pro_Type = '$selectedproduct' AND Description = '$selectedtype'");
         * $availablequantity = mysqli_fetch_array($available);
         *
         * if($availablequantity > $selectedquantity){
         * $dbconnect->query("INSERT INTO cart VALUES('$selectedproduct', '$selectedtype', $selectedquantity, $selectedquantity*$price)");
         * }
         * else{
         * echo "<script>alert('Not enough product');</script>";
         * }****************/
        $value = $dbconnect->query("SELECT Quantity FROM PRODUCT WHERE Description = '$selectedtype'");
        $currentQuantity = $value->fetch_array();
        $currentQuantity = $currentQuantity["Quantity"];
        if ($currentQuantity >= $selectedquantity) {

            $dbconnect->query("INSERT INTO cart VALUES('$selectedproduct', '$selectedtype', $selectedquantity, $selectedquantity*$price)");
        }else{
            echo "Not Enough in stock, only $currentQuantity left.";
        }
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
    Total:
    <?php
    $total = $dbconnect->query("SELECT SUM(Price) as total FROM cart");
    while ($row = $total->fetch_assoc()) {
        echo $row['total'];
        $finaltotal = $row['total'];
    }
    ?>


    <p>
    <form action="" method="POST">
        <input type="submit" value="Place Order" name="placeorder">
        <input type="submit" value="Cancel Order" name="cancel">

    </form>


    </p>

</div>
<?php
$cusID = $_SESSION["cusID"];
if(isset($_POST['placeorder'])){

    $dbconnect->query("INSERT INTO orders VALUES(null, $cusID, NOW(), $finaltotal, 0, null)");
    //First subtact all quantities
    $result = $dbconnect->query("SELECT * FROM cart");
    //Fetch most recent order
    $currentOrderNumber = $dbconnect->query("SELECT Order_ID FROM ORDERS WHERE Customer_ID = $cusID ORDER BY Date DESC LIMIT 1")->fetch_assoc()[Order_ID];
    while($row = $result->fetch_assoc()){
        $currentItem = $row['TypeOpt'];
        $currentInfo = $dbconnect->query("SELECT * FROM Product WHERE Description = '$currentItem'")->fetch_array();
        $currentQuantity = $currentInfo['Quantity'];
        $itemQuantity = $row['Quantity'];
        $currentProID = $currentInfo['Pro_ID'];
        $newQuantity = $currentQuantity - $itemQuantity;
        $dbconnect->query("UPDATE Product SET Quantity= '$newQuantity' WHERE Pro_ID= '$currentProID'");
        $dbconnect->query("INSERT INTO ITEMS VALUES('$currentOrderNumber', 'NULL', '$currentProID', '$itemQuantity')");


    }

    $dbconnect->query("DELETE FROM cart");
    header("Location: orders.php");
}
if(isset($_POST['cancel'])){
    $dbconnect->query("DELETE FROM cart");
    header("location:index.php");
}
?>




</body>

</html>
