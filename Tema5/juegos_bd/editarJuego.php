<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    if(!isset($_SESSION["usuario"])){ //Comprobamos si el cliente ha iniciado sesión
        header("location: sesion/login.php");
        exit;
    }
    if(!$_SESSION["admin"]){ // Comprobamos si el cliente es admin
        header("location: index.php");
        exit;
    }
    require "sesion/conexion.php";
    //Para saber los datos del juego que quiero editar
    $consulta = "SELECT * FROM videojuegos WHERE titulo = '{$_GET["titulo"]}'";
    $res = $_conexion->query($consulta);
    $info_juego = $res->fetch_assoc();

    //Para la lista desplegable
    $desarrolladoras = [];
    $consulta_lista = "SELECT nombre_desarrolladora FROM desarrolladoras";
    $res = $_conexion->query($consulta_lista);
    while ($fila = $res->fetch_assoc()) {
        array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
    }
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $titulo = $_POST["titulo"];
        $nombre_desarrolladora = $_POST["nombre_desarrolladora"];
        $anno_estreno = $_POST["anno_estreno"];
        $porcentaje_reseñas = $_POST["porcentaje_reseñas"];
        $duracion = $_POST["duracion"];

        $errores = false;
        if($titulo == ""){
            $errores = true;
            $err_titulo = "introduce un titulo";
        }
        if($nombre_desarrolladora == ""){
            $errores = true;
            $err_titulo == "Elije una desarrolladora";
        }
        if($anno_estreno == ""){
            $errores = true;
            $err_titulo = "introduce una fecha de lanzamiento";
        }
        if($porcentaje_reseñas == ""){
            $errores = true;
            $err_titulo = "introduce un porcentaje de reseñas";
        }
        if($duracion == ""){
            $errores = true;
            $err_titulo = "introduce una duracion";
        }

        if(!$errores){
            $consulta = "UPDATE videojuegos SET
            titulo = ?,
            nombre_desarrolladora = ?,
            anno_lanzamiento = ?,
            porcentaje_reseñas = ?,
            horas_duracion = ?
            WHERE titulo = '{$_GET["titulo"]}'";
            $stmt = $_conexion->prepare($consulta);

            $stmt->bind_param("ssidi",$titulo,$nombre_desarrolladora, $anno_estreno, $porcentaje_reseñas, $duracion);
            if($stmt->execute()){
                echo "<div class='alert alert-success'>Juego actualizado correctamente (olee)</div>";
                //limpiar las variables del formulario 
                $titulo = $nombre_estudio = $anno_estreno = $duracion = $num_temporadas = "";
            }else{
                echo "<div class='alert alert-danger'>Liada astronómica</div>";
            }
            $stmt->close();
        }

        
    }
    ?>
    <div class="container mt-4">
        <h1 class="fs-1">Editar el juego <?=$info_juego["titulo"]?></h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Título de la peli</label>
                <input type="text" name="titulo" class="form-control" value="<?= htmlspecialchars($info_juego["titulo"]); ?>">
                <?php //if(isset($err_titulo)) echo $err_titulo; ?>
                <?= $err_titulo ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Desarrolladora</label>
                <select name="nombre_desarrolladora" class="form-select">
                    <?php
                    echo "<option value='{$info_juego["nombre_desarrolladora"]}' selected>{$info_juego["nombre_desarrolladora"]}</option>";
                    foreach($desarrolladoras as $desarrolladora){
                        if($desarrolladora != $info_juego["nombre_desarrolladora"]){
                    ?>
                    <option value="<?= $desarrolladora?>">
                        <?= $desarrolladora?>
                    </option>
                    <?php
                        }}
                    ?>
                </select>
                <?= $err_estudio ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Año de lanzamiento</label>
                <input type="text" name="anno_estreno" class="form-control" value="<?= htmlspecialchars($info_juego["anno_lanzamiento"]); ?>">
                <?= $err_anno ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Porcentaje de reseñas</label>
                <input type="text" name="porcentaje_reseñas" class="form-control" value="<?= htmlspecialchars($info_juego["porcentaje_reseñas"]); ?>">
                <?= $err_temporadas ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Horas de duracion</label>
                <input type="text" name="duracion" class="form-control" value="<?= htmlspecialchars($info_juego["horas_duracion"]); ?>">
                <?= $err_duracion ?? "" ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Editar <?=$info_juego["titulo"]?>" class="btn btn-success">
            </div>
        </form>
        <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>