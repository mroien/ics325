<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/16/2015
 * Time: 10:17 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: login.php");
}
?>
    <html>
    <body>
    <h2>
        Administrator Interface Page
    </h2>
    <a href="viewAll.php">View All Users</a><br/>
    <a href="addCategory.php">Add Category</a><br/>
    <a href="addProduct.php">Add Product</a><br/>
    <a href="viewCategory.php">View Categories</a><br/>
    <a href="viewAllProducts.php">View All Products</a><br/>

    </body>
    </html>
<?php require('footer.php') ?>