<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2/15/2015
 * Time: 10:44 PM
 */

require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: index.php");
}
?>
<html>
<body>
<h2>View All Users</h2>
<table>
    <tr>
        <td>
            User ID
        </td>
        <td>
            First Name
        </td>
        <td>
            Last Name
        </td>
        <td>
            Username
        </td>
        <td>
            CRUD
        </td>
    </tr>

    <?php
    $sql = "SELECT * FROM users";
    $result = $connection->query($sql);

    while ($row = $result->fetch_assoc()) {
        $user_id = stripslashes($row['user_id']);
        $fname = stripslashes($row['fname']);
        $lname = stripslashes($row['lname']);
        $username = stripslashes(($row['username']));

        ?>

        <tr>
            <td>
                <?= $user_id ?>
            </td>
            <td>
                <?= $fname ?>
            </td>
            <td>
                <?= $lname ?>
            </td>
            <td>
                <?= $username ?>
            </td>
            <td>

                <a href="editUsers.php?user_id=<? echo $user_id ?>">Edit</a>
                <!--
                <a href="deleteUsers.php">Delete</a>
                -->
            </td>
        </tr>
    <?php
    }
    ?>
</table>

<?php require('footer.php'); ?>
</body>
</html>
