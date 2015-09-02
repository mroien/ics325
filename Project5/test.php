<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/21/2015
 * Time: 12:23 AM
 */
require('header.php');
require('leftNav.php');
require('connect.php');
// session then variable
$sql = $connection->query("SELECT * FROM orders WHERE user_id='$user_id'");
while ($row = $sql->fetch_assoc()) {
    $order_id = $row['order_id'];
    $_SESSION['order_id'] = $order_id;
    $con = $row['confirm_id'];
    $add_id = $row['add_id'];
    $_SESSION['add_id'] = $row['add_id'];
    $cc_id = $row['cc_id'];
    $cart_id = $row['cart_id'];
    $_SESSION['cart_id'] = $row['cart_id'];
}
echo "<p>";

echo "Username: " . $_SESSION['username'] . "<br/>"; //set in header
echo "Grand Total: " . $_SESSION['grandTotal'] . "<br/>"; // set in cart
echo "User ID: " . $user_id . "<br/>"; // set in header
echo "Add ID: " . $_SESSION['add_id'] . "<br/>";
echo "Cart ID: " . $_SESSION['cart_id'] . "<br/>";
echo "Credit Card ID: " . $_SESSION['cc_id'] . "<br/>";
echo "Order ID: " . $_SESSION['order_id'] . "<br/>";
echo "Prod Name: " . $prod_name . "<br/>";
echo "Quantity: " . $_REQUEST['quantity'];

echo "</p>";


