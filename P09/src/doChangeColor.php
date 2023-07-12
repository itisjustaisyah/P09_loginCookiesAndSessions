<?php
session_start();
$color = $_POST['bgcolor'];

//$_SESSION['color'] = $color;
setCookie("bgColor", $color, time() + 60 * 60 * 24 * 265 * 10);

$statusMessage = "Your background color is changed to ". $color ."<br />";
$statusMessage .= "<a href='index.php'>Return</a>";
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="Solution/stylesheets/style.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body style="background-color:<?php echo $color?>"> <!-- assign background color to webpage background -->
        <?php
        echo $statusMessage;
            //echo the $statusMessage on the webpage
        ?>
    </body>
</html>
