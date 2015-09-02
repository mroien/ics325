<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 7:42 PM
 */
session_start();

?>
<html>
<head>
    <title>Android Store</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <link rel="icon" href="../images/noogler.jpg">
</head>
<body>
<?php
if(isset($_SESSION["username"])) {
    echo "Welcome, " . $_SESSION['username'];
} else {
    (isset($_POST['username']));
    echo "Welcome, " . $_POST['username'];
}

?>
<img class="poster" src="../images/androidposter.jpg"/>
<a href="../index.php" class="header">
    <h1 class="header">Android Store</h1>
</a>
<?php if(isset($_SESSION['username'])) {
    print "<a class='logout' href='killsession.php'> Logout</a >";
} ?>
<hr />