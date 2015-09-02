<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/10/2015
 * Time: 11:38 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

// SETTING SESSION GRAND TOTAL

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

?>

<html>
<head>
    <script>
        function handleSelect(updatedQuantity, cartID) {
            window.location.href = "updateCart.php?updatedQuantity=" + updatedQuantity + "&cartID=" + cartID;
        }
    </script>
</head>
<body>
<h2>Shopping Cart</h2>

<form method="post" action="processOrder.php" class="cart" name="cartForm">
    <table>
        <tbody>
        <tr>
            <td>
                <strong>Item</strong>
            </td>
            <td>
                <strong>Quantity</strong>
            </td>
            <td>
                <strong>Remaining Quantity</strong>
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
            $prod_name_cart = $rowCart['prod_name'];
            $quantity_cart = $rowCart['quantity'];
            $inv = $rowCart['inv'];
            $new_qty_cart = $rowCart['inv'] - $rowCart['quantity'];
            $price_cart = $rowCart['price'];
            $total = $rowCart['quantity'] * $rowCart['price'];

            // Item column
            if (!empty($prod_name_cart)) {
                echo "<td>" . $prod_name_cart . "</td>";
            } else {
                echo "<td>" . $prod_name . "</td>";
            }
            ?>
            <!-- quantity wanted column -->
                <?php
                if (!empty($quantity_cart)) {
                    echo "<td><select name='updatedQuantity' onchange='handleSelect(this.value, $cart_id)'>";
                    for ($i = 1; $i <= $inv; ++$i) {
                        echo "<option value='" . $i . "'";
                        if ($quantity_cart == $i) {
                            echo "selected";
                        }
                        echo ">" . $i . "</option>";
                    }
                    echo "</select>";

                } else {
                    echo $quantity;
                }
                echo "</td>";
                ?>

            <td> <!-- remaining qty column -->
                <?php
                if (!empty($new_qty_cart)) {
                    echo $new_qty_cart;
                } else {
                    echo $newQty;
                } ?>
            </td>
            <td> <!-- price column -->
                <?php
                if (!empty($price_cart)) {
                    echo "$" . $price_cart;
                } else {
                    echo "$" . $price;
                } ?>
            </td>
            <td> <!-- total column -->
                $<?php echo $total ?>
            </td>
            <td id="button noBorder">
                <a href="removeCart.php?cart_id=<?php echo $cart_id ?>">
                    Delete
                </a>
            </td>
        </tr>
        <?php }
        $tax = 0.05;
        $tax_total = $subTotal * $tax;
        $grandTotal = $subTotal + $tax_total;
        $_SESSION['grandTotal'] = $grandTotal;
        ?>
        <tr>
            <td class="addToCart" id="noBorder">
                <input type="submit" value="Process Order" name="order">

            </td>
            <td id="noBorder"></td>
            <td id="noBorder"></td>
            <td> <!-- Sub total -->
                Sub Total
            </td>
            <td>
                $<?php echo $subTotal ?>
            </td>
        </tr>
        <tr> <!-- Tax -->
            <td id="noBorder"></td>
            <td id="noBorder"></td>
            <td id="noBorder"></td>
            <td>Tax 5%</td>
            <td>$<?php echo $tax_total ?></td>
        </tr>
        <tr>
            <td id="noBorder"></td>
            <td id="noBorder"></td>
            <td id="noBorder"></td>
            <td class="grandTotal">Grand Total</td>
            <td class="grandTotal price">$<?php echo $grandTotal ?></td>

        </tr>
        <?php
        // checking if cart is empty
        if (empty($cart_id)) {
            echo "<h2>You're cart is empty, please add items.</h2>";
            header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
            die();
        }
        ?>
        </tbody>
    </table>
</form>
<?php require('footer.php'); ?>
</body>
</html>