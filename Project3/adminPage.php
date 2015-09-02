<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/16/2015
 * Time: 10:17 PM
 */
require ("header.php");
require ("leftNav.php");

if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 1)) {
    header("Location: login.php");
}
?>
<html>
    <body>
        <h2>
            Administrator Interface Page
        </h2>
        <a href="viewAll.php">View All Users</a>
        <!-- adding YouTube video -->
        <iframe width="420" height="315" src="https://www.youtube.com/embed/2y_qk53PQoM"></iframe>
        <iframe width="420" height="315" src="https://www.youtube.com/embed/nsuQkiqAewU"></iframe>
        </body>
</html>
<?php require ('footer.php') ?>