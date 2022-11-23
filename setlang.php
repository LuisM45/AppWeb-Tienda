<?php
header("Location: ".$_SERVER['HTTP_REFERER']);
setcookie("lang",$_GET["lang"],time()+24*60)
?>