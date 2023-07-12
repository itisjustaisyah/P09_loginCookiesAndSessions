<?php


$rememberUsername = "";

//check if cookie is set, then set $rememberUsername to cookie
if(isset($_COOKIE['username'])){
    $rememberUsername = $_COOKIE['username'];
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Get Together - Where the neighborhood comes together!</title>
    </head>
    <body>
        <h3>Get Together - Login</h3>
        <form method="post" action="doLogin.php">
            <fieldset style="width:300px;">
                <table>
                    <tr>
                        <td><label for="idUsername">Username:</label></td>
                        <td><input type="text" id="idUsername" name="username"   
								   value="<?php echo $rememberUsername; ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="idPassword">Password:</label></td>
                        <td><input type="password" id="idPassword" name="password"/></td>
                    </tr>
              
					<tr>
						<td colspan="2" align="left"><label>
                                <input type="checkbox" name="remember" value="remember"/>
                            </label>Remember Me</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Login" name="submit"/></td>
					</tr>
				</table>
            </fieldset>
        </form>
        <br/><br/>
        <a href="register.php">Register</a>
    </body>
</html>
