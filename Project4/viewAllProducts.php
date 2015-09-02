<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/4/2015
 * Time: 10:51 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: index.php");
}
if (isset($_REQUEST['catName'])) {
    $catName = $_REQUEST['catName'];
}
?>

<html>
<body>
<h2>View All Products</h2>
<?php
$sql = "SELECT * FROM product";
$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {

    $prod_id = $row['prod_id'];
    $catName = $row['catName'];
    $prod_name = $row['prod_name'];
    $description = $row['description'];
    $price = $row['price'];
    $qty = $row['quantity'];
    $filename = $row['filename'];
    $image = "./product/images/" . $filename;
    ?>
    <table>
        <tbody>
        <tr>
            <td>
                Prod ID: <?php echo $prod_id; ?> <br/>
                Product Name: <?php echo $prod_name; ?> <br/>

                Category: <?php echo $catName; ?> <br/>

                Description: <?php echo $description; ?> <br/>

                Price: $<?php echo $price; ?> <br/>

                Quantity: <?php echo $qty; ?> <br/>
            </td>
            <td>
                <img class="mainImage" src='<?php echo $image; ?>'/>
            </td>
        </tr>
        </tbody>
    </table>

<?php
}
require("footer.php"); ?>
</body>
</html>