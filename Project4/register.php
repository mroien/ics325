<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 2/7/2015
 * Time: 3:17 PM
 */

require("header.php");
require("leftNav.php");
require("connect.php");

// Set variables
if (isset($_POST["submitted"])) {


    $fname = addslashes(trim($_POST["fname"]));
    $lname = addslashes(trim($_POST["lname"]));
    $phone = addslashes(trim($_POST["phone"]));
    $email = addslashes(trim($_POST["email"]));
    $dob = addslashes(trim($_POST["dob"]));
    $list = $_POST["list"];
    $brand = $_POST["brand"];
    $device1 = $_POST["device1"];
    $device2 = $_POST["device2"];
    $device3 = $_POST["device3"];
    $device4 = $_POST["device4"];
    $device5 = $_POST["device5"];
    $device6 = $_POST["device6"];
    $textarea = addslashes(trim($_POST['textarea']));
    $username = addslashes(trim($_POST["username"]));
    $password = addslashes(trim($_POST["password"]));


    // writing to database

    $sql = "INSERT INTO users (id,fname, lname, phone, email, dob, list, brand, device1, device2, device3, device4, device5,
            device6, textarea, username, password) VALUES (NULL, '$fname', '$lname', '$phone', '$email', '$dob',
            '$list', '$brand', '$device1', '$device2', '$device3', '$device4', '$device5', '$device6', '$textarea',
            '$username',  sha1('$password'))";

    if (mysqli_query($connection, $sql)) {
        echo "New user " . $username . " created successfully";
        $_SESSION['username'] = $username;
        header("Refresh:3; url=http://localhost/project4/index.php", true, 303);
    } else {
        echo "Error: " . $sql . "<br />" . mysql_error($connection);
    }

}
?>
<html>
<body>
<h2 class="title">Register Page</h2>

<p><a href="login.php">Login Page</a></p>
<h4>required (*) </h4>
<!-- form for users information -->
<form class="form" method="post" action="">
    <label>
        First Name*: <input type="text" name="fname" placeholder="John" pattern="[A-Za-z]{1,32}" autofocus
                            required><br/>
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
        <input type="radio" name="list" value="YES" title="radio" checked required><label>Yes</label>
        <input type="radio" name="list" value="NO" title="radio" required><label>No</label><br/>
    </label>
    <label>Select your favorite brand of android device.</label><br/>
    <select title="select" class="select" name="brand" required>
        <option value="Samsung" name="Samsung">Samsung</option>
        <option value="LG" name="LG">LG</option>
        <option value="Nexus" name="Nexus">Nexus</option>
        <option value="HTC" name="HTC">HTC</option>
        <option value="other" name="Other">Other</option>
    </select><br/>
    <label>What device(s) do you own?</label><br/>
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
    </label><br/>
    <label>
        Comments
                <textarea rows="4" cols="40" name="textarea" placeholder="maximum of 200 characters"
                          pattern="[\w\D]{,200}">
                </textarea>
    </label><br/>
    <label>
        Username*: <input type="text" name="username" pattern="[\w\D]+" placeholder="Max of 30 characters" required>
    </label><br/>
    <label>
        Password*:<input name="password" type="password" pattern="[\w\D]{5,30}"
                         placeholder="between 5-30 characters" required>
    </label><br/>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset">

    <p>
        <input type="hidden" value="true" name="submitted"/>
    </p>
</form>
</body>
<?php
require("footer.php")
?>
</html>
