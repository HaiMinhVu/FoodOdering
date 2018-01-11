<?php
include_once "db_connect.php";
?>

<!DOCTYPE html>
<html>
<body style="background-color: lightblue">

<style>
    table {border-collapse: collapse; width: 100%;}
    table, th, td{border: 1px solid black; height: 25px; text-align: center;}
    table, p{font-size: 17px;}
    .column {float: left; width: 50%;}
    .row:after {content: ""; display: table; clear: both;}
</style>
<p>
    <form action="" method="POST">
    Enter Product Category to be deleted<br>
    <input type="text" placeholder="Enter Category"  name="DelCategory">
    <input type="submit" name="Delete" value="Delete Type" <br>
</form>
</p>

    <h1>Types</h1>
    <table>
        <tr>
            <th>Type</th>
        </tr>
        <?php
        $result = $dbconnect->query("SELECT * FROM PRODUCT_TYPE");

        while($row = $result->fetch_assoc()){
            echo "<tr>";

            $keys = array_keys($row);
            foreach($keys as $key) {
                echo "<td>" . $row[$key] . "</td>";
            }

            echo "</tr>";
        }
        ?>
    </table>

<p>
<form action="" method="POST">
    <br><br>Modify Product:<br>
    <input type="text" placeholder="Enter Product#"  name="ModProduct" required><br>
    Delete product:
    <input type="submit" name="DelProduct" value="Delete"><br><br>
    Change Product Type:
    <select name="ProductType">
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
    <br>
    <br>Change Description:<br>
    <textarea class="FormElement" name="Description"  id="NewDescription" cols ="40" rows="4"></textarea><br>
    <br>
    Change Price:
    <input type="text" placeholder="Price" name="NewPrice"><br>
    <br>
    Change Quantity
    <input type="text" placeholder="Quantity" name="NewQuantity"><br>
    <input type="submit" name="MakeChanges" value="Update Product"><br>
</form>
</form>
<form action="" method="POST">
    <input type="submit" name="cancel" value = "Return to Main Page">
</form>
</p>

<?php
if(isset($_POST['Delete'])){
    $delType = $_POST['DelCategory'];
    $delType = strtoupper($delType);
    $dbconnect->query("DELETE FROM FoodorderingFinal.PRODUCT_TYPE WHERE TYPE ='$delType'");
    header("Refresh:0");

}
if(isset($_POST['DelProduct'])){
    $productID = $_POST['ModProduct'];
    $dbconnect->query("DELETE FROM PRODUCT WHERE Pro_ID ='$productID'");

}
if(isset($_POST['MakeChanges'])){
    $productID = $_POST['ModProduct'];
    if($_POST['ProductType'] != ""){
        $productType = $_POST['ProductType'];
        $dbconnect->query("UPDATE PRODUCT SET TYPE='$productType' WHERE Pro_ID='$productID'");

    }
    if(isset($_POST['Description'])){
        $productDescription = $_POST['Description'];
        $dbconnect->query("UPDATE PRODUCT SET Description='$productDescription' WHERE Pro_ID='$productID'");
    }
    if(isset($_POST['NewPrice'])){
        $productPrice = $_POST['NewPrice'];
        $dbconnect->query("UPDATE PRODUCT SET Price='$productPrice' WHERE Pro_ID='$productID'");
    }
    if(isset($_POST['NewQuantity'])){
        $productQuantity = $_POST['NewQuantity'];
        $dbconnect->query("UPDATE PRODUCT SET Quantity='$productQuantity' WHERE Pro_ID='$productID'");


    }

}
if(isset($_POST['cancel'])){
    header("Location: index.php");
}

?>


<div name="DataBase" class="column">
    <h1>Products</h1>
    <table>
        <tr>
            <th>Product#</th>
            <th>Type</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        <?php
        $result = $dbconnect->query("SELECT Pro_ID, Type, Description, Price, Quantity FROM PRODUCT");

        while($row = $result->fetch_assoc()){
            echo "<tr>";

            $keys = array_keys($row);
            foreach($keys as $key) {
                echo "<td>" . $row[$key] . "</td>";
            }

            echo "</tr>";
        }
        ?>
    </table>
</div>


</body>
</html>