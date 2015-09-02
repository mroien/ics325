<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 3/29/2015
 * Time: 9:45 PM
 */

// database connection

$connection = new mysqli("localhost", "root", "root", "project 4");
if (mysqli_connect_errno()) {
    echo("<p>Error creating database connection</p>");
    exit();
}