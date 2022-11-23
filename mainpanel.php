<?php

session_start();
if(!isset($_SESSION['username'])){
    header("Location: ./");
    die();
}


function getContentFile(){
    $validLangs = ["es","en"];
    $lang = "";
    if(!isset($_COOKIE['lang'])){
        $lang="es";
    }
    else{
        if(in_array($_COOKIE['lang'],$validLangs)){
            $lang = $_COOKIE['lang'];
        }
        else{
            $lang="es";
        }
    }

    $header = "";
    if($lang == "es"){
        $header = "<h2>Lista de productos</h2>";
    }
    elseif($lang == "en"){
        $header = "<h2>Product list</h2>";
    }
    $fileName = "categorias_".$lang.".txt";
    $file = fopen($fileName,"r");
    $content = fread($file,filesize($fileName));
    fclose($file);
    $content = str_replace("\n","<br>",$content);
    return $header.$content;
}
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1>PANEL PRINCIPAL</h1><br>
        <h2>Bienvenido usuario: <?php echo $_SESSION["username"];?></h2><br>
        <a href="closesession.php">Cerrar sesión</a><br>
        <a href="setlang.php?lang=es">Es</a><br>
        <a href="setlang.php?lang=en">En</a><br>
        <?php echo getContentFile(); ?>
    </body>
</html>