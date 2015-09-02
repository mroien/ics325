<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/15/2015
 * Time: 11:13 PM
 */
require('header.php');
require('leftNav.php');
session_destroy();
header("Refresh:1; url=http://localhost/project5/index.php", true, 303);
?>
<html>
<body>
<h2 class="title">You have been logged out!!!!!</h2>
<a href="http://php.net/">
    <img src="images/session_destroy.png"></a>
<?php require('footer.php') ?>
</body>
</html>