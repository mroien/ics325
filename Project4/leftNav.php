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
        /*
        <!--
       <li><a href="phones.php">Phones</a></li>
       <li><a href="tablets.php">Tablets</a></li>
       <li><a href="watches.php">Watches</a></li>
       <li><a href="accessories.php">Accessories</a></li>
          -->
    </ul>

    <!--
        <div class='viewAll'>
            <a href='viewAll.php'>View All Users</a><br/>
            <a href='adminPage.php'>Administrator Interface Page</a>
        </div>
    -->
        */
        if (isset($_SESSION['username'])) {
            if ($_SESSION['admin'] == 'yes') {
                echo "<p class='viewAll'>
                <a href='viewAll.php'>View All Users</a><br />
                <a href='adminPage.php'>Admin Interface Page</a><br />
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
