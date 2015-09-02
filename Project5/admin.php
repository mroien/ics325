<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/30/2015
 * Time: 3:24 AM
 */
//session_start();
require("header.php");
require("leftNav.php");
require("connect.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 'yes')) {
    header("Location: login.php");
}
$_SESSION['username'] = $username;
$sql = "SELECT username, admin FROM users WHERE username = '$username'";
$result = $connection->query($sql);

$numRows = $result->num_rows;
if ($numRows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admin = stripslashes($row['admin']);
        $username = stripslashes($row['username']);
        // echo "1st loop Username " . $username . " admin is: " . $admin . "<br />";
    }
}
if ($username == $username && $admin == 'yes') {
    $_SESSION['admin'] = true;
    echo "<h2 class='marquee'>You are an Administrator, " . $username . "</h2>";
    echo "<img src='images/admin.jpg' class='logo'/>";
    header("Refresh:1; url=http://localhost/project5/viewAll.php", true, 303);
} else {
    echo "<h2 class='marquee'>You are logged in, " . $username . "</h2>";
    echo "<img src='images/login.jpg' class='logo'/>";
    header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
}

//echo "Username " . $username . " admin rights: " . $admin;
//header("Location: index.php");

?>
    <html>
    <body>

    </body>
    </html>
<?
require('footer.php');
?>