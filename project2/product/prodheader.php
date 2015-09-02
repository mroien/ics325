<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 7:42 PM
 */
?>
<html>
<head>
    <title>Android Store</title>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
    <link rel="icon" href="../images/noogler.jpg">
</head>
<body>
<?php
if(isset($_POST["submitted"])) {
    echo "Welcome, " . $_POST['username'];
}
?>
<img class="poster" src="../images/androidposter.jpg"/>
<a href="../index.php" class="header">
    <h1 class="header">Android Store</h1>
</a>

<hr />
</body>
</html>