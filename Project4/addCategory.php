<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/30/2015
 * Time: 2:02 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: index.php");
}

// set variables

if (isset($_POST['submitted'])) {
    $cat_id = addslashes(trim($_POST['id']));
    $catName = addslashes(trim($_POST['catName']));
    $description = addslashes(trim($_POST['description']));

// write to the database

    $sql = "INSERT INTO category (cat_id, catName, description) VALUES (NULL, '$catName', '$description')";


    if (mysqli_query($connection, $sql)) {
        echo "Added new category, " . $catName . " to DB";
        header("Refresh:3; url=http://localhost/project4/addProduct.php", true, 303);
    } else {
        echo "Error: " . $sql . "<br />" . mysql_error($connection);
    }

}
?>

<html>
<body>
<h2>Add New Category</h2>

<form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $cat_id; ?>"/>
    Category Name: <input type="text" name="catName" placeholder="Category Name"/><br/>
    Description: <input type="text" name="description" placeholder="Category Description"/><br/>
    <input type="submit" value="Submit">
    <input type="hidden" value="true" name="submitted"/>

</form>

<?php require('footer.php'); ?>
</body>
</html>