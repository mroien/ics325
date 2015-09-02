<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/21/2015
 * Time: 8:26 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$order_id = $_GET['order_id'];



?>
<html>
<body>
<h2>Order Details for order <?php echo $order_id . " purchased by " . $username ?></h2>
<table class="fixed">
    <tbody>
    <tr>    <!-- JOINING ORDERS FOR ALL WITH ORDERED FOR ORDER_ID AND ARRANGING BY DATE DESCENDING -->
        <?php
        $sql = $connection->query("SELECT orders.order_id, ordered.* FROM orders JOIN ordered ON orders.user_id = ordered.user_id WHERE order_id LIKE '%8%' ORDER BY date desc");
        while ($row = $sql->fetch_assoc()) {


            $user_id = $row['user_id'];
            $cart_id = $row['oc_id'];
            $username = $row['username'];
            $prod_id = $row['prod_id'];
            $prod_name = $row['prod_name'];
            $quantity = $row['quantity'];
            $inv = $row['inv'];
            $price = $row['price'];
            $total = $row['total'];
            $date = $row['date'];
            echo "<tr>
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
        <td>
            <strong>Date</strong>
        </td>
    </tr>
            <td>";
            // Item column
            echo $prod_name;
            echo "</td>";
            ?>
            <td> <!--  QUANTITY -->
                <?php echo $quantity ?>
            </td>
            <td> <!-- price column -->
                <?php
                echo "$" . $price;
                ?>
            </td>
            <td> <!-- total column -->
                $<?php echo $total ?>
            </td>
            <td>
                <?php echo $date ?>
            </td>

        <?php } ?>
        <td><br/></td>
    </tr>
    </tbody>
</table>
<?php require('footer.php'); ?>
</body>
</html>