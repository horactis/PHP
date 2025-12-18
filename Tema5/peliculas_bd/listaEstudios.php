<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    require "sesion/conexion.php";
    //Ordenar
    if(!isset($_SESSION["usuario"])){
    header("location: sesion/login.php");
    exit;
    }
    /**
     * Cosas que hacer: 
     * 
     * Crear el formulario en la columna acciones y crear el enlace de editar al fichero editarEstudio.php
     * 
     * Manejar el orden en el que se muestra la tabla con una lista desplegable (con GET) (hecho)
     */
    $columna = $_GET["order_by"] ?? "anno_fundacion";
    $direccion = $_GET["direction"] ?? "DESC";
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo $_POST["nombre_estudio"];
        $consulta = "DELETE FROM peliculas WHERE nombre_estudio = '{$_POST["nombre_estudio"]}'";
        $_conexion->query($consulta);
        $consulta = "DELETE FROM estudios WHERE nombre_estudio = '{$_POST["nombre_estudio"]}'"; 
        $_conexion->query($consulta);

        echo "<div class='alert alert-success'>Se ha eliminado correctamente el estudio {$_POST["nombre_estudio"]} y sus películas asociadas</div>";
    }
    ?>
    <form action="" method="get">
        <select name="order_by" id="">
            <option value="" disabled selected>Elija la columna por la que quieres ordenar</option>
            <option value="nombre_estudio">Nombre del estudio</option>
            <option value="ciudad">Ciudad</option>
            <option value="anno_fundacion">Año de fundación</option>
        </select>
        <select name="direction" id="">
            <option value="" disabled selected>Elija el orden de la tabla</option>
            <option value="ASC">Ascendente</option>
            <option value="DESC">Descendente</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Año de fundación</th>
                <?php
                if($_SESSION["admin"])
                echo "<th>Acciones</th>";
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
        $consulta = "SELECT * FROM estudios ORDER BY $columna $direccion";
        $resultado = $_conexion->query($consulta);

        while($fila = $resultado->fetch_assoc()){
        ?>
        <tr>
            <td><?= $fila["nombre_estudio"] ?></td>
            <td><?= $fila["ciudad"] ?></td>
            <td><?= $fila["anno_fundacion"] ?></td>
            <?php
            if($_SESSION["admin"]){
            ?>
            <td>
                <a href="editarEstudios.php" class="btn btn-warning">EDITAR</a>

                <form action="" method="post">
                    <input type="hidden" name="nombre_estudio" value="<?= $fila["nombre_estudio"]?>">
                    <input type="submit" value="BORRAR" class="btn btn-danger">
                </form>
            </td>
            
            <?php
            }

            ?>
        </tr>

        <?php
        }
        ?>
        </tbody>
    </table>
    <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>