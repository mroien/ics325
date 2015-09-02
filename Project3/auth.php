<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/15/2015
 * Time: 6:55 PM
 */

require ("header.php");
require ("leftNav.php");

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    if (($username == "admin") && ($password == "testtest")) {
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $username;
        echo "You are logged in, " . $_SESSION['username'] . " as an Administrator";
        header ("Refresh:3; url=http://localhost/project3/viewAll.php", true, 303);
    } else {
        unset($_SESSION['username']);
        $base = $_SERVER['DOCUMENT_ROOT'];
        $fp = fopen("$base/../users.csv", 'r');
        rewind($fp);
        if (!$fp) {
            echo "<div class='error'>The file is empty or missing</div>";
            exit;
        }

        while (!feof($fp)) {
            $list = fgetcsv($fp, 999, ",",'"');

            if ($list == "") {
                continue;
            }

            if ($list[14] == $username && $list[15] == $password) {
                $_SESSION['admin'] = false;
                $_SESSION['username'] = $username;
                break;
            }
        }
        if (isset($_SESSION['username'])) {
            echo "You are logged in, " . $_SESSION['username'];
            header("Refresh:3; url=http://localhost/project4/index.php", true, 303);
        } else {
            echo "Enter valid username and password.";
            header("Refresh:3; url=http://localhost/project4/login.php", true, 303);
        }
    }
}
?>

    <? require ("footer.php"); ?>

