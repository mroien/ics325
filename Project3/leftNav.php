<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 7:33 PM
 */?>
<div class="leftNav">
    <a class="breadcrumb" href="index.php">Home</a>
    <p><a href="register.php" class="login">Register</a></p>

    <p><a href="login.php" class="login">Login</a></p>
    <h3 class="title">Devices</h3>
    <ul>

        <li><a href="phones.php">Phones</a></li>
        <li><a href="tablets.php">Tablets</a></li>
        <!--
           <li><a href="watches.php">Watches</a></li>
           <li><a href="accessories.php">Accessories</a></li>
           -->
    </ul>

    <? if (isset($_SESSION['username'])) {
        if ($_SESSION['admin'] == 1) {
            print   "<div class='viewAll'>";
            print    "<a href='viewAll.php'>View All Users</a><br />";
            print   "<a href='adminPage.php'>Administrator Interface Page</a>";
            print   "</div>";
        }
    } ?>

</div>