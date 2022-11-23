<?php
$isStartable = true;
$requiredParms = ["username","password"];
$rememberMe = isset($_POST["remember_me"]);

// Can the session be started
foreach($requiredParms as $parm){
    if(!isset($_POST[$parm])){
        $isStartable = false;
        break;
    }
}

if(!$isStartable){
    header("Location: ./");
    die();
}

// Start session
session_start();
$cookieParams = ["username","password","remember_me"];
$sessionParams = ["username"];

// Remove old cookies
foreach($cookieParams as $parm){
    setcookie($parm,"",time()-3600);
}

// Set new cookies
if($rememberMe){
    foreach($cookieParams as $parm){
        setcookie($parm,$_POST[$parm]);
    }
}

// Set session variables
foreach($sessionParams as $parm){
    $_SESSION[$parm] = $_POST[$parm];
}

//Redirect
header("Location: ./mainpanel.php");

?>
