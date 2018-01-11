<?php
	include_once "db_connect.php"

?>
<!DOCTYPE html>
<html>
<body style="background-color: lightblue">


<p>

<form action="" method="POST">
    Select Product Category or Add New<br><br>
    Add New Category<br>
    <input type="text" placeholder="New Category"  name="NewCategory">
    <input type="submit" name="NewType">
</form>

    <form action="" method="POST">
<br>Select Product Category
<select required name="ProductType">
    <option value="">Select Type...</option>
    <?php
    $respro = $dbconnect->query("SELECT Type FROM PRODUCT_TYPE");
    while ($row = mysqli_fetch_array($respro)) {
        ?>
        <option value="<?php echo $row['Type']?>"><?php echo $row['Type'];?></option>
        <?php
    }
    ?>
</select>

    <br>Enter Product Desciption<br>
    <textarea class="FormElement" name="Description"  id="NewDescription" cols ="40" rows="4" required></textarea><br>
    Enter Product Price<br>
    <input type="text" placeholder="Price" name="NewPrice" required><br>
    Enter Initial Quantity<br>
    <input type="text" placeholder="Quantity" name="NewQuantity" required><br><br>
    <input type="submit" name="enter" value="Add Product">
</form>
<form action="" method="POST">
    <input type="submit" name="cancel" value = "Return to Main Page">
</form>
</p>

<?php
if(isset($_POST['NewType'])){
    $newCat = $_POST['NewCategory'];
    $newCat = strtoupper($newCat);
    $dbconnect->query("INSERT INTO FoodorderingFinal.PRODUCT_TYPE (Type) VALUES ('$newCat')");
    header("Refresh:0");


}
if(isset($_POST['enter'])){
    $newProductType = $_POST['ProductType'];
    $newDesc = $_POST['Description'];
    $newPrice = $_POST['NewPrice'];
    $newQuantity = $_POST['NewQuantity'];
    $dbconnect->query("INSERT INTO FoodorderingFinal.PRODUCT (Pro_ID, Type, Description, Image, Price, Quantity) VALUES (NULL,'$newProductType', '$newDesc', NULL, '$newPrice', '$newQuantity')");
    echo "Added New Product: $newDesc.";

}

if(isset($_POST['cancel'])){
    header("Location: index.php");
}

?>

</body>
</html>

