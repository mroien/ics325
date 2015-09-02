<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/4/2015
 * Time: 2:29 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: index.php");
}
if (isset($_POST['submitted'])) {
    if (is_uploaded_file($_FILES['aFile']['tmp_name'])) {
        $realName = $_FILES['aFile']['name'];
        move_uploaded_file($_FILES['aFile']['tmp_name'],
            "C:/MAMP/htdocs/Project4/product/images/" . $realName);

        $prod_id = addslashes(trim($_POST['prod_id']));
        $catName = addslashes(trim($_POST['categories']));
        $prod_name = addslashes(trim($_POST['prod_name']));
        $description = addslashes(trim($_POST['description']));
        $price = addslashes(trim($_POST['price']));
        $qty = addslashes(trim($_POST['quantity']));

        $sql = "INSERT INTO product (prod_id, catName, prod_name, description, price, quantity, filename)
              VALUES (NULL, '$catName', '$prod_name', '$description', '$price', '$qty', '$realName')";

        if (mysqli_query($connection, $sql)) {
            echo "Added new product, " . $prod_name . " to DB";
            header("Refresh:3; url=http://localhost/project4/adminPage.php", true, 303);
        } else {
            echo "Error: " . $sql . "<br />" . mysql_error($connection);
        }

    }
}

?>

<html>
<body>
<h2>Add New Product</h2>

<form method="post" action="<? $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <input type="hidden" name="prod_id" value="<?php echo $prod_id; ?>"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000">

    Categories:
    <select class="select" name="categories">
        <?php $sql = "SELECT cat_id, catName FROM category";

        $result = $connection->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<option value=" . "'" . $row['catName'] . "'" . ">" . $row['catName'] . "</option>";
        }
        ?>
    </select><br/>

    Name: <input type="text" name="prod_name" placeholder="Product Name" pattern="[\w]+" required/><br/>

    Description: <textarea rows="4" cols="40" name="description" placeholder="Product Details"></textarea><br/>

    Price: <input type="number" name="price" placeholder="Product Price" min="0" pattern="[\d]+" required/><br/>

    Quantity: <input type="number" name="quantity" placeholder="Qty" min="0" pattern="[0-9]+" required/><br/>

    Image Upload: <input type="file" name="aFile" accept="image/gif, image/jpeg, image/png" required/><br/>

    <input type="image" src="./images/androidCentral.jpg" value="Submit"/>
    <input type="hidden" value="true" name="submitted"/>

</form>

<?php
require('footer.php'); ?>
</body>
</html>