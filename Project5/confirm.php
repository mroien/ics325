<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/20/2015
 * Time: 4:54 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

/*
//SQL STATEMENT TO TRUNCATE CREDIT CARD NUMBER
$sql = $connection->query("SELECT RIGHT(number,-4) FROM credit_card WHERE user_id='$user_id'");
$rowC = $sql->fetch_assoc();
$last = $rowC['number'];
*/


// GETTING DATA FROM USER TABLE
$sql = $connection->query("SELECT fname,lname FROM users WHERE user_id='$user_id'");
$rowUser = $sql->fetch_assoc();
$fname = $rowUser['fname'];
$lname = $rowUser['lname'];


// updating cart, order tables with new data after the user processes order

// has 3 t's
if (isset($_POST['submittted'])) {
    // make random number for confirmation number
    $user_id = $_POST['user_id'];
    $add_id = $_POST['add_id'];
    $cc_id = $_POST['cc_id'];
    $cart_id = $_POST['cart_id'];

    // UPDATING ORDER TABLE
    $rand = mt_rand();
    $insert = "INSERT INTO orders (order_id, confirm_id, user_id, add_id, cc_id, cart_id, Date)VALUES
             (NULL, $rand, $user_id, $add_id, $cc_id, $cart_id,now())";
    if (mysqli_query($connection, $insert)) {
        echo "<h2>YEAH IT WORKED!!!</h2>";

        header("Location: receipt.php");
    } else {
        echo "Error: " . $insert . "<br />" . mysql_error($connection);
    }

    /*
        echo "Add ID: " . $add_id . "<br />" . "User ID: " . $user_id . "<br /> CC ID: " . $cc_id . "<br/> CC number: " .
            $number . "<br/>username: " . $username . "<br/>First Name: " . $fname . "<br/>Last Name: " . $lname . "<br/>QTY: " . $quantity_cart . "<br/>New Qty: " . $new_qty_cart;
        */
}

?>
<html>
<body>
<h2>Confirmation Page</h2>

<form method="post" action="" class="cart">
    <table>
        <tbody>
        <tr>
            <td id="noBorder" colspan="2">
                <h4>Ship To</h4>
                <?php
                //SQL FOR GETTING DATA FROM ADDRESS
                $sql = $connection->query("SELECT * FROM address WHERE user_id='$user_id'");
                while ($rowAdd = $sql->fetch_assoc()) {

                    $street = $rowAdd['street'];
                    $city = $rowAdd['city'];
                    $state = $rowAdd['state'];
                    $zip = $rowAdd['zip'];

                    ?>
                    <?php echo $street . "<br />" . $city . ", " . $state . "<br />" . $zip ?>

                <?php } ?>
            </td>
            <td id="noBorder"></td>
            <td id="noBorder">
                <h4>Credit
                    Card</h4>
                <?php // SQL FOR GETTING DATA FROM CREDIT CARD TABLE
                $sql = $connection->query("SELECT * FROM credit_card WHERE user_id='$user_id'");
                while ($row = $sql->fetch_assoc()) {
                    $cc_id = $row['cc_id'];
                    $type = $row['type'];
                    $name = $row['name'];
                    $number = $row['number'];
                    $month = $row['month'];
                    $year = $row['year'];
                    $add_id = $row['add_id'];

                    echo $type . "<br/>" . $name . "<br/>" . $number . "<br/>" . $month . "/ " . $year . "<br/>";
                }
                ?>
            </td>

        </tr>
        <tr>
            <td id="noBorder" colspan="2">
                <h4>Items to Order</h4>
            </td>

        </tr>
        <tr>
            <td>
                <strong>Item</strong>
            </td>
            <td>
                <strong>Quantity</strong>
            </td>
            <td>
                <strong>Price</strong>
            </td>
            <td>
                <strong>Total</strong>
            </td>
            <td id="noBorder">

            </td>
            <td id="noBorder">

            </td>
        </tr>
        <tr>
            <?php // retrieving data from cart table
            $sql = $connection->query("SELECT * FROM cart WHERE user_id='$user_id'");
            while ($rowCart = $sql->fetch_assoc()) {
            //print_r($rowCart);
            $cart_id = $rowCart['cart_id'];
            $user_id_cart = $rowCart['user_id'];
            $username_cart = $rowCart['username'];
            $prod_id_cart = $rowCart['prod_id'];
            $prod_name_cart = $rowCart['prod_name'];
            $quantity_cart = $rowCart['quantity'];
            $inv = $rowCart['inv'];
            $new_qty_cart = $rowCart['inv'] - $rowCart['quantity'];
            $price_cart = $rowCart['price'];
            $total = $rowCart['quantity'] * $rowCart['price'];

            // Item column

            echo "<td>" . $prod_name_cart . "</td>";
            ?>
            <!-- quantity wanted column -->
            <?php
            echo "<td>";
            echo $quantity_cart;
            echo "</td>";
            ?>

            <td> <!-- price column -->
                <?php
                echo "$" . $price_cart
                ?>
            </td>
            <td> <!-- total column -->
                $<?php echo $total ?>
            </td>
        </tr>
        <?php // END WHILE LOOP FOR CART
        if (isset($_POST['submitted'])) {
            $update = "UPDATE product SET quantity='$new_qty_cart' WHERE prod_id='$prod_id_cart'";

        }
        }
        ?>
        <tr>
            <td id="noBorder"><input type="submit" value="Place Order"/>
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>"/>
                <input type="hidden" name="add_id" value="<?php echo $add_id ?>"/>
                <input type="hidden" name="cc_id" value="<?php echo $cc_id ?>"/>
                <input type="hidden" name="cart_id" value="<?php echo $cart_id ?>"/>
            </td>
            <td id="noBorder"><input type="hidden" value="true" name="submittted"/></td>
            <td class="price">Total</td>
            <td class="price">$<?php echo $_SESSION['grandTotal'] ?>

            </td>
        </tr>

        </tbody>
    </table>
</form>
<?php require('footer.php'); ?>
</body>
</html>