<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 11:12 PM
 */

require("prodheader.php");
require("productLeftNav.php");
?>
<head>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
</head>
<html>
    <body>
        <h3>Samsung Galaxy Note 4</h3>
        <img src="./images/note4.jpg" class="mainImage" title="Samsung Note 4" />
        <div class="mainContent">
        <ul class="info">
            <li>Processor: 2.70GHz Qualcomm Snapdragon 805</li>
            <li>Camera: 16MP</li>
            <li>Battery: 3200mAh</li>
            <li>OS: Android 4.4.4</li>
            <li>RAM: 3GB</li>
            <li>Cell Signal: LTE</li>
            <li>Weight: 176 grams</li>
            <li>Released: 2014-10-14</li>
            <li>Internal Storage: 32GB</li>
            <li>Size: 5.70' - 1440x2560</li>
            <li>Model: SM-N910</li>
            <li><a href="http://forum.xda-developers.com/note-4" class="xda-link">more info...</a></li>
        </ul>
        <div class="pricebox">
            Price:
            <div class="price">
                <strong>
                    $700
                </strong>
            </div>
        </div>
        </div>
        <?php
        require("prodfooter.php")
        ?>
    </body>
</html>