<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/21/2015
 * Time: 5:00 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: login.php");
}
$sql = $connection->query("SELECT user_id FROM credit_card WHERE user_id='$user_id'");
$row = $sql->fetch_assoc();
$user_id_pull = $row['user_id'];

if ($user_id_pull == $user_id) {
    echo "<h2>Sorry we can only handle 1 credit card per user at the moment";
    header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
    die();
}


if (isset($_POST['submitted'])) {

    $add_id = $_POST['add_id'];
    $type = $_POST['type'];
    $name = $_POST['name'];
    $number = $_POST['ccNumber'];
    $month = $_POST['month'];
    $year = $_POST['year'];

    // header("Location: index.php");
}

$insert = "INSERT INTO credit_card (cc_id, user_id, type, name, number, month, year, add_id) VALUES
                (NULL, '$user_id', '$type', '$name', '$number', '$month','$year', '$add_id')";

if (mysqli_query($connection, $insert)) {
    echo "Added new Credit Cart to to DB";
    header("Location: index.php");
} else {
    echo "Error: " . $insert . "<br />" . mysql_error($connection);
}

?>
<html>
<body>
<form>
    <table>
        <h2>Enter Credit Card Information</h2>
        <tbody>
        <tr>
            <td>
                <select name="type" required>
                    <option name="visa" value="VISA">VISA</option>
                    <option name="mastercard" value="MASTERCARD">MasterCard</option>
                    <option name="discover" value="DISCOVER">Discover</option>
                    <option name="amex" value="AMEX">American Express</option>
                </select><br/>
                Name on Card:<input type="text" name="name" placeholder="Name as it appears on the card" size="50"
                                    pattern="[a-zA-Z -]+" autofocus required><br/>
                Credit Card Number:<input type="number" name="ccNumber" placeholder="Enter Credit Card Number" size="15"
                                          pattern="[0-9]{14}" required/>
                Exp. Date<input type="text" placeholder="01" name="month" pattern="[0-9]{2}" size="2" required/>
                /
                <input type="text" name="year" placeholder="2015" pattern="[0-9]{4}" size="5" required/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Submit" name="credit"/>
            </td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>