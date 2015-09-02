<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 4/4/2015
 * Time: 10:52 PM
 */
require("header.php");
require("leftNav.php");
require("connect.php");
?>

<html>
<body>
<h2>All Categories</h2>
<table>
    <tbody>

    <?php
    $result = $connection->query("SELECT cat_id, catName, description FROM category");
    while ($row = $result->fetch_assoc()) {
        $cat_id = $row['cat_id'];
        $catName = $row['catName'];
        $description = $row['description'];

        echo "<tr>
                        <td>
                            <a href=" . "viewProducts.php?catName=" . $catName . ">" . $catName . "
                            </a>
                        </td>
                    </tr>";
    }
    ?>


    </tbody>
</table>

<?php

require("footer.php"); ?>
</body>
</html>