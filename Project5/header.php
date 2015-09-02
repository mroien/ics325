<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 7:42 PM
 */
session_start();

// SETTING USERNAME AND USER_ID SESSION AND VARIABLE

require('connect.php');

if (isset($_REQUEST['prod_name'])) {
    $prod_name = $_REQUEST['prod_name'];
}

// From select quantity
if (isset($_REQUEST['quantity'])) {
    $quantity = $_REQUEST['quantity'];
}
if (isset($_REQUEST['cart_id'])) {
    $cart_id = $_REQUEST['cart_id'];
}
if (isset($_REQUEST['catName'])) {
    $catName = $_REQUEST['catName'];
}
if (isset($_REQUEST['add_id'])) {
    $add_id = $_REQUEST['add_id'];
}
if (isset($_REQUEST['cc_id'])) {
    $cc_id = $_REQUEST['cc_id'];
}
?>
<html>
<head>

<title>Android Store v.5</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="icon" href="images/noogler.jpg">
</head>
<body>
<?php
if (isset($_SESSION["username"])) {
    $username = $_SESSION['username'];
    echo "Welcome, " . $_SESSION['username'];


    $sql = $connection->query("SELECT user_id FROM users WHERE username='$username'");
    $rowHead = $sql->fetch_assoc();
    $user_id = $rowHead['user_id'];


// adding the total number of items in the quantity column
    $sql = $connection->query("SELECT SUM(quantity) AS quantity_tot FROM cart WHERE user_id='$user_id'");
    $rowTot = $sql->fetch_assoc();
    $qtySum = $rowTot['quantity_tot'];

// adding the total number of items in the total column
    $sql = $connection->query("SELECT SUM(total) AS total FROM cart WHERE user_id='$user_id'");
    $rowTotal = $sql->fetch_assoc();
    $subTotal = $rowTotal['total'];

    // setting session variables
    if (isset($qtySum)) {
        $_SESSION['qtySum'] = $qtySum;
        // echo "Quantity= " . $qtySum . "<br />";
    }
    if (isset($subTotal)) {
        $_SESSION['subTotal'] = $subTotal;
        // echo "Total= " . $subTotal;
    }
}
?>
<img class="poster" src="images/androidposter.jpg"/>
<a href="index.php" class="header">
    <h1 class="header">Android Store</h1>
</a>
<table class="totals">
    <tbody>
    <tr>
        <td>
            <?php if (isset($_SESSION['username'])) {
                echo "Total Items = " . $_SESSION['qtySum'] . " <br />
                        Total Price = " . $_SESSION['grandTotal'] . " <br />
                        <a href='cart.php'>View Cart</a>
                        <a class='logout' href='killsession.php'> Logout</a >";
            } ?>

        </td>
    </tr>
    <tr>
        <td>
            <a href="viewOrderDetails.php?order_id=8">Dets</a>
            <a href="viewAllOrders.php">ALL</a>
        </td>
    </tr>


    </tbody>
</table>

<hr/>
