<?php
global $link;
session_start();
// include code to start session here

$msg = "";


//include code to check for if session has been set and assign message accordingly
if (!isset($_SESSION['username'])) {
    $msg = "<h3>Get together</h3>";
    $msg .= "<h4>Please <a href='login.php'>Log in</a>.</h4>";
}else{
    $fullName = $_SESSION['fullName'];
    $birthDate = $_SESSION['birthDate'];
    $msg = "<h2> Hi " . $_SESSION['username'] . "!</h2>";
    $msg .= "</br>";
    $msg .= "<p>full name: $fullName</p>";
    $msg .= "<p>full name: $birthDate</p>";

}

if (isset($_COOKIE['bgColor'])){
    $bg_color = $_COOKIE['bgColor'];
}else{
    $bg_color = "white";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Get Together - Where the neighborhood comes together!</title>
    </head>
	
    <body style="background-color:<?php echo $bg_color; ?>;">
        <?php 
            echo $msg;
        ?>
		<?php if (isset($_SESSION['username'])) { ?>
			<br>
			<form action="doChangeColor.php" method="post">
				Change the homepage background color<br/><br/>
				Choose Color: <select name="bgcolor">
				<option value="lightblue">Light Blue</option>
				<option value="lightpink">Light Pink</option>
				<option value="lightyellow">Light Yellow</option>
				</select><br/><br/>
				<input type="submit" value="Confirm"/>
			</form>
			<br><br>
			<a href='logout.php'>Logout</a>
		<?php } ?>		
	</body>
</html>