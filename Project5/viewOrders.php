<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/21/2015
 * Time: 6:45 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
// GRABBING FNAME, LNAME,ORDER NUMBER FROM USERS,ORDER TABLE
// don't need a join table here :( going to leave it because I did it on my first try
$sql = $connection->query("SELECT USERS.fname, USERS.lname, ORDERS.order_id FROM users JOIN orders ON users.user_id = orders.user_id");
$row = $sql->fetch_assoc();
$fname = $row['fname'];
$lname = $row['lname'];





?>
<html>
<body>
<h2>View Orders for <?php echo $fname . '&nbsp' . $lname ?></h2>
<table class="cart">
    <tbody>

    <!-- ORDER NUMBER -->
            <?php
            // GRABBING ALL PRIMARY KEYS FROM RELEVANT TABLES
            $sql = $connection->query("SELECT * FROM orders WHERE user_id='$user_id'");
            while ($row = $sql->fetch_assoc()) {
                $order_id = $row['order_id'];
                $confirm_id = $row['confirm_id'];
                $add_id = $row['add_id'];
                $cc_id = $row['cc_id'];
                $cart_id = $row['cart_id'];
                $date = $row['date'];
                echo "<tr>
        <td>

            Order Number
        </td>
        <td>
            Date Ordered
        </td>
    </tr>
    <td>
                <a href='viewOrderDetails.php?order_id=$order_id'>$order_id</a><br/>";

                echo "</td>";
                echo "<td>";    //DATE ORDERED

                echo $date . "<br/>" . "</td>";
                echo "</tr>";
            }
            ?>


    </tbody>
</table>
<?php require('footer.php'); ?>
</body>
</html>
