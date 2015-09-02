<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2/17/2015
 * Time: 2:38 AM
 */
require("header.php");
require("leftNav.php");
require("connect.php");


if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = sha1($_POST["password"]);

    $sql = "SELECT username, password FROM users ";
    $sql = $sql . "WHERE username='$username'";
    $result = $connection->query($sql);
    if (!$result) {
        echo("<p>Unable to query database at this time.</p>");
        exit();
    }
    $numRows = $result->num_rows;
    if ($numRows > 0) {
        $row = $result->fetch_assoc();
        echo "<h2>Welcome " . $row["username"] . " you have been logged in.</h2>";
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    } else {
        echo "<h2>User name or password is incorrect</h2>";
        echo "<h3>Please Try Again</h3>";
    }
}
?>
    <html>
<body>
<h2 class="title">Login Page</h2>

<p><a href="register.php">Need to Register</a></p>

<form class="form" action="<? $_SERVER['PHP_SELF'] ?>" method="post">
    <label>
        Username: <input type="text" name="username" pattern="[\w\D]+" autofocus required>
    </label><br/>
    <label>
        Password:<input name="password" type="password" pattern="[\w\D]{5,30}" required>
    </label><br/>
    <input type="hidden" name="login" value="true"/>
    <input type="submit" value="Log In">
</form>
<?php require("footer.php") ?>