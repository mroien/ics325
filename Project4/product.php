<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/6/2015
 * Time: 9:21 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (isset($_REQUEST['prod_name'])) {
    $prod_name = $_REQUEST['prod_name'];
}

$result = $connection->query("SELECT * FROM product WHERE prod_name='$prod_name'");
$row = $result->fetch_assoc();
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

<html>
<body>
<h2><?php echo $prod_name; ?></h2>
<table>
    <tbody>
    <tr>
        <td>
            ID: <?php echo $prod_id; ?><br/>

            Category: <?php echo $catName; ?><br/>
            Description: <?php echo $description; ?><br/>
            Price:
            <div class="price">$ <?php echo $price ?></div>
            <br/>
            Only <?php echo $qty; ?>, <?php echo $prod_name ?> left.<br/>

            <div class="availability"><p>
                    <?php if ($qty == 0) {
                        echo '<h2 class="error">Out of Stock</h2>';
                        $_SESSION['availability'] = 'false';
                    } else {
                        echo '<h2>In Stock</h2>';
                        $_SESSION['availability'] = 'true';
                    }
                    ?>
                </p></div>
            <form method="post" action="">
                <input type="submit" value="Add to Cart" <?php if (strcmp($_SESSION['availability'], 'false') == 0) {
                    echo "disabled";
                } ?>/>
            </form>
        <td>
            <img class="mainImage" src='<?php echo $image; ?>'/>
        </td>
    </tr>
    </tbody>
</table>
    <?php
    require("footer.php"); ?>
</body>
</html>