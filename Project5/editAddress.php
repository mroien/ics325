<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/11/2015
 * Time: 1:21 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");

if ($_SESSION['admin'] != 'yes') {
    header("Location: login.php");
}

if (isset($_REQUEST['username'])) {
    $username = $_REQUEST['username'];
}

$sql = "SELECT users.user_id FROM users address WHERE username='$username'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();
$user_id = $row['user_id'];

echo "User ID:" . $user_id;
