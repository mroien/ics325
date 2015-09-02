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

$sesUser = $_SESSION['username'];
$sql = "SELECT username, admin FROM users WHERE username = '$sesUser'";
$result = $connection->query($sql);

$numRows = $result->num_rows;
if ($numRows > 0) {
    while ($row = $result->fetch_assoc()) {
        $admin = stripslashes($row['admin']);
        $username = stripslashes($row['username']);
        // echo "1st loop Username " . $username . " admin is: " . $admin . "<br />";
    }
    }
if ($sesUser == $username && $admin == 'yes') {
    $_SESSION['admin'] = true;
    echo "<h2 class='marquee'>You are an Administrator, " . $username . "</h2>";
    header("Refresh:3; url=http://localhost/project4/viewAll.php", true, 303);
} else {
    echo "<h2 class='marquee'>You are logged in, " . $username . "</h2>";
    header("Refresh:3; url=http://localhost/project4/index.php", true, 303);
}

//echo "Username " . $username . " admin rights: " . $admin;
//header("Location: index.php");

?>
    <html>
    <body>
    <img src="images/login.jpg" class="logo"/>
    </body>
    </html>
<?
require('footer.php');
?>