<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 7:33 PM
 */
session_start();
require('connect.php');

?>
<html>
<body>
<div class="leftNav">
    <a class="breadcrumb" href="index.php">Home</a>

    <p><a href="register.php" class="login">Register</a></p>

    <!-- Test for address -->
    <p><a href="address.php">Address</a></p>

    <p><a href="creditCard.php">Credit Card</a></p>

    <p><a href="login.php" class="login">Login</a></p>

    <h3 class="title">Categories</h3>
    <ul>
        <?php
        $result = $connection->query("SELECT cat_id, catName, description FROM category");
        while ($row = $result->fetch_assoc()) {
            $cat_id = $row['cat_id'];
            $catName = $row['catName'];
            $description = $row['description'];

            echo "
                    <div>
                        <a href=" . "viewProducts.php?catName=" . $catName . ">" . $catName . "<br />" . "
                        </a>
                    </div>";
        }
        if (isset($_SESSION['username'])) {
            echo "<a href='viewOrders.php'>View Orders</a><br/>";
        }
        if (isset($_SESSION['username'])) {
            if ($_SESSION['admin'] == 'yes') {
                echo "<p class='viewAll'>
                <a href='viewAll.php'>View All Users</a><br />
                <a href='adminPage.php'>Admin Interface Page</a><br />
                <a href='viewAllOrders.php'>View All Orders</a>
                </p><p>
                <a href='addCategory.php'>Add Category</a><br/>
                <a href='addProduct.php'>Add Product</a><br/>
                <a href='viewCategory.php'>View Categories</a><br/>
                <a href='viewAllProducts.php'>View All Products</a><br />
                </p>";
            }
        } ?>


</div>
</body>
</html>
