<?php
session_start();
// Ahora sí podemos usar el array $_SESSION
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .btn-admin{
            box-shadow: 1;
        }
    </style>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    if(!isset($_SESSION["nombre"])){
        header("location: usuario/login.php");
        exit();
    }
    ?>
</head>
<body>
    <?php
    if($_SESSION["rol"] == "cliente"){

    
    ?>
    <div class="container text-center mt-5">
        <h1>Bienvenido de nuevo, <?= $_SESSION["nombre"] ?></h1>
        <p class="mt-5">Esta en modo cliente..</p>
    </div>
    <div class="d-grid gap-3 col-6 mx-auto mt-4">
        <a href="productos.php" class="btn btn-primary btn-admin">Productos</a>
        <a href="usuario/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
    
    <?php
    }else if($_SESSION["rol"] == "admin"){
    ?>

    <div class="container text-center mt-5">
        <h1>Bienvenido de nuevo, <?= $_SESSION["nombre"] ?></h1>
        <p class="mt-5">Está en modo Administrador</p>
    </div>
    <div class="d-grid gap-3 col-6 mx-auto mt-4">
        <a href="productos.php" class="btn btn-primary btn-admin">Productos</a>
        <a href="nuevo.php" class="btn btn-primary btn-admin">Nuevo producto</a>
        <a href="usuario/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
    <?php
    }else{
    ?>
    <div class="container text-center mt-5">
        <h1>Bienvenido de nuevo, <?= $_SESSION["nombre"] ?></h1>
        <p class="mt-5">Está en modo Editor</p>
    <div class="d-grid gap-3 col-6 mx-auto mt-4">
        <a href="productos.php" class="btn btn-primary btn-admin">Productos</a>
        <a href="usuario/logout.php" class="btn btn-danger">Cerrar sesión</a>
    </div>
    </div>
    <?php
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>