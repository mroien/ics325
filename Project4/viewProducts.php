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
<h2>Viewing Products from <?php echo $catName; ?></h2>
<?php
$sql = "SELECT product.*, category.catName FROM product JOIN category ON category.catName=product.catName WHERE
        product.catName='$catName';";
$result = $connection->query($sql);
while ($row = $result->fetch_assoc()) {
    //print_r($row);
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
                <h2>
                    <a href="product.php?prod_name=<?php echo $prod_name; ?>">
                        <?php echo $prod_name; ?>
                    </a>
                </h2>
                Prod ID: <?php echo $prod_id; ?> <br/>

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