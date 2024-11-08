<?php
require_once("./app/config/dependencias.php");

session_start();
/*
if (!isset($_SESSION['usuario'])) {
    header("location: ./login.php");
}
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=CSS."bootstrap.min.css";?>">
    <link rel="stylesheet" href="<?=CSS."inicio.css";?>">
    <link rel="stylesheet" href="<?=ICONS."bootstrap-icons.css";?>">
    <!-- <link rel="stylesheet" href="<?=CSS."table.css";?>"> -->

    <title>Formulario</title>
</head>
    <body>
    <?php

        if (isset($_REQUEST['view'])) {
            $vista = $_REQUEST['view'];
        }else{
            $vista = "incio";
        }
        switch ($vista) {
            case "inicio":{
                require_once './views/home.php';
                break;
            }
            case "login":{
                require_once './views/login.php';
                break;
            }
            case "registro":{
                require_once './views/registro.php';
                break;
            }
            default:{
                require_once './views/error404.php';
                break;
            }
        }
    ?>
    </body>

</html>