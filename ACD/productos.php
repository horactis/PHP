<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);
if(!isset($_SESSION["nombre"])){
    header("location: usuario/login.php");
    exit();
}
require "usuario/conexion.php";
$columna = $_GET["order_by"] ?? "id_producto"; //Orden por defecto
    $direccion = $_GET["direction"] ?? "ASC"; // Dirección por defecto
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"])){
        $consulta = "DELETE FROM productos WHERE nombre = '{$_POST["nombre"]}'";
        if($_conexion-> query($consulta)){
            echo "<div class='alert alert-success'>Se ha eliminado correctamente el producto {$_POST["nombre"]} </div>";
        }else{
            echo "<div class='alert alert-danger'>No se ha podido elimirar el producto {$_POST["nombre"]} </div>";
        }
    }
    ?>
    <div class="container mt-4">
        <a href="?order_by=precio&direction=DESC" class="btn btn-warning">Ordenar por precio (DESC)</a>
    </div><br>
    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th>Nombre producto</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Nombre proveedor</th>
                <?php
                if($_SESSION["rol"] == "admin"){
                    echo "<th>Editar</th>";
                    echo "<th>Borrar</th>";
                }elseif($_SESSION["rol"] == "editor"){
                    echo "<th>Editar</th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $consulta = "SELECT * FROM productos ORDER BY $columna $direccion";
            $resultado = $_conexion->query($consulta);

            while($fila = $resultado->fetch_assoc()){
                echo "<tr>";
                foreach($fila as $clave => $producto){
                    if($clave != "id_producto")
                        echo "<td>$producto</td>";
                }
                if($_SESSION["rol"] == "admin"){
                    echo "<td><a href='editar.php?nombre={$fila["nombre"]}' class='btn btn-warning'>Editar</a></td>";
                    echo "<td>";
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="nombre" value="<?= $fila["nombre"] ?>">
                        <input type="submit" value="Borrar <?= $fila["nombre"] ?>" class="btn btn-danger">
                    </form>
                    <?php
                    echo "</td>";
                }
                if($_SESSION["rol"] == "editor"){
                    echo "<td><a href='editar.php?nombre={$fila["nombre"]}' class='btn btn-warning'>Editar</a></td>";
                    echo "<td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
        
    </table>
    <a href="index.php" class="btn btn-success m-2">volver al index</a>
</body>
</html>

