<?php

function getCookieParm($parm,$default=""){
    if(isset($_COOKIE[$parm])){
        return $_COOKIE[$parm];
    }
    return $default;
}

$username = getCookieParm("username");
$password = getCookieParm("password");
$rememberMe = getCookieParm("remember_me")=="on"?" checked ":"";
?>

<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form action="login.php" method="post">
            <fieldset>
                <h1>Login</h1>
                Usuario: <br>
                <input type="text" name="username" value="<?php echo $username; ?>"><br>
                Clave: <br>
                <input type="password" name="password" value="<?php echo $password; ?>"><br>
                <input type="checkbox" name="remember_me" <?php echo $rememberMe; ?> >Recuerdame<br>
                <br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </body>
</html>