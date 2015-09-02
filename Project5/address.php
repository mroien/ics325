<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/11/2015
 * Time: 3:36 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

$sql = $connection->query("SELECT user_id FROM address WHERE user_id='$user_id'");
while ($row = $sql->fetch_assoc()) {
    $user_id_pull = $row['user_id'];
}
if ($user_id_pull == $user_id) {
    echo "<h2>Sorry we can only handle 1 address per user at the moment";
    header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
    die();
}




if (isset($_POST['submitted'])) {


    $street = addslashes(trim($_POST['street']));
    $city = addslashes(trim($_POST['city']));
    $state = addslashes(trim($_POST['state']));
    $zip = addslashes(trim($_POST['zip']));


    $insert = "INSERT INTO address (add_id, user_id, street, city, state, zip) VALUES
    (NULL, '$user_id', '$street','$city', '$state', '$zip')";

    if (mysqli_query($connection, $insert)) {
        echo "New user address added to " . $username . " created successfully";

        header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
    } else {
        echo "Error: " . $insert . "<br />" . mysql_error($connection);
    }
}

?>
<html>
<body>
<h2>Adding Address</h2>

<form action="" method="post" class="form">
    <table>
        <tbody>
        <tr>
            <td>
                <input type="hidden" name="user_id">
                Street: <input type="text" name="street" placeholder="Street Address" pattern="[0-9A-Za-z ]+"/>
            </td>
        </tr>
        <tr>
            <td>
                City: <input type="text" name="city" placeholder="City" pattern="[A-Za-z ]+"/>
            </td>
        </tr>
        <tr>
            <td>
                State: <input type="text" name="state" placeholder="MN" pattern="[A-Za-z ]+"/>
            </td>
        </tr>
        <tr>
            <td>
                Zip: <input type="number" name="zip" placeholder="12345" pattern="[0-9]{5}"><br/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
                <input type="hidden" value="true" name="submitted"/>
            </td>
        </tr>
        </tbody>
    </table>
</form>
<?php require('footer.php'); ?>
</body>
</html>