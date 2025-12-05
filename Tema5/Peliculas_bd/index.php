<?php
session_start();
//Ahora si podemos usar el array $_SESSION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    if(!isset($_SESSION["usuario"])){
        header("location: sesion/login.php");
        exit();
    }
    ?>
</head>
<body>
    <h1>Has iniciado sesion <?= $_SESSION["usuario"] ?></h1>

    <a href="Sesion/logout.php">Cerrar sesion</a>
</body>
</html>