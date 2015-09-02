<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/19/2015
 * Time: 12:58 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: login.php");
}
$cart_id = $_GET['cartID'];

$sql = $connection->query("SELECT * FROM cart WHERE cart_id='$cart_id'");
$row = $sql->fetch_assoc();

$user_id = $row['user_id'];
$username = $row['username'];
$prod_id = $row['prod_id'];
$prod_name = $row['prod_name'];
// quantity wanted
$updatedQuantity = $_GET['updatedQuantity'];
$inv = $row['inv'];
$price = $row['price'];
$total = $updatedQuantity * $price;
// remaining quantity
$new_qty = $inv - $updatedQuantity;
//echo $_GET['updatedQuantity'];
//echo $_GET['cart_id'];

$update = "UPDATE cart SET quantity='$updatedQuantity' WHERE cart_id='$cart_id'";

if (mysqli_query($connection, $update)) {
    echo "Record updated successfully";
    // header("Location: cart.php");
} else {
    echo "Error updating record: " . mysqli_errno($connection);
}
$updateProd = "UPDATE product SET quantity='$new_qty' WHERE prod_id='$prod_id'";

if (mysqli_query($connection, $updateProd)) {
    echo "Record 2 updated successfully";
    header("Location: cart.php");
} else {
    echo "Error updating record: " . mysqli_errno($connection);
}
?>
<html>
<body>
<h1><?php echo "Cart ID " . $cart_id . "<br />" . "Qty " . $updatedQuantity ?></h1>
</body>
</html>