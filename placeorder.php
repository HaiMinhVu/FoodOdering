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
<form action="" method="POST">
  <select name="addProduct">
    <option value="">Select...</option>

    <optgroup label="Appetizer" name="appetizer">
      <option name="eggdrop">Egg Drop Soup</option>
      <option name="hotsoursoup">Hot & Sour Soup</option>
      <option name="wontonsoup">Wonton Soup</option>
    </optgroup>

    <optgroup label="Salad" name="salad">
      <option name="ranch">Ranch</option>
      <option name="bluecheese">Bluecheese</option>
      <option name="garlic">Garlic</option>    
    </optgroup>
    
    <optgroup label="Beverage" name="beverage">
      <option name="pepsi">Pepsi</option>  
      <option name="drpeper">Dr Peper</option> 
      <option name="srpite">Sprite</option> 
      <option name="coke">Coke</option>     
    </optgroup>

    <optgroup label="MainDish" name="maindish">
      <option name="rice">Rice</option>  
      <option name="noodle">noodle</option>    
    </optgroup>

    <optgroup label="Dessert" name="dessert">
      <option name="vanilaIC">Vanila Icecream</option>   
      <option name="chocolate">Chocolate Icecream</option>
      <option name="matcha">Matcha Icecream</option>   
    </optgroup>
    
  </select>
  
  <input type="text" name="quanlity" placeholder="Quanlity"><br>
  <input type="submit" name="placeorder" value="Place Order">
  <input type="submit" name="cancel" value="Cancel">


</form>
<?php
  if(isset($_POST['placeorder'])){

  }
  if(isset($_POST['cancel'])){
    header("Location: index.php");
  }


?>


</p>
</body>
</html>

