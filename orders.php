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
    Enter ID number to be deleted<br>
    <input type="text" placeholder="Order#"  name="Order_id">
    <input type="submit" name="vieworder" value="View Order" <br>
    <input type="submit" name="payOrder" value="Make Payment">
    Select Payment Type
    <select name="PayType">
        <option>Payment Type</option>
        <?php
        $payTypeQuery = $dbconnect->query("SELECT DISTINCT Pay_type FROM PAY_TYPE");
        while ($row = mysqli_fetch_array($payTypeQuery)) {
            ?>
            <option value="<?php echo $row['Pay_type']?>"><?php echo $row['Pay_type'];?></option>
            <?php
        }
        ?>
    </select><br>
    <input type="submit" name="deleteOrder" value="Cancel Order">
    <input type="submit" name="cancel" value="Return to Homepage">
</form>
</p>

<?php
if(isset($_POST['vieworder'])){
    $Order_id = $_POST['Order_id'];
    $_SESSION["OrdID"] = $Order_id;
    header("Location: viewcart.php");

}
if(isset($_POST['deleteOrder'])){
    $Order_id = $_POST['Order_id'];
    $status = $dbconnect->query("SELECT Pay_status FROM ORDERS WHERE Order_ID = '$Order_id'")->fetch_array();
    if($status['Pay_status'] == 0){
        //Put the items back in stock
        $itemAmounts = $dbconnect->query("SELECT Product_ID, Quantity from ITEMS WHERE Order_ID='$Order_id'");
        while ($item=$itemAmounts->fetch_assoc()){
            $currentItemAmount = $item['Quantity'];
            $currentItemID = $item['Product_ID'];
            $dbconnect->query("UPDATE PRODUCT SET Quantity=Quantity+'$currentItemAmount' WHERE Pro_ID='$currentItemID'");
        }
        $deleteQuery = $dbconnect->query("DELETE FROM ORDERS WHERE Order_ID = '$Order_id'");
    }else{
        echo "Order has already been completed.";
    }
}
if(isset($_POST['payOrder'])){
    $payType = $_POST['PayType'];
    $Order_id = $_POST['Order_id'];
    $status = $dbconnect->query("SELECT Pay_status FROM ORDERS WHERE Order_ID = '$Order_id'")->fetch_array();
    if($status['Pay_status'] == 0){
        $dbconnect->query("UPDATE ORDERS SET Pay_status='1', Pay_type='$payType' WHERE Order_ID = '$Order_id'");
    }else{
        echo "Order has already been completed.";
    }

}
if(isset($_POST['cancel'])){
    header("Location: index.php");
}

?>


<div name="DataBase" class="column">
    <h1>Your Orders</h1>
    <table>
        <tr>
            <th>Order#</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Payment Type</th>
        </tr>
        <?php
        $cusID = $_SESSION["cusID"];
        $result = $dbconnect->query("SELECT Order_ID, Date, Total_price, Pay_status, Pay_type FROM ORDERS WHERE Customer_ID = '$cusID'");

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