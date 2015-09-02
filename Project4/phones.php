<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 1/31/2015
 * Time: 9:08 PM
 */
require("header.php");
require("leftNav.php");
?>
<html>
<body>
<h2 class="title">Phones</h2>

<div class="products">
    <ul class="productGroup">
        <li class="product">
            <a href="./product/note4.php">
                <img src="./product/images/note4.jpg" class="catImage" title="Samsung Galaxy Note 4"/>

                <div class="details" align="left">
                    Samsung Galaxy Note 4 <br/>
                    Fastest newest phablet <br/>
                    #1 Samsung phone <br/>
                </div>
            </a>
            <hr/>
        </li>
        <li class="product">
            <a href="./product/lg_g3.php">
                <img src="./product/images/lg3.jpg" class="catImage" title="LG G3"/>

                <div class="details">
                    LG G3 <br/>
                    Great LG Flagship phone<br/>
                    Top of the line phone<br/>
                </div>
            </a>
            <hr/>
        </li>
        <li class="product">
            <a href="./product/oneplusone.php">
                <img src="./product/images/oneplusone.jpg" class="catImage" title="One Plus One"/>

                <div class="details" align="left">
                    One Plus One <br>
                    Runs CM 11<br>
                    The Flagship Killer, Never Settle<br/>
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