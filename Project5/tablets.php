<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 9:09 PM
 */
require("header.php");
require("leftNav.php");
?>
<html>
<body>
<h2 class="title">Tablets</h2>

<div class="products">
    <ul class="productGroup">
        <li class="category">
            <a href="./product/note10.php">
                <img src="./product/images/note4.jpg" class="catImage" title="Samsung Galaxy Note 10.1"/>

                <div class="details">
                    Samsung Galaxy Note 10.1 <br/>
                    Large Samsung tablet with S Pen<br/>
                    Very fast <br/>
                </div>
            </a>
            <hr/>
        </li>
        <li class="category">
            <a href="product/asus.php">
                <img src="./product/images/asus.jpg" class="catImage" title="Asus Memo Pad"/>

                <div class="details">
                    Asus MeMO Pad 7<br/>
                    Small portabel tablet <br/>
                    Easy to use, carry with you everywhere<br/>
                </div>
            </a>
            <hr/>
        </li>
        <li class="category">
            <a href="./product/nexus9.php">
                <img src="./product/images/nexus9.jpg" class="catImage" title="Nexus 9"/>

                <div class="details">
                    Nexus 9<br>
                    Mid-sized tablet<br>
                    Great default tablet, genuine stock Android <br/>
                </div>
            </a>
        </li>
    </ul>
</div>
<?php
require("footer.php");
?>
</body>
</html>