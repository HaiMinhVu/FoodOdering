<?php
include_once "db_connect.php";
session_start();

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
    <input type="submit" name="cancel" value="Return to Orders">
</form>
</p>


<?php

if(isset($_POST['cancel'])){
    header("Location: orders.php");
}

?>


<div name="DataBase" class="column">
    <h1>Your Order</h1>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php
        $orderID = $_SESSION["OrdID"];
        $cartQuery = $dbconnect->query("SELECT * FROM ITEMS WHERE Order_ID = '$orderID'");
        $cartQuery = $dbconnect->query("SELECT Description, Price, ITEMS.Quantity, (Price*ITEMS.Quantity) FROM ITEMS JOIN PRODUCT ON ITEMS.Product_ID=PRODUCT.Pro_ID WHERE Order_ID = '$orderID' ");

        while($row = $cartQuery->fetch_assoc()){
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