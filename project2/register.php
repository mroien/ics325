<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2/7/2015
 * Time: 3:17 PM
 */
require ("header.php");
require ("leftNav.php");

// Writing to users.csv
if(isset($_POST["submitted"])) {
    $base = $_SERVER['DOCUMENT_ROOT'];
    @ $fp = fopen("$base/../users.csv", 'a');
    if (!$fp) {
        echo "<div class='error'>Write access is denied</div>";
        exit;
    }

    $fname = htmlspecialchars(strip_tags($_POST["fname"]));
    $lname = htmlspecialchars(strip_tags($_POST["lname"]));
    $phone = htmlspecialchars(strip_tags($_POST["phone"]));
    $email = htmlspecialchars(strip_tags($_POST["email"]));
    $dob = htmlspecialchars(strip_tags($_POST["dob"]));
    $radio = $_POST["radio"];
    $select = $_POST["select"];
    $device1 = $_POST["device1"];
    $device2 = $_POST["device2"];
    $device3 = $_POST["device3"];
    $device4 = $_POST["device4"];
    $device5 = $_POST["device5"];
    $device6 = $_POST["device6"];
    $username = htmlspecialchars(strip_tags($_POST["username"]));
    $password = htmlspecialchars(strip_tags($_POST["password"]));
    $textarea = htmlspecialchars(strip_tags($_POST['textarea']));

    $output = "\"$fname\",\"$lname\",\"$phone\",\"$email\",\"$dob\",\"$radio\",\"$select\",\"$device1\",\"$device2\",\"$device3\",\"$device4\",\"$device5\",\"$device6\",\"$textarea\",\"$username\",\"$password\",\n";
    fwrite($fp,$output);

    echo "<h2>Welcome, " . $fname . " has been created and logged in as " . $username . "</h2>";

    fclose($fp);
}
?>
<html>
    <body>


    <h2 class="title">Log In Page</h2>

    <p><h4>required (*) </h4></p>
    <form class="form" method="post" action="">
        <label>
            First Name*: <input type="text" name="fname" placeholder="John" pattern="[A-Za-z]{1,32}" autofocus required>
        </label>
        <label>
            Last Name*:<input type="text" name="lname" placeholder="Doe" pattern="[A-Za-z-]{1,32}" required><br/>
        </label>
        <label>
            Phone Number*:<input type="tel" name="phone" placeholder="888-555-4567" pattern="[0-9()-]{10,14}"
                                 required><br/>
        </label>
        <label>
            Email*:<input type="email" name="email" placeholder="johndoe@gmail.com"
                          pattern="[\w\D]+@[a-z0-9.-]+\.[\a-z]{2,3}" required>
        </label>
        <label>
            Date of Birth*:<input type="date" name="dob" title="dob" required><br/>
        </label>
        <label>
            Would you like to be on our mailing list?*<br/>
        <input type="radio" name="radio" value="YES, I love spam" title="radio" checked required><label>Yes</label>
        <input type="radio" name="radio" value="NO, leave me alone" title="radio" required><label>No</label><br/>
        </label>
        <label>Select your favorite brand of android device.</label><br />
        <select title="select" class="select" name="select" required>
            <option value="Samsung" name="Samsung">Samsung</option>
            <option value="LG" name="LG">LG</option>
            <option value="Nexus" name="Nexus">Nexus</option>
            <option value="HTC" name="HTC">HTC</option>
            <option value="other" name="Other">Other</option>
        </select><br />
        <label>What device(s) do you own?</label><br />
        <label>
            <input type="checkbox" name="device1" value="Android" checked>
            Android Phone
        </label>
        <label>
            <input type="checkbox" name="device2" value="tablet">
            Tablet
        </label>
        <label>
        <input type="checkbox" name="device3" value="iPhone">
            IPhone
        </label>
        <label>
            <input type="checkbox" name="device4" value="ipad">
            Ipad
        </label>
        <label>
            <input type="checkbox" name="device5" value="laptop">
            PC Laptop
        </label>
        <label>
            <input type="checkbox" name="device6" value="macbook">
            Mac Book
        </label><br />
        <label>
            Comments
        <textarea rows="4" cols="40" name="textarea" pattern="[\w\D]+">
        </textarea>
        </label><br />
        <label>
            Username*: <input type="text" name="username" pattern="[\w\D]+" required>
        </label><br />
        <label>
            Password*:<input name="password" type="password" pattern="[\w\D]{5,30}"
                             placeholder="between 5-30 characters" required>
        </label><br />
        <input type="submit" value="Submit" >
        <input type="reset" value="Reset">
        <p>
            <input type="hidden" value="true" name="submitted" />
        </p>
    </form>
    </body>
    <?php
    require ("footer.php")
    ?>
</html>
