<?php
// php file that contains the common database connection code
include "dbFunctions.php";
global $link;

$name = $_POST['name'];
$gender = "";
if (isset($_POST['gender'])) {
    $gender = $_POST['gender'];
}
$birthdate = $_POST['birthdate'];
$username = $_POST['username'];
$password = $_POST['password'];
$message = "";

$queryDupe = "SELECT username
FROM users
WHERE username = '$username';";


$statusDupe = mysqli_query($link, $queryDupe);

if (mysqli_num_rows($statusDupe) > 0) {
    $message = "<p>The username $username already exists <br>
                <a href='login.php'>Try again!</a></p>";
} else {
    $queryInsert = "INSERT INTO users
          (name,gender,birthdate,username,password) 
          VALUES 
          ('$name',
           '$gender',
           '$birthdate',
           '$username',
           SHA1('$password'))";
    $statusInsert = mysqli_query($link, $queryInsert);
    if($statusInsert ){
        $message = "Your new account has been successfully created. You are now ready to <a href='login.php'>login</a>.";
    }else{$message = "false";}

}


mysqli_close($link);

?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <title>Get Together - Where the neighborhood comes together!</title>
        <link rel="stylesheet" type="text/css" href="Solution/style.css">
    </head>
    <body>
        <h3>Get Together - Register</h3>
        <?php
        echo $message;
        ?>
    </body>
</html>