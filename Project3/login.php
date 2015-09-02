<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2/17/2015
 * Time: 2:38 AM
 */
require("header.php");
require("leftNav.php");

?>
<html>
<body>
<h2 class="title">Login Page</h2>

<p><a href="register.php">Need to Register</a></p>
<form class="form" action="auth.php" method="post">
    <label>
        Username: <input type="text" name="username" pattern="[\w\D]+" autofocus required>
    </label><br />
    <label>
        Password:<input name="password" type="password" pattern="[\w\D]{5,30}" required>
    </label><br />
    <input type="hidden" name="login" value="true"/>
    <input type="submit" value="Log In">
</form>
<?php require ("footer.php") ?>