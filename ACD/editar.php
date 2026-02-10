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
    <style>
        p{
            text-align: center;
            color:white
        }
    </style>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    if(!isset($_SESSION["nombre"])){ //Comprobamos si el cliente ha iniciado sesión
        header("location: usuario/login.php");
        exit;
    }
    if($_SESSION["rol"] == "cliente"){ // Comprobamos si el cliente es admin
        header("location: index.php");
        exit;
    }
    require "usuario/conexion.php";



    $consulta = "SELECT * FROM productos WHERE nombre = '{$_GET["nombre"]}'";
    $res = $_conexion->query($consulta);
    $info_producto = $res->fetch_assoc();
    ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = trim($_POST["nombre"]);
        $nombre_proveedores = $_POST["nombre_proveedor"];
        $categoria = $_POST["categoria"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];

        $errores = false;

        if($nombre == ""){
            $errores = true;
            $err_nombre = "<p class='bg-danger mt-1'>Introduce un nombre</p>";
        }
        if($categoria == ""){
            $errores = true;
            $err_categoria = "<p class='bg-danger mt-1'>Introduce una categoria</p>";
        }
        if($precio == ""){
            $errores = true;
            $err_precio = "<p class='bg-danger mt-1'>Introduce un precio</p>";
        }
        if($stock == ""){
            $errores = true;
            $err_stock = "<p class='bg-danger mt-1'>Introduce un stock</p>";
        }

        if($nombre_proveedores == "elige"){
            $errores = true;
            $err_proveedor = "<p class='bg-danger mt-1'>Introduce una proveedor</p>";
        }

        if(!$errores){
            $consulta = "UPDATE productos SET
            nombre = ?,
            categoria = ?,
            precio = ?,
            stock = ?,
            nombre_proveedor = ?
            WHERE nombre = '{$_GET["nombre"]}'";
            $stmt = $_conexion->prepare($consulta);
            $stmt->bind_param("ssdis",$nombre, $categoria, $precio, $stock, $nombre_proveedores);

            if($stmt->execute()){
                echo "<div class='alert alert-success'>El producto ha sido actualizado/div>";
                $nombre = $categoria = $precio = $stock = $nombre_proveedores = "";
            }else{
                echo "<div class='alert alert-danger'>El producto NO se ha actualizado</div>";
            }
            $stmt->close();
            
        }
    }
    ?>
    <div class="container mt-4">
        <h1 class="fs-1">Editar un producto</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Nombre producto</label>
                <input type="text" name="nombre" class="form-control" value="<?= htmlspecialchars($info_producto["nombre"]); ?>">
                
                <?= $err_nombre ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Categoria</label>
                <input type="text" name="categoria" class="form-control"value="<?= htmlspecialchars($info_producto["categoria"]); ?>">
                <?= $err_categoria ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" name="precio" class="form-control" value="<?= htmlspecialchars($info_producto["precio"]); ?>">
                <?= $err_precio ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input type="text" name="stock" class="form-control" value="<?= htmlspecialchars($info_producto["stock"]); ?>">
                <?= $err_stock ?? "" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">proveedor</label>
                <select name="nombre_proveedor" class="form-select">
                    <option value="elige" selected>---Elige un proveedor---</option>
                    <option value="TechSupply S.L.">TechSupply S.L.</option>
                    <option value="ElectroDistribuciones">ElectroDistribuciones</option>
                    <option value="MuebleHogar S.A.">MuebleHogar S.A.</option>
                    <option value="Deportes y Más">Deportes y Más</option>
                </select>
                <?= $err_proveedor ?? "" ?>
            </div>
            <div class="mb-3">
                <input type="submit" value="Editar producto" class="btn btn-success">
            </div>
        </form>
        <a href="index.php" class="btn btn-secondary">Volver al menú principal</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

