<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/21/2015
 * Time: 11:16 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: login.php");
}

?>
<html>
<body>
<h2>View All Orders</h2>
<table class="cart">
    <tbody>

    <tr>
        <!-- ORDER NUMBER -->
            <?php
            // GRABBING ALL PRIMARY KEYS FROM RELEVANT TABLES
            $sql = $connection->query("SELECT ordered.*, users.*, orders.order_id FROM ordered JOIN users
ON ordered.user_id = users.user_id JOIN orders ON orders.user_id = ordered.user_id JOIN users u2
ON orders.user_id = u2.user_id ORDER BY lname desc, date desc");

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
                $fname = $row['fname'];
                $lname = $row['lname'];
                $order_id = $row['order_id'];
                echo "<tr>
                    <td>
                Order Number
                </td>
        <td>
                Date Ordered
                </td>
    </tr>
                      <td>";
                echo "<a href='viewOrderDetails.php?order_id=$order_id'>$order_id</a>";
                echo "</td>";
                echo "<td>";    //DATE ORDERED
                echo "<br/>" . $date . "<br/>";
                echo "</td>";
            }
            ?>

    </tr>
    </tbody>
</table>
<?php require('footer.php'); ?>
</body>
</html>

