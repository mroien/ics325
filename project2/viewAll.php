    <?php
    /**
     * Created by PhpStorm.
     * User: Tim
     * Date: 2/15/2015
     * Time: 10:44 PM
     */
    require ("header.php");
    require ("leftNav.php");
    ?>
    <html>
    <body>
    <h2>View All Users</h2>


    </body>

    </html>
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

               print "<html>";
                print "<body>";
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
                print "<tr><td>$list[0]</td>";
                print "<td>$list[1]</td>";
                print "<td>$list[2]</td>";
                print "<td>$list[3]</td>";
                print "<td>$list[4]</td>";
                print "<td>$list[5]</td>";
                print "<td>$list[6]</td>";
                print "<td>$list[7]</td>";
                print "<td>$list[8]</td>";
                print "<td>$list[9]</td>";
                print "<td>$list[10]</td>";
                print "<td>$list[11]</td>";
                print "<td>$list[12]</td>";
                print "<td>$list[13]</td>";
                print "<td>$list[14]</td>";
                print "<td>$list[15]</td>";
                        print "</table>";
                print "</body>";
               print "</html>";
            }
        }
    require ('footer.php');
    ?>

