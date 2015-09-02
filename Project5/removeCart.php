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

$result = $connection->query("SELECT * FROM cart WHERE user_id='$user_id'");
$row = $result->fetch_assoc();
$cart_id = $row['cart_id'];
$user_id = $row['user_id'];
$username = $row['username'];
$prod_id = $row['prod_id'];
$prod_name = $row['prod_name'];
$quantity = $row['quantity'];
$inv = $row['inv'];
$price = $row['price'];
$total = $row['total'];

//  UPDATE PRODUCT INVENTORY BEFORE DELETING DATA
$new_qty = $inv + $quantity;
$update = "UPDATE product SET quantity='$new_qty' WHERE prod_id='$prod_id'";
if (mysqli_query($connection, $update)) {
    echo "Record updated successfully";
    //header("Refresh:1; url=http://localhost/project5/viewAll.php", true, 303);
} else {
    echo "Error updating record: " . mysqli_errno($connection);
}
$delete = "DELETE FROM cart WHERE cart_id='$cart_id'";
if (mysqli_query($connection, $delete)) {
    echo "Record updated successfully";
    //header("Refresh:1; url=http://localhost/project5/viewAll.php", true, 303);
} else {
    echo "Error updating record: " . mysqli_errno($connection);
}
header("Location: cart.php");


