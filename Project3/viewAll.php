    <?php
    /**
     * Created by PhpStorm.
     * User: Tim
     * Date: 2/15/2015
     * Time: 10:44 PM
     */

    require ("header.php");
    require ("leftNav.php");
    if (!isset($_SESSION['username']) || ($_SESSION['admin'] != 1)) {
        header("Location: login.php");
    }
    if (isset($_SESSION['admin']) == 1) {
        echo "You are logged in as an Administrator, " . $_SESSION['username'];
    }
    ?>
    <html>
    <body>
    <h2>View All Users</h2>



    <?php
    $base = $_SERVER['DOCUMENT_ROOT'];
            $fp = fopen("$base/../users.csv", 'r');
            rewind($fp);
            if (!$fp) {
                echo "<div class='error'>The file is empty or missing</div>";
                exit;
            }

        while (!feof($fp)) {
            $list = fgetcsv($fp, 999, ",",'"');

            if ($list != ""){


                       print "<table>";
                // fixed columns titles
                print "<tr><th>First Name </th>";
                print "<th>Last Name </th>";
                print "<th>Phone Number</th>";
                print "<th>Email</th>";
                print "<th>Date of Birth</th>";
                print "<th>Email List</th>";
                print "<th>Favorite Brand</th>";
                print "<th colspan='6'>Devices</th>";
                print "<th>Text Area</th>";
                print "<th>Username</th>";
                print "<th>Password</th>";
                // user data
                print "<tr>";
                foreach($list as $item) {
                    print "<td>$item</td>";
                }
                        print "</table>";

            }
        }
    require ('footer.php');
    ?>
</body>
    </html>
