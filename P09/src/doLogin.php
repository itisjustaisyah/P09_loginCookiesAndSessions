<?php

session_start();
// php file that contains the common database connection code
global $link;
include "dbFunctions.php";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM users
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['fullName'] = $row['name'];
    $_SESSION['birthDate'] = $row['birthdate'];
    $msg = "<p><h2>You are logged in as " . $_SESSION['username'] . "</h2></p>";
    $msg .= "<p><a href='index.php'>Home</a></p>";
    if (isset($_POST['remember'])) {
        setCookie("username", $_SESSION['username'], time() + 60 * 60 * 24 * 265 * 10);
    }
//    $msg = "<p> User is in the database </p>";
} else {
    $msg = "<p>Sorry, you must enter a valid username and password to log in</p>";
    $msg .= "<p><a href='login.php'>Go back to login</a></p>";
//    $msg = "<p> User is not in the database </p>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Get Together - Where the neighborhood comes together!</title>
    </head>
    <body>
        <h3>Get Together - Login</h3>
        <?php
        echo $msg;
        ?>
    </body>
</html>