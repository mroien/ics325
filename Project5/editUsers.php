<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/30/2015
 * Time: 2:03 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: index.php");
}

$result = $connection->query("SELECT * FROM users WHERE user_id ='$user_id' ");
$row = $result->fetch_assoc();

// updates after submitted form
if (isset($_POST['update'])) {
    $update = "UPDATE users SET fname='" . addslashes($_POST['fname']) . "', lname='" . addslashes($_POST['lname']) .
        "', phone='" . addslashes($_POST['phone']) . "', email='" . addslashes($_POST['email']) . "', dob='" . addslashes($_POST['dob'])
        . "', list='" . addslashes($_POST['list']) . "', textarea='" . addslashes($_POST['textarea']) .
        "', username='" . addslashes($_POST['username']) . "', admin='" . addslashes($_POST['admin']) . "'WHERE user_id='$user_id' ";


    if (mysqli_query($connection, $update)) {
        echo "Record updated successfully";
        header("Refresh:1; url=http://localhost/project5/viewAll.php", true, 303);
    } else {
        echo "Error updating record: " . mysqli_errno($connection);
    }

    header("Location: editUsers.php?user_id=" . intval($_GET['user_id']));
}

//print_r($row);

// values for the form
$user_id = $row['user_id'];
$_SESSION['user_id'] = $user_id;
$fname = $row['fname'];
$lname = $row['lname'];
$phone = $row['phone'];
$email = $row['email'];
$dob = $row['dob'];
$list = $row['list'];
$brand = $row['brand'];
$device1 = $row['device1'];
$device2 = $row['device2'];
$device3 = $row['device3'];
$device4 = $row['device4'];
$device5 = $row['device5'];
$device6 = $row['device6'];
$textarea = $row['textarea'];
$username = $row['username'];
$password = $row['password'];
$admin = $row['admin'];


?>
<html>
<body>
<h2>Edit User, <? echo $username ?></h2>

<form action="" method="POST" class="editUsers">
    <table>

        <tr>
            <td><input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/></td>
        </tr>
        <tr>
            <td>First Name</td>
            <td><input type="text" name="fname" value="<?php echo $fname; ?>"/></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><input type="text" name="lname" value="<?php echo $lname; ?>"/></td>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td><input type="text" name="phone" value="<?php echo $phone; ?>"/></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $email; ?>"/></td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td><input type="text" name="dob" value="<?php echo $dob; ?>"/></td>
        </tr>
        <tr>
            <td>Mailing List</td>
            <td>
                <select title="select" class="select" name="list">
                    <option value="YES" name="YES"
                        <?php if (strcmp($list, 'YES') == 0) {
                            echo "selected";
                        } ?> >Yes
                    </option>
                    <option value="NO" name="NO"
                        <?php if (strcmp($list, 'NO') == 0) {
                            echo "selected";
                        } ?> >No
                    </option>
            </td>
        </tr>
        <tr>
            <td>Phone Brand</td>
            <td>
                <select title="select" class="select" name="brand">
                    <option value="Samsung" name="Samsung"
                        <?php if (strcmp($brand, 'Samsung') == 0) {
                            echo "selected";
                        } ?> >Samsung
                    </option>
                    <option value="LG" name="LG"
                        <?php if (strcmp($brand, 'LG') == 0) {
                            echo "selected";
                        } ?> >LG
                    </option>
                    <option value="Nexus" name="Nexus"
                        <?php if (strcmp($brand, 'Nexus') == 0) {
                            echo "selected";
                        } ?> >Nexus
                    </option>
                    <option value="HTC" name="HTC"
                        <?php if (strcmp($brand, 'HTC') == 0) {
                            echo "selected";
                        } ?> >HTC
                    </option>
                    <option value="other" name="other"
                        <?php if (strcmp($brand, 'other') == 0) {
                            echo "selected";
                        } ?> >Other
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Devices</td>
            <td>
                <input type="checkbox" name="device1" value="Android"
                    <?php if (strcmp($device1, 'Android') == 0) {
                        echo "checked";
                    } ?> >
                Android Phone
                <input type="checkbox" name="device2" value="tablet"
                    <?php if (strcmp($device2, 'tablet') == 0) {
                        echo "checked";
                    } ?> >
                Tablet
                <input type="checkbox" name="device3" value="iPhone"
                    <?php if (strcmp($device3, 'iPhone') == 0) {
                        echo "checked";
                    } ?> >
                iPhone
                <input type="checkbox" name="device4" value="ipad"
                    <?php if (strcmp($device4, 'ipad') == 0) {
                        echo "checked";
                    } ?> >
                Ipad
                <input type="checkbox" name="device5" value="laptop"
                    <?php if (strcmp($device5, 'laptop') == 0) {
                        echo "checked";
                    } ?> >
                PC Laptop
                <input type="checkbox" name="device6" value="macbook"
                    <?php if (strcmp($device6, 'macbook') == 0) {
                        echo "checked";
                    } ?> >
                Mac Book
            </td>
        </tr>
        <tr>
            <td>Comment</td>
            <td>
                <input type="text" name="textarea" value="<? echo $textarea; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Username:</td>
            <td>
                <input type="text" name="username" value="<? echo $username; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Password:</td>
            <td>
                <input type="text" name="password" value="<? echo $password; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Admin Rights:</td>
            <td>
                <select title="select" class="select" name="admin">
                    <option value="yes" name="yes"
                        <?php if (strcmp($admin, 'yes') == 0) {
                            echo "selected";
                        } ?> >Yes
                    </option>
                    <option value="no" name="no"
                        <?php if (strcmp($admin, '') == 0) {
                            echo "selected";
                        } ?> >No
                    </option>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="update" value="Update"/></td>
        </tr>
    </table>
</form>
</body>
</html>
