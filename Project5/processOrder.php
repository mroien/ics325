<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/19/2015
 * Time: 9:19 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}



?>
<html>
<body>
<h2>
    Process Order
</h2>

<form action="confirm.php" method="post">
<table class="cart">
    <tbody>
    <tr>
        <td>
            <h3>Address</h3>

            <?php
            // pulling data from Address table
            $sql = $connection->query("SELECT * FROM address WHERE user_id='$user_id'");
            $row = $sql->fetch_assoc();
                $add_id = $row['add_id'];

                $street = $row['street'];
                $city = $row['city'];
                $state = $row['state'];
                $zip = $row['zip'];

            echo $street . "<br />" . $city . "," . $state . "<br />" . $zip . "<br />" ?>

        </td>
    </tr>
    <tr>
        <td id="noBorder">
            <h3>Credit Card Information</h3>
        </td>
    </tr>
    <tr>
        <td id="noBorder">
            <?php // SQL FOR GETTING DATA FROM CREDIT CARD TABLE
            $sql = $connection->query("SELECT * FROM credit_card WHERE user_id='$user_id'");
            $row = $sql->fetch_assoc();
            $cc_id = $row['cc_id'];

            $type = $row['type'];
            $name = $row['name'];
            $number = $row['number'];
            $month = $row['month'];
            $year = $row['year'];
            $add_id = $row['add_id'];

            echo $type . "<br/>" . $name . "<br/>" . $number . "<br/>" . $month . " / " . $year;
            ?>


        </td>
    </tr>
    <tr>
        <td id="noBorder">

            <input type="submit" value="Process Order" name="submit"/>
            <input type="hidden" value="true" name="submitted"/>
        </td>
    </tr>
    </tbody>
</table>
</form>
<?php require('footer.php'); ?>
</body>
</html>