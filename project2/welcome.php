<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2/7/2015
 * Time: 6:29 PM
 */
require ("header.php");
require ("leftNav.php");
?>
<html>
    <body>
    <?php
    echo "<h2>You have been logged in, ". $_POST["username"] . "</h2>" . "<br />";

        echo "First Name: " . $_POST["fname"] . "<br />";
        echo "Last Name: " . $_POST["lname"] . "<br />";
        echo "Phone Number: " . $_POST["phone"] . "<br />";
        echo "Email: " . $_POST["email"] . "<br />";
        echo "Date of Birth: " . $_POST["dob"] . "<br />";
        echo "Email List: " . $_POST["radio"] . "<br />";
        echo "Username: " . $_POST["username"] . "<br />";
        echo "Password: " . $_POST["password"] . "<br />";
    ?>
    <a href="index.php">Home</a>
    </body>
    <?php
    require ("footer.php");
    ?>
</html>