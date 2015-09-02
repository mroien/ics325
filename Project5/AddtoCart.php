<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/10/2015
 * Time: 9:15 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");


$result = $connection->query("SELECT * FROM product WHERE prod_name='$prod_name'");
$row = $result->fetch_assoc();
//print_r($row);
$prod_id = $row['prod_id'];
$catName = $row['catName'];
$prod_name = $row['prod_name'];
$description = $row['description'];
$price = $row['price'];
// quantity from products table
$inv = $row['quantity'];
$filename = $row['filename'];
$image = "./product/images/" . $filename;

$result = $connection->query("SELECT prod_id FROM cart");
while ($rowCheck = $result->fetch_assoc()) {
    $prod_id_cart = $rowCheck['prod_id'];

    // check if items in cart match new item adding
    if ($prod_id_cart == $prod_id) {
        echo "Sorry this items is already in your cart";
        header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
    }
}




if (isset($_POST['submitted'])) {
    $quantity = $_REQUEST['quantity'];
    $total = $price * $quantity;
// adding current cart items to database to tie to user to save for later
    $insert = "INSERT INTO cart (cart_id, user_id, username, prod_id, prod_name, quantity, inv, price, total, date)
                VALUES (NULL, '$user_id','$username','$prod_id','$prod_name', '$quantity', '$inv', '$price','$total', now())";

    // setting new quantity in products table
    $new_qty = $inv - $quantity;
    $update = "UPDATE product SET quantity='$new_qty' WHERE prod_id='$prod_id'";
}
if (mysqli_query($connection, $insert)) {
    echo "Items added to cart database";


}
if (mysqli_query($connection, $update)) {
    echo "Items added to cart database";

    header("Location: cart.php");
}

?>

<html>
<body>
<h2>Update Quantity</h2>

<form action="" method="post" name="myForm">
    <table>
        <tbody>
        <tr>
            <td>
                Item Name <br/>
                <?php echo $prod_name; ?>
            </td>
            <td>
                Item Description <br/>
                <?php echo $description; ?>
            </td>
            <td>
                Price <br/>
                $<?php echo $price; ?>
            </td>
            <td>
                <!-- $quantity -->
                Quantity <br/>
                <select name="quantity">
                    <?php
                    for ($i = 1; $i <= $inv; ++$i) {
                        echo "<option value='$i'>$i</option>";

                    }
                    ?>
                </select>
            </td>
            <td>
                <img src='<?php echo $image; ?>' class='mainImage'/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Add to Cart"/>
                <input type="hidden" value="true" name="submitted"/>
                <input type="hidden" value="quantity">
            </td>
        </tr>
        </tbody>
    </table>
</form>

<?php require('footer.php'); ?>
</body>
</html>